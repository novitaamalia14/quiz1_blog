<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Post::all();
        return view('post.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add');
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
                'title' => 'bail|required|unique:tb_post',
                'keterangan' => 'required'
             ],
             [
                'title.required' => 'Title wajib diisi',
                'title.unique' => 'Title sudah ada',
                'keterangan.required' => 'Keterangan diisi dengan Jelas'
            ]);
            
            Post::create([
                'tanggal' => $request->tanggal,
                'slug' => $request->slug,
                'title' => $request->title,
                'keterangan' => $request->keterangan,
                'id_cat' => $request->id_cat
            ]);
            
            return redirect('/post');
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
        $row = Post::findOrFail($id);
        return view('post.edit', compact('row'));
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
            
            $row = Post::findOrFail($id);
            $row->update([
                'tanggal' => $request->tanggal,
                'slug' => $request->slug,
                'title' => $request->title,
                'keterangan' => $request->keterangan,
                'id_cat' => $request->id_cat
            ]);
            
            return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Post::findOrFail($id);
        $row->delete();

        return redirect('/post');
    }
}
