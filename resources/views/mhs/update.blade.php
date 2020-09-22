@extends('template.BaseView',['title'=>"Update : {$query->nama_mahasiswa}"])
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form action="/mahasiswa/{{$query->nim}}/put" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nim</label>
                                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                                    value="{{$query->nim}}" readonly>
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_mahasiswa"
                                    class="form-control @error('nama_mahasiswa') is-invalid @enderror()" value="{{$query->nama_mahasiswa}}">
                                @error('nama_mahasiswa')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto Mahasiswa</label>
                                <input type="file" name="img_mahasiswa"
                                    class="form-control @error('img_mahasiswa') is-invalid @enderror()">
                                @error('img_mahasiswa')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Dosen Pendamping</label>
                                <select name="namaDosen" id="namaDosen" class="namaDosen form-control"></select>
                                <input type="hidden" id="hasil" name="dosen_id">
                                @error('dosen_id')
                                {{$message}}
                                @enderror
                            </div>
                            <input type="submit" value="Kirim" class="btn btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection