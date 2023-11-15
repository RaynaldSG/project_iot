@extends('login.layout.layoutLogin')

@section('form-container')
    <h1 class="text-center mt-2" style="font-weight: 700">REGISTER</h1>
    <form action="/register" method="POST">
        @csrf
        <div class="container p-3">
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name"
                    placeholder="name" value="{{ old('name') }}" autofocus required>
                <label for="floatingInput">Name</label>
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-4">
                <p class="mb-0 ms-1">Gender</p>
                <select class="form-select" name="gender">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                  </select>
                @error('gender')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" name="card_id" class="form-control @error('card_id')is-invalid @enderror" id="card_id"
                    placeholder="card_id" value="{{ old('card_id') }}" autofocus required>
                <label for="floatingInput">Card ID</label>
                @error('card_id')
                    {{ $message }}
                @enderror
            </div>
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
            <small class="d-block mt-1 mb-3">Have Account? <a href="/">Login</a></small>
            <div class="container d-flex justify-content-center" style="width: 100%">
                <button class="btn text-center" style="background-color: rgba(178, 196, 252, 1)" type="submit">Register</button>
            </div>
        </div>


    </form>
@endsection
