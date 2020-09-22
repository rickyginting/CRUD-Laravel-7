<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'query' => Mahasiswa::orderBy('nim', 'asc')->simplePaginate(5),
        ];
        // dd($data['query']);
        return view('mhs/table', $data);
    }

    public function add()
    {
        return view('mhs/add');
    }

    public function store(MahasiswaRequest $request)
    {

        $att = $request->all();
        //Ambil File
        $file = $request->file('img_mahasiswa');

        if (!$file) {
            $att['img_mahasiswa'] = "default.png";
        } else {
            $md5 = md5($file->getClientOriginalName());
            $extn = $file->getClientOriginalExtension();
            $fileName = $md5 . "." . $extn;
            $att['img_mahasiswa'] = $fileName;
            $file->move('img/mhs', $fileName);
        }

        Mahasiswa::create($att);
        session()->flash('pesan', '
        <script>
        Swal.fire({
        icon: "success",
        title: "Berhasil !!!",
        text: "Data Berhasil Disimpan ke sistem",
        })
        </script>');
        return redirect('mahasiswa');

    }

    public function delete(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->img_mahasiswa == "default.png") {
            $mahasiswa->delete();
        } else {
            File::delete('img/mhs/' . $mahasiswa->img_mahasiswa);
            $mahasiswa->delete();
        }

        session()->flash('pesan', '
        <script>
        Swal.fire({
        icon: "success",
        title: "Berhasil !!!",
        text: "Data Berhasil Dihapus dari sistem",
        })
        </script>');

        return redirect('mahasiswa');
    }

    public function update(Mahasiswa $mahasiswa)
    {
        $data = [
            'query' => $mahasiswa,
        ];
        return view('mhs/update', $data);
    }

    public function put(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'img_mahasiswa' => 'mimes:jpeg,jpg,png,bmp',
            'dosen_id' => 'required',
        ]);

        //Kondisi Ketika Foto Baru di Upload
        $datalama = Mahasiswa::where('nim', $request->nim)->first();

        if ($request->file('img_mahasiswa')) {
            //Cek Berkas Foto Lama
            if ($datalama->img_mahasiswa == "default.png") {
                $file = $request->file('img_mahasiswa');
                $md5 = md5($file->getClientOriginalName());
                $extn = $file->getClientOriginalExtension();
                $fileName = $md5 . "." . $extn;
                $file->move('img/mhs', $fileName);
                $att = $request->all();
                $att['img_mahasiswa'] = $fileName;

                $mahasiswa->update($att);

                return redirect('mahasiswa');
            } else {
                File::delete('img/mhs/' . $datalama->img_mahasiswa);
                $file = $request->file('img_mahasiswa');
                $md5 = md5($file->getClientOriginalName());
                $extn = $file->getClientOriginalExtension();
                $fileName = $md5 . "." . $extn;
                $file->move('img/mhs', $fileName);
                $att = $request->all();
                $att['img_mahasiswa'] = $fileName;
                $mahasiswa->update($att);

                return redirect('mahasiswa');
            }

        } else {
            $att = $request->all();
            $fileName = $datalama->img_mahasiswa;
            $att['img_mahasiswa'] = $fileName;
            $mahasiswa->update($att);

            return redirect('mahasiswa');

        }

    }

    public function detail(Mahasiswa $mahasiswa)
    {
        $data = [
            'query' => $mahasiswa,
        ];
        return view('mhs/detail', $data);
    }
}
