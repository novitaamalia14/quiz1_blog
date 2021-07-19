@extends('layouts.app')

@section('content')

    <div class="container">
    
    <h3>Kategori Blog</h3>
        <p>
           <br><a href="{{ url('/kategori/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a> </br>

           <table class="table table-bordered table-striped table-hover table-bordered">
                <tr>
                    <th style="text-align:center">NAMA</th>
                    <th style="text-align:center">KETERANGAN</th>
                    <th style="text-align:center">AKSI EDIT</th>
                    <th style="text-align:center">AKSI HAPUS</th>
                </tr>

            @foreach($rows as $row)
                <tr>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td><a href="{{ url('/kategori/' . $row->id_kategori . '/edit') }}" class="btn btn-sm btn-info">Edit</a></td> 
                    <td>
                        <form action="{{url('/kategori/' .$row->id_kategori) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
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