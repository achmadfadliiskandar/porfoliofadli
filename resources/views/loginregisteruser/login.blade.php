<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login User</title>
</head>
<body>
    @include('nativetemplate.navbar')
    {{-- @include('nativetemplate.navbar') --}}
    <div class="container mt-5 pt-5 pb-5 mb-5">
        <h2>Silahkan Login</h2>
        {{-- php --}}
        @if (empty(Auth::user()->name))
        <div class="alert alert-success">Welcome</div>
        @else
        <script>
            alert("anda sudah login",window.location.assign("/"))
        </script>
        @endif
        {{-- end php --}}
        <div class="card mt-5 mb-5" style="width: 100%;">
        <div class="card-header" style="background-color: #FF9F45;">
            Login User
        </div>
            <ul class="list-group list-group-flush">
                <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <label for="email">Email</label>
                    <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <label for="password">Password</label>
    
                    <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="mb-3 mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    @include('nativetemplate.footer')



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