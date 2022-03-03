<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register User</title>
</head>
<body>
    @include('nativetemplate.navbar')
    <div class="container mt-5 pt-5 pb-5 mb-5">
        <h2>Silahkan Register</h2>
        <div class="card mt-5 mb-5" style="width: 100%;">
        <div class="card-header" style="background-color: #FF9F45;">
            Register User
        </div>
            <ul class="list-group list-group-flush">
                <!-- Session Status -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <!-- Name -->
                <div>
                    <label for="name">Nama</label>
                    <input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email">Email</label>
                    <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <label for="password">Password</label>
                    <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required />
                </div>
    
                {{-- <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/loginuser">
                        {{ __('Already registered?') }}
                    </a>
    
                    <button class="ml-4 btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div> --}}
                <div class="row">
                    <div class="col-sm-6 d-grid gap-2 my-3">
                        <a class="btn btn-dark" href="/loginuser">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <div class="col-sm-6 d-grid gap-2 my-3">
                        <button class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    @include('nativetemplate.footer')

    {{-- cek kondisi --}}
    @if (empty(Auth::user()->name))
        <script>
            alert("selamat datang")
        </script>
    @else
    <script>
        alert("anda sudah login",window.location.assign("/"))
    </script>
    @endif
    {{-- cek kondisi --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</html>