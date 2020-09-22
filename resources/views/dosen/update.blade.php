@extends('template.BaseView',['title'=>"Update : {$query->nama_dosen}"])
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form action="/dosen/{{$query->nip}}/put" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                    value="{{$query->nip}}" readonly>
                                @error('nip')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_dosen"
                                    class="form-control @error('nama_dosen') is-invalid @enderror()" value="{{$query->nama_dosen}}">
                                @error('nama_dosen')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto Dosen</label>
                                <input type="file" name="img_dosen"
                                    class="form-control @error('img_dosen') is-invalid @enderror()">
                                @error('img_dosen')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
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