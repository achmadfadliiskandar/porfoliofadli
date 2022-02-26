@include('nativetemplate.navbar')
@yield('content')
<title>{{$posts->nama}}</title>
<div class="container mt-5 mb-5 pt-5 pb-5">
    <div class="row">
        <h1>{{$posts->nama}}</h1>
        <div class="col-sm-8 mt-5 mb-5 pb-5">
                <div class="container">
                    <img src="{{asset('gambarblog/'.$posts->image)}}" style="width: 100%;" class="mt-3 mb-3 h-25" alt="">
                    <p>{!!$posts->isi!!}</p>
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
@include('nativetemplate.footer')