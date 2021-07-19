@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Tambah Data Post Blog</h3>
    <form action="{{ url('/post') }}" method="POST">
        @csrf
        <p>
            <div class="form-group">
                <label for=""> TANGGAL</label>
                <input type="date" name="tanggal" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> TITLE</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> SLUG</label>
                <input type="text" name="slug" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> KETERANGAN</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for=""> ID_KATEGORI</label>
                <input type="text" name="id_cat" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="SIMPAN" class="btn btn-primary">
            </div>
        </p>

    </form>
</div>
@endsection