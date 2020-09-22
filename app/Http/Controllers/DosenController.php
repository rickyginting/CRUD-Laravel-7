<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Http\Requests\DosenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'query' => Dosen::orderBy('nip', 'asc')->paginate(5),
        ];

        return view('dosen/table', $data);
    }

    public function add()
    {
        return view('dosen/add');
    }

    public function store(DosenRequest $request)
    {
        $file = $request->file('img_dosen');

        if (!$file) {
            $fileName = "default.png";
        } else {
            $md5 = md5($file->getClientOriginalName());
            $ext = $file->getClientOriginalExtension();
            $fileName = $md5 . "." . $ext;
            $file->move('img/dosen', $fileName);
        }
        $att = $request->all();
        $att['img_dosen'] = $fileName;

        Dosen::create($att);

        session()->flash('pesan', '
        <script>
        Swal.fire({
        icon: "success",
        title: "Berhasil !!!",
        text: "Data Berhasil Ditambahkan ke sistem",
        })
        </script>');

        return redirect()->route('dosen');

    }

    public function detail(Dosen $dosen)
    {
        $data = [
            'query' => $dosen,
        ];

        return view('dosen/detail', $data);
    }

    public function update(Dosen $dosen)
    {
        $data = [
            'query' => $dosen,
        ];
        return view('dosen/update', $data);
    }

    public function put(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama_dosen' => 'required',
        ]);

        $dataLama = Dosen::where('nip', $request->nip)->first();

        if ($request->file('img_dosen')) {
            if ($dataLama->img_dosen == "default.png") {
                $file = $request->file('img_dosen');
                $md5 = md5($file->getClientOriginalName());
                $ext = $file->getClientOriginalExtension();
                $fileName = $md5 . "." . $ext;
                $file->move('img/dosen', $fileName);
                $att = $request->all();
                $att['img_dosen'] = $fileName;
                $dosen->update($att);

                session()->flash('pesan', '
                <script>
                Swal.fire({
                icon: "success",
                title: "Berhasil !!!",
                text: "Data Berhasil Diupdate dari sistem",
                })
                </script>');

                return redirect()->route('dosen');
            } else {
                File::delete('img/dosen/' . $dataLama->img_dosen);

                $file = $request->file('img_dosen');
                $md5 = md5($file->getClientOriginalName());
                $ext = $file->getClientOriginalExtension();
                $fileName = $md5 . "." . $ext;
                $file->move('img/dosen', $fileName);
                $att = $request->all();
                $att['img_dosen'] = $fileName;
                $dosen->update($att);

                session()->flash('pesan', '
                <script>
                Swal.fire({
                icon: "success",
                title: "Berhasil !!!",
                text: "Data Berhasil Diupdate dari sistem",
                })
                </script>');

                return redirect()->route('dosen');
            }

        } else {
            $att = $request->all();
            $att['img_dosen'] = "default.png";
            $dosen->update($att);

            session()->flash('pesan', '
                <script>
                Swal.fire({
                icon: "success",
                title: "Berhasil !!!",
                text: "Data Berhasil Diupdate dari sistem",
                })
                </script>');

            return redirect()->route('dosen');
        }

    }

    public function delete(Dosen $dosen)
    {
        if ($dosen->img_dosen == "default.png") {
            $dosen->delete();
        } else {
            File::delete('img/dosen/' . $dosen->img_dosen);
            $dosen->delete();
        }

        session()->flash('pesan', '
        <script>
        Swal.fire({
        icon: "success",
        title: "Berhasil !!!",
        text: "Data Berhasil Dihapus dari sistem",
        })
        </script>');

        return redirect()->route('dosen');
    }

    public function json(Request $request)
    {
        $nama_dosen = $request->get('term');
        $data = Dosen::where('nama_dosen', 'LIKE', "%$nama_dosen%")->get();
        return $data->toJson();

    }

}
