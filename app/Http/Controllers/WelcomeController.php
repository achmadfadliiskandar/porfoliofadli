<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Welcome;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('welcome',compact('posts'));
    }
    public function tambah(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'pesan' => 'required'
        ]);
        
        $welcome = new Welcome;
        $welcome->name = $request->name;
        $welcome->email = $request->email;
        $welcome->pesan = $request->pesan;
        $welcome->save();

        return redirect('/#contact')->with('status','Pesan Berhasil Dikirim Terima Kasih');
    }

    public function show($id){
        $posts = Post::find($id);
        $post = Post::all();
        return view('show',compact('posts','post'));
    }
}
