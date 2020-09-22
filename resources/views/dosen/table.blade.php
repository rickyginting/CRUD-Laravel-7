@extends('template.BaseView',['title'=>'Data Dosen'])
@section('konten')
    <div class="container">
        <div class="row justify-content-between">
            <div class="">
                <h3>Data Dosen</h3>
            </div>
            <div class="">
                <a href="{{url('dosen/add')}}" class="btn btn-info btn-sm">Tambah Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Dosen</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no=1;
                                foreach ($query as $i) {?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td><a href="/dosen/{{$i->nip}}">{{$i->nip}}</a></td>
                                    <td>{{$i->nama_dosen}}</td>
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
