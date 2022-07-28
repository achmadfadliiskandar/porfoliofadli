<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Models\Welcome;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('welcome',compact('posts'));
    }
    public function tambah(Request $request){
        date_default_timezone_set('Asia/Jakarta');
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
        $users = User::all();
        $guests = Guest::where('posts_id',$id)->get();
        // $tags = Tag::all();
        $replies = Reply::all();
        return view('show',compact('posts','post','users','replies','guests'));
    }
    public function tambahguest(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        // dd($request->all());
        $request->validate([
            'pesan' => 'required',
            // 'body' => 'required',
        ]);
        // dd($request->all());
        $reply = new Guest();
        $reply->id = $request->id;
        $reply->posts_id = $request->posts_id;
        $reply->reply = $request->reply;
        $reply->website = $request->website;
        $reply->pesan = $request->pesan;
        $reply->guest = str_pad('guest_', STR_PAD_LEFT).rand(1000, 999999);
        $reply->save();
        return redirect()->back()->with('status','Komentar Berhasil Di Tambahkan');
    }
    public function tambahreplies(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        // dd($request->all());
        $request->validate([
            'pesan' => 'required',
            // 'body' => 'required',
        ]);
        $reply = new Reply();
        $reply->id = $request->id;
        $reply->posts_id = $request->posts_id;
        $reply->reply = $request->reply;
        $reply->website = $request->website;
        $reply->pesan = $request->pesan;
        $reply->user_id = Auth::id();
        // $reply->guest = str_pad('guest_', STR_PAD_LEFT).rand(1000, 999999);
        $reply->save();
        return redirect()->back()->with('status','Komentar Berhasil Di Tambahkan');
    }
    public function updatereplies(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'pesan' => 'required',
            // 'body' => 'required',
        ]);
        $reply = Reply::find($id);
        $reply->id = $request->id;
        $reply->posts_id = $request->posts_id;
        $reply->reply = $request->reply;
        $reply->website = $request->website;
        $reply->pesan = $request->pesan;
        $reply->user_id = Auth::id();
        $reply->save();
        return redirect()->back()->with('status','Reply Berhasil Di Edit');
    }
    public function hapusreplies($id){
        Reply::destroy($id);
        return redirect()->back()->with('status','Komentar Berhasil Di hapus');
    }
}
