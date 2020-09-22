@extends('template.BaseView',['title'=>'Data Mahasiswa'])
@section('konten')
    <div class="container">
        <div class="row justify-content-between">
            <div class="">
                <h3>Data Mahasiswa</h3>
            </div>
            <div class="">
                <a href="{{url('mahasiswa/add')}}" class="btn btn-info btn-sm">Tambah Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Mahasiswa</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no=1;
                                foreach ($query as $i) {?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td><a href="/mahasiswa/{{$i->nim}}">{{$i->nim}}</a></td>
                                    <td>{{$i->nama_mahasiswa}}</td>
                                </tr>
                            <?php 
                        $no++;
                        } ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$query->links()}}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
