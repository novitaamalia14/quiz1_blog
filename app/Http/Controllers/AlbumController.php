<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Album::all();
        return view('album.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'bail|required|unique:tb_album',
                'keterangan' => 'required'
             ],
             [
                'nama.required' => 'NAMA wajib diisi',
                'nama.unique' => 'Nama sudah ada',
                'keterangan.required' => 'Keterangan diisi dengan Jelas'
            ]);
            
            Album::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'photo_id' => $request->photo_id
            ]);
            
            return redirect('/album');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Album::findOrFail($id);
        return view('album.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'bail|required',
                'keterangan' => 'required'
             ],
             [
                'nama.required' => 'NAMA wajib diisi',
                'keterangan.required' => 'Keterangan diisi dengan Jelas'
            ]);
            
            $row = Album::findOrFail($id);
            $row->update([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'photo_id' => $request->photo_id
            ]);
            
            return redirect('/album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Album::findOrFail($id);
        $row->delete();

        return redirect('/album');
    }
}
