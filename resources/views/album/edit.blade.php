@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Edit Data Album Blog</h3>
    <form action="{{ url('/album/' .$row->id_album) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
        <p>
            <div class="form-group">
                <label for=""> NAMA</label>
                <input type="text" name="nama" class="form-control" value="{{$row->nama}}">
            </div>

            <div class="form-group">
                <label for=""> KETERANGAN</label>
                <textarea name="keterangan" class="form-control"> {{$row->keterangan}}</textarea>
            </div>

            <div class="form-group">
                <label for=""> ID_PHOTO</label>
                <input type="text" name="photo_id" class="form-control" value="{{$row->photo_id}}">
            </div>

            <div class="form-group">
                <input type="submit" value="UPDATE" class="btn btn-primary">
            </div>
        </p>

    </form>
</div>
@endsection