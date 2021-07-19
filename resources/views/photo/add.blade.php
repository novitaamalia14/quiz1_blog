@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Tambah Data Photo Blog</h3>
    <form action="{{ url('/photo') }}" method="POST">
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
                <label for=""> KETERANGAN</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for=""> ID_POST</label>
                <input type="text" name="post_id" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="SIMPAN" class="btn btn-primary">
            </div>
        </p>

    </form>
</div>
@endsection