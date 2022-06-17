<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Select Picker -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>Tambah Blog</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Blog') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="container">
                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Judul Blog</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" id="nama" name="nama">
                        @error('nama')
                            <div class="alert alert-danger">Judul Harus Di isi</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" readonly class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
                        @error('slug')
                            <div class="alert alert-danger">Slug Harus Di isi</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input class="form-control border border-dark" type="file" id="formFile" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="tags_id">Pilih Tag</label>
                        <select class="js-example-basic-multiple form-control" name="tag_id[]" multiple="multiple">
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                            @endforeach
                        </select>                       
                    </div>
                    <div class="mb-3">
                        <label for="isi">Content</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi"></textarea>
                        @error('isi')
                            <div class="alert alert-danger">Content Harus Di isi</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100 text-dark">Submit</button>
                </form>
            </div>
        </div>
    </x-app-layout>    

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.3/tinymce.min.js" integrity="sha512-ykwx/3dGct2v2AKqqaDCHLt1QFVzdcpad7P5LfgpqY8PJCRqAqOeD4Bj63TKnSQy4Yok/6QiCHiSV/kPdxB7AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type='text/javascript'> 
        tinymce.init({ 
            selector:'textarea',
            branding:false
        });
        function convertToSlug(str) {
        //replace all special characters | symbols with a space
        str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
        .toLowerCase();

        // trim spaces at start and end of string
        str = str.replace(/^\s+|\s+$/gm,'');

        // replace space with dash/hyphen
        str = str.replace(/\s+/g, '-');   
        document.getElementById("slug").value = str;
        //return str;
        }
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>