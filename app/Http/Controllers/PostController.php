<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Post::all();
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('blog.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'nama' => 'required|unique:posts|max:255',
            'slug' => 'required|unique:posts',
            'isi' =>  'required',
        ]);
        $blog = new Post;
        $blog->nama = $request->nama;
        $blog->isi = $request->isi;
        $blog->slug = $request->slug;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('gambarblog/', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        $blog->tags()->attach($request->input('tag_id'));
        return redirect('blog')->with('status','Blog Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = Post::find($id);
        return view('blog.edit',compact('blogs'));
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
        date_default_timezone_set('Asia/Jakarta');
        $blog = Post::find($id);
        $blog->nama = $request->nama;
        $blog->isi = $request->isi;
        $blog->slug = $request->slug;
        if ($request->hasfile('image')) {
        $destination = 'gambarblog/'.$blog->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('gambarblog/', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        return redirect('blog')->with('status','Blog Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Post::find($id);
        $destination = 'gambarblog/'.$blog->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $blog->delete();
        return redirect('blog')->with('status','Blog Berhasil di hapus');
    }
}
