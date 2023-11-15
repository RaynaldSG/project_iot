@extends('login.layout.layoutLogin')

@section('form-container')
    <h1 class="text-center mt-2" style="font-weight: 700">LOGIN</h1>
    @if (session()->has('loginFailed'))
        <p class="card text-center mx-5 mt-3 mb-1" style="font-weight: 700; background-color:rgba(255, 0, 0, 0.6)">{{ session('loginFailed') }}</p>
    @endif
    @if (session()->has('registerSuccess'))
        <p class="card text-center mx-5 mt-3 mb-1" style="font-weight: 700; background-color:rgba(17, 255, 0, 0.6)">{{ session('registerSuccess') }}</p>
    @endif
    <form action="/" method="POST">
        @csrf
        <div class="container p-3">
            <div class="form-floating mb-4">
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username"
                    placeholder="username" value="{{ old('username') }}" autofocus required>
                <label for="floatingInput">Username</label>
                @error('username')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-0">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <small class="d-block mt-1 mb-3">Doesn't Have Account? <a href="/register">Register</a></small>
            <div class="container d-flex justify-content-center" style="width: 100%">
                <button class="btn text-center" style="background-color: rgba(178, 196, 252, 1)" type="submit">Login</button>
            </div>
        </div>


    </form>
@endsection
