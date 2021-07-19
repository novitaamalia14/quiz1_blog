<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Photo::all();
        return view('photo.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo.add');
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
                'title' => 'bail|required|unique:tb_photo',
                'keterangan' => 'required'
             ],
             [
                'title.required' => 'Title wajib diisi',
                'title.unique' => 'Title sudah ada',
                'keterangan.required' => 'Keterangan diisi dengan Jelas'
            ]);
            
            Photo::create([
                'tanggal' => $request->tanggal,
                'title' => $request->title,
                'keterangan' => $request->keterangan,
                'post_id' => $request->post_id
            ]);
            
            return redirect('/photo');
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
        $row = Photo::findOrFail($id);
        return view('photo.edit', compact('row'));
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
                'title' => 'bail|required',
                'keterangan' => 'required'
             ],
             [
                'title.required' => 'Title wajib diisi',
                'keterangan.required' => 'Keterangan diisi dengan Jelas'
            ]);
            
            $row = Photo::findOrFail($id);
            $row->update([
                'tanggal' => $request->tanggal,
                'title' => $request->title,
                'keterangan' => $request->keterangan,
                'post_id' => $request->post_id
            ]);
            
            return redirect('/photo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Photo::findOrFail($id);
        $row->delete();

        return redirect('/photo');
    }
}
