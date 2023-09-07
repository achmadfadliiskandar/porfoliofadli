<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--icon-->
    <link rel="icon" href="{{asset('logo.PNG')}}">

    <title>Achmad Fadli Iskandar</title>

    {{-- css --}}
    <style>
        html{
            scroll-behavior: smooth;
        }
        body {
            position: relative; 
        }
        ::-webkit-scrollbar{
            width: 20px;
        }
        ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px #FF7F00; 
        }
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #FF7F00; 
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #FF7F00; 
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
    {{-- begin :navbar  --}}
    @include('nativetemplate.navbar')
    {{-- end :navbar --}}

    {{-- begin :jumbotron --}}
    <div class="container-fluid text-dark p-5" style="background-color: #FF9F45;">
        <div class="container p-5"  style="background-color: #FF9F45;">
            <div class="row">
                <div class="col-xl-6">
                    <h1 class="display-3 fw-bold">Hai Saya Achmad Fadli Iskandar</h1>
                    <hr>
                        <p>Saya Seorang : <span class="typing" style="font-size: 20px;font-weight:600;"></span></p>
                        <a href="#about" class="btn btn-primary">About Me</a>
                </div>
                <div class="col-xl-6">
                    <img src="{{asset('undraw_programming_re_kg9v.svg')}}" class="w-100 h-100" alt="">
                </div>
            </div>
        </div>
    </div>
    {{-- end :jumbotron --}}

    {{-- begin : about --}}
    <section class="about pt-5 pb-5" id="about">
    <div class="container">
        <h2 class="text-center pt-3 pb-3">About Me</h2>
        <div class="row text-justify">
            <div class="col-sm-6">
                <strong>Latar Belakang : </strong>
                <hr>
                <p>
                    Assalamualaikum wr wb nama saya achmad fadli iskandar saya dari depok dan saya lahir 17 september 2003 saya adalah seorang programmer web / web developer junior dan sekarang saya sedang bersekolah di <strong class="text-uppercase">smk taruna bhakti</strong> depok dan saya adalah orang yang senang/suka dengan pemrograman / programming contoh c php javascript python html css karena menurut saya bahasanya sangat bagus karena memiliki sintaksis dan semantik yang dapat dimengerti oleh manusia, dan juga saya memiliki hobi seperti programming sepak bola bulu tangkis tenis meja dan basket setelah lulus dari smk taruna bhakti saya melanjutkan belajar/menimba ilmu di salah satu universitas swasta di kota depok yaitu <b>Gunadarma</b> , Saya mengambil prodi Informatika Didalam Informatika Saya Mempelajari Seperti Algoritma Dan Pemrograman Dan pengenalan teknologi komputer informasi dan legal aspek produk dan komunikasi
                </p>
            </div>
            <div class="col-sm-6">
                <strong>Pengalaman : </strong>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">1.Mengikuti Seminar Dan Webinar BALANCING YOUR SKILL (BYS) 2023 Kampus Gunadarma D</li>
                    <li class="list-group-item">2.Mengikuti Seminar Peran LSP dalam dunia kerja berbasis kompetensi di era revolusi 4.0 dan society 5.0 Online</li>
                    <li class="list-group-item">3.Menyelesaikan Praktikum Fisika Dasar Kampus Gunadarma H</li>
                    <li class="list-group-item">4.Menyelesaikan Praktikum LAB-TI Kampus Gunadarma E</li>
                    <li class="list-group-item">5.Pernah Magang Di PT Indorental Selama 1.5 Bulan (online) Dan PT B-ONE CORP Selama 4 Bulan (offline)</li>
                    <li class="list-group-item">6.Pernah Mendampingi Salah Satu Pemain Bulu Tangkis Di Kejuaraan Kota jaksel (kejurkot | pasar minggu)</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12">
            <h2 class="text-capitalize">Prestasi</h2>
            <hr>
            <div class="card" style="width: 100%;">
                <div class="card-header">
                Penghargaan / prestasi yang di dapatkan
                </div>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Sertifikat Free Code Camp : <strong>HTML</strong> <span class="badge bg-primary rounded-pill">1</span></li>
                    <li class="list-group-item">Sertifikat Solo Learn :  <strong>PHP,HTML,JS,JQUERY,SQL,CODING FOR MARKETERS,CSS,RESPONSIVE WEB DESIGN</strong> <span class="badge bg-primary rounded-pill">8</span></li>
                    <li class="list-group-item">Kunjungan Industri (KUNJIN) Ke PT Frisidea Tech</li>
                    <li class="list-group-item">Finalis Himti cup 2023 Cabor Badminton Reg DPK-CGK</li>
                    <li class="list-group-item">Juara ITSOCIART FEST 2023 Cabor Badminton</li>
                    <li class="list-group-item">Juara 2 WebXperience Design Challenge 2023 Coding Bagian Desain Web</li>
                </ol>
                </ul>
            </div>
        </div>
    </div>
    </section>
    {{-- end : about --}}

    {{-- begin : skill --}}
    <section class="kemampuan bg-light mt-5 mb-5 pt-5 pb-5" id="kemampuan">
        <h2 class="text-center pt-3 pb-3">Kemampuan</h2>
        <div class="container text-center">
            <div class="row">
                {{-- gambar 1 --}}
                <div class="col-md-4">
                    <img src="https://cdn-cdpl.sgp1.cdn.digitaloceanspaces.com/source/4817b4477491b436a2a3cb4db5f3943b/header-python-logo-flat-image700x350-crop-image700x350-crop-image(700x350-crop).png" class="card-img-top" style="width:100%;" alt="coding">
                    <br>
                    <br>
                    <img src="https://static.blog.ruangdeveloper.com/2021/12/mengenal-framework-laravel.png" class="card-img-top" style="width: 100%;" alt="">
                </div>
                {{-- end gambar 1 --}}
                {{-- gambar 2 --}}
                <div class="col-md-4">
                    <img src="https://delapanmedia.com/asset/berita/original/77723555319-bd2_6f5_636_330-1-original.jpg" class="card-img-top" style="width:100%;" alt="design">
                    <br>
                    <br>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Flask_logo.svg/1200px-Flask_logo.svg.png" class="card-img-top" style="width: 100%;" alt="">
                </div>
                {{-- end gambar 2 --}}
                {{-- gambar 3 --}}
                <div class="col-md-4">
                    <img src="https://it.telkomuniversity.ac.id/bemucil/2023/01/Javascript-adalah-1.jpg" class="card-img-top" style="width:100%;" alt="backend">
                    <br>
                    <br>
                    <img src="https://tms-outsource.com/blog/wp-content/uploads/2023/05/bootstrap-alternatives.jpg" class="card-img-top" style="width:100%;" alt="">
                </div>
                {{-- end gambar 3 --}}
            </div>
        </div>
    </section>
    {{-- end : skill --}}

    {{-- begin:blog --}}
    <section class="blog mt-5 mb-5 pt-5 pb-5" id="blog">
        <div class="container">
        <h2 class="text-center mt-3 mb-3">Blog</h2>
        {{-- <p class="text-center">Sedang Dalam Pengerjaan</p> --}}
        <div class="row">
        @foreach($posts as $post)
        <div class="col-sm-4 mb-3 mt-3">
            <div class="card" style="width: 100%;">
                <img src="{{asset('gambarblog/'.$post->image)}}" class="card-img-top" style="height: 200px;" alt="gambar kosong">
                <div class="card-body">
                <h5 class="card-title">{{$post->nama}}</h5>
                <a href="/show-post/{{$post->id}}/{{$post->slug}}" class="btn btn-primary">Show More</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        </div>
    </section>
    {{-- end:blog --}}

    {{-- begin: contact --}}
    <section class="contact pt-5 pb-5" style="background-color: #FFBC80;" id="contact">
        <div class="container">
            <h2 class="text-center pt-3">Contact Me</h2>
        <p class="text-center">Silahkan kirim saran</p>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }} &#128514;
        </div>
        @endif
        <div class="row">
            <div class="col-sm-6 mb-3 mt-3">
                <div class="card text-white bg-primary" style="max-width: 100%;">
                    <div class="card-header">Alamat Rumah</div>
                    <div class="card-body">
                    <p class="card-text">Jalan Kopo No 27 Beji Depok Jawa Barat Indonesia</p>
                </div>
        </div>
        <div class="card text-white bg-success mt-3" style="max-width: 100%;">
            <div class="card-header">Sosial Media</div>
            <div class="card-body">
            <h5 class="card-title">Instagram , Email , Whatsapp , Telegram</h5>
            <p class="card-text">Instagram : 17achmadfadliiskandar :  <a href="https://www.instagram.com/17achmadfadliiskandar/" class="text-decoration-none text-dark text-decoration" target="_blank">Kunjungi Instagram Saya</a></p>
            <p class="card-text">Email : af137357@gmail.com : <a href="https://www.gmail.com/" class="text-decoration-none text-dark text-decoration" target="_blank">Kunjungi gmail</a></p>
            <p class="card-text">Whatsapp : <a href="https://api.whatsapp.com/send?phone=6287732785828" class="text-decoration-none text-dark text-decoration" target="_blank">Silahkan Japri saya di whatsapp</a></p>
            <p class="card-text">Telegram : <a href="https://t.me/achmadfadliiskandarr" class="text-decoration-none text-dark text-decoration" target="_blank">Silahkan Japri saya di telegram</a></p>
        </div>
        </div>
        </div>
        <div class="col-sm-6">
            @if ($errors->any())
                <script>
                    alert("data belum tersimpan");
                </script>
            @endif
            <form action="/welcome/store" method="POST">
                @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">Nama Harus Di Isi</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger">Email Harus Di Isi</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control @error('pesan') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea" name="pesan" rows="4" value="{{ old('pesan') }}"></textarea>
                @error('pesan')
                    <div class="alert alert-danger">Pesan Harus Di Isi</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
            </form>
        </div>
    </section>
    {{-- end: contact --}}

    {{-- begin : footer --}}
    @include('nativetemplate.footer')
    {{-- end : footer --}}

    {{-- js --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // alert("testing dlu")
        $(document).ready(function(){
            var typed = new Typed(".typing",{
            strings:["Junior Programmer","Atlit Badminton","Youtuber","Blogger","Designer","Mahasiswa"],
            typeSpeed:100,
            backSpeed:60,
            loop:true
        });
        });
    </script>
    {{-- end js --}}

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>