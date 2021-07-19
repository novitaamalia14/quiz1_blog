@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Edit Data Post Blog</h3>
    <form action="{{ url('/post/' .$row->id_post) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
        <p>
            <div class="form-group">
                <label for=""> TANGGAL</label>
                <input type="date" name="tanggal" class="form-control" value="{{$row->tanggal}}">
            </div>

            <div class="form-group">
                <label for=""> SLUG</label>
                <input type="text" name="slug" class="form-control" value="{{$row->slug}}">
            </div>

            <div class="form-group">
                <label for=""> TITLE</label>
                <input type="text" name="title" class="form-control" value="{{$row->title}}">
            </div>

            <div class="form-group">
                <label for=""> KETERANGAN</label>
                <textarea name="keterangan" class="form-control"> {{$row->keterangan}}</textarea>
            </div>

            <div class="form-group">
                <label for=""> ID_POST</label>
                <input type="text" name="id_cat" class="form-control" value="{{$row->id_cat}}">
            </div>

            <div class="form-group">
                <input type="submit" value="UPDATE" class="btn btn-primary">
            </div>
        </p>

    </form>
</div>
@endsection