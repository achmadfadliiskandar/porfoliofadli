@include('nativetemplate.navbar')
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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/guests/tambahguest" method="POST">
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
                        <span class="input-group-text" id="basic-addon3">https://youtube.com</span>
                        <input type="text" class="form-control" id="basic-url" name="website" placeholder="https://youtube.com">
                    </div>
                    <div class="mb-3">Reply To</div>
                    <select class="form-control" id="reply" name="reply">
                            @foreach ($guests as $guest)
                            <option>{{$guest->guest}}</option>
                            @endforeach
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
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Komentar Dengan Akun</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Komentar Tanpa Akun</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
                                            <button type="button" class="btn btn-primary detailpesan" value="{{$reply->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Reply Cepat
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Reply Cepat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
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
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->name == $reply->user->name)
                                            {{-- <p>tidak bisa</p> --}}
                                            <button class="btn btn-success my-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Edit
                                            </button>
                                            <form action="/replies/hapus/{{$reply->id}}" class="d-inline-block" onsubmit="return confirm('yakin ingin menghapus?')" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Hapus</button>
                                            </form> 
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
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row" style="overflow-y:auto;">
                                <div class="col-sm-12">
                                    <div class="card mt-3 mb-3">
                                        <div class="card-body text-justify">
                                            <p class="float-end">Jumlah Komentar : {{$guests->count("id")}}</p>
                                            @forelse ($guests as $guest)
                                            <h4>{{$guest->guest}}</h4>
                                            <p><a href="{{$guest->website}}" target="_blank">{{$guest->website}}</a></p>
                                            <p>{{$guest->pesan}}</p>
                                            @if ($guest->reply == null)
                                                <p class="text-danger">Tidak ada Reply</p>
                                            @else
                                            <p>Reply For : {{$guest->reply}}</p>
                                            @endif
                                            @empty
                                            <p class="text-danger">belum ada komentar</p>
                                            @endforelse
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-4">
            <h2 style="text-transform: capitalize;">judul blog</h2>
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
            <section id="tags" class="tags">
                        <h2>Tags</h2>
                        <div class="card">
                            <div class="card-body">
                                @forelse($posts->tags as $tag)
                                    <button class="btn btn-primary mt-2 mb-2">{{$tag->tag_name}}</button>
                                @empty
                                    <button class="btn btn-danger">Tidak ada Tag</button>
                                @endforelse
                            </div>
                        </div>
                    </section>
            <a href="/" class="my-3 btn btn-danger w-100">Back</a>
        </div>
    </div>
</div>
@include('nativetemplate.footer')