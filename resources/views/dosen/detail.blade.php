@extends('template.BaseView',['title'=>"Data : {$query->nama_dosen}"])
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$query->nama_dosen}}</h4>
                        <hr>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify">
                                <div class="col-2">
                                    <div class="card">
                                        <div class="card-body">
                                        <img src="{{asset("img/dosen/$query->img_dosen")}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="120px" height="110px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$query->nama_dosen}}</h4>
                                            <table>
                                                <tr>
                                                    <th>Nim : </th>
                                                    <td>{{$query->nip}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Register : </th>
                                                    <td>{{$query->created_at->format('d M yy') ." ". $query->created_at->diffForHumans()}}</td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <a href="{{url('dosen/'.$query->nip.'/update')}}" class="btn btn-warning">Update</a>
                                            <form action="/dosen/{{$query->nip}}/delete" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Hapus" class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection