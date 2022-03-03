@extends('nativetemplate.content')
<title>{{$posts->nama}}</title>
<div class="container pt-4 pb-4 mt-4 mb-4">
    <div class="row pt-4 pb-4 mt-4 mb-4">
        <h1>{{$posts->nama}}</h1>
        <div class="col-sm-8">
                <div class="container">
                    <img src="{{asset('gambarblog/'.$posts->image)}}" style="width: 100%;height:400px;" class="mt-3 mb-3" alt="">
                    <p class="text-justify">{!!$posts->isi!!}</p>
                    <h2>Silahkan Komentar <i>Silahkan Berdiskusi</i></h2>
                    @if (empty(Auth::user()->name))
                    <div class="alert alert-danger" role="alert">
                    Jika Ingin Berkomentar / mereply silahkan login / register terlebih dahulu
                    {{-- <a href="/loginuser" class="text-decoration-none text-dark bg-primary">login</a> --}}
                    </div>
                    @else
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/replies/tambahreplies" method="POST">
                        @csrf
                        @if ($errors->any())
                            <script>
                                alert("data belum tersimpan");
                            </script>
                        @endif
                    <div class="mb-3">
                            <label for="posts_id" class="form-label">Judul Diskusi / Blog</label>
                            {{-- <input type="text" class="form-control" id="posts_id" readonly name="posts_id" value="{{$posts->nama}}"> --}}
                            <select name="posts_id" id="posts_id" class="form-control">
                            <option value="{{$posts->id}}">{{$posts->slug}}</option>
                            </select>
                    </div>
                    <label for="website" class="form-label">Website</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <input type="text" class="form-control" id="basic-url" name="website" placeholder="youtube.com">
                    </div>
                    <div class="mb-3">Reply To</div>
                    <select class="form-select" aria-label="Default select example" name="reply">
                        <option selected disabled>Silahkan Reply</option>
                            @foreach ($users as $user)
                            <option value="{{$user->name}}">
                            @if ($user->role == 'admin')
                            {{$user->role}}
                            @else
                            {{$user->name}}
                            @endif
                            </option>
                            @endforeach
                        </option>
                    </select>
                    <div class="mb-3">
                        <label for="pesan" class="form-label @error('pesan') is-invalid @enderror">Pesan</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="pesan" name="pesan"></textarea>
                        @error('pesan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @endif
                    <h2>Komentar</h2>
                    <div class="row" style="overflow-y:auto;">
                        <div class="col-sm-12">
                            <div class="card mt-3 mb-3">
                                <div class="card-body text-justify">
                                    <p class="float-end">Jumlah Komentar : {{$replies->count("id")}}</p>
                                    @forelse ($replies as $reply)
                                    <h4>
                                        @if ($reply->user->role == 'admin')
                                        {{$reply->user->name}} (Admin)
                                        @else
                                        {{$reply->user->name}}
                                        @endif
                                    </h4>
                                    <p><a href="{{$reply->website}}" target="_blank">{{$reply->website}}</a></p>
                                    <p>{{$reply->pesan}}</p>
                                    @if ($reply->reply == null)
                                        <p class="text-danger">Tidak ada Reply</p>
                                    @else
                                    <p>Reply For : {{$reply->reply}}</p>
                                    @endif
                                    
                                    @if(!empty(Auth::user()->name))
                                    @if (Auth::user()->name == $reply->user->name)
                                    {{-- <p>tidak bisa</p> --}}
                                    <button class="btn btn-success my-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Edit
                                    </button>
                                    <div class="collapse" id="collapseExample">
                                        <form action="/replies/update/{{$reply->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="posts_id" class="form-label">Judul Diskusi / Blog</label>
                                                {{-- <input type="text" class="form-control" id="posts_id" readonly name="posts_id" value="{{$posts->nama}}"> --}}
                                                <select name="posts_id" id="posts_id" class="form-control">
                                                <option value="{{$posts->id}}">{{$posts->slug}}</option>
                                                </select>
                                        </div>
                                        <label for="website" class="form-label">Website</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">https://</span>
                                            <input type="text" class="form-control" id="basic-url" name="website" placeholder="youtube.com" value="{{$reply->website}}">
                                        </div>
                                        <div class="mb-3">Reply To</div>
                                        <select class="form-select" aria-label="Default select example" name="reply">
                                            <option selected disabled>Silahkan Reply</option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->name}}" {{($user->name == $user->name) ? 'selected' : ''}}>
                                                @if ($user->role == 'admin')
                                                {{$user->role}}
                                                @else
                                                {{$user->name}}
                                                @endif
                                                </option>
                                                @endforeach
                                            </option>
                                        </select>
                                        <div class="mb-3">
                                            <label for="pesan" class="form-label @error('pesan') is-invalid @enderror">Pesan</label>
                                            <textarea class="form-control" placeholder="Leave a comment here" id="pesan" name="pesan">{{$reply->pesan}}
                                            </textarea>
                                            @error('pesan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <button class="my-3 btn btn-success" type="submit" style="width:100%;">Update</button>
                                        </div>
                                        </form>
                                    </div>
                                    <form action="/replies/hapus/{{$reply->id}}" class="d-inline-block" onsubmit="return confirm('yakin ingin menghapus?')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                    @else
                                    @endif
                                    @endif
                                    @empty
                                        <p class="text-danger">Belum ada komentar</p>
                                    @endforelse
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Blog</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($post as $post)
                        <tr>
                            @if ($post == $posts)
                            <td style="background-color: #FF9F45;color:whitesmoke;">{{$loop->iteration}}</td>
                            <td style="background-color: #FF9F45;color:whitesmoke;">
                                <a href="/show-post/{{$post->id}}/{{$post->slug}}" class="text-decoration-none text-light">{{$post->nama}}</a>
                            </td>
                            @else
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="/show-post/{{$post->id}}/{{$post->slug}}" class="text-decoration-none text-dark">{{$post->nama}}</a>
                            </td>
                            @endif
                            @endforeach
                        </tr>
                    </tr>
                </tbody>
            </table>
            <a href="/" class="my-3 btn btn-danger w-100">Back</a>
        </div>
    </div>
</div>
