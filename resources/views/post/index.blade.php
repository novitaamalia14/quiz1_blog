@extends('layouts.app')

@section('content')

    <div class="container">
    
    <h3>Post Blog</h3>
        <p>
        <br><a href="{{ url('/post/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a> </br>

            <table class="table table-bordered table-striped table-hover table-bordered">
                <tr>
                    <th style="text-align:center">TANGGAL</th>
                    <th style="text-align:center">SLUG</th>
                    <th style="text-align:center">TITLE</th>
                    <th style="text-align:center">KETERANGAN</th>
                    <th style="text-align:center">ID_KATEGORI</th>
                    <th style="text-align:center">AKSI EDIT</th>
                    <th style="text-align:center">AKSI HAPUS</th>
                </tr>

            @foreach($rows as $row)
                <tr>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->slug }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>{{ $row->id_cat }}</td>
                    <td><a href="{{ url('post/' . $row->id_post . '/edit') }}" class="btn btn-sm btn-info">Edit</a></td> 
                    <td>
                        <form action="{{url('/post/' .$row->id_post) }}" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                @csrf
                                <button class="btn btn-sm btn-danger">Hapus</button>   
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
         </p>
   
    </div> 

@endsection