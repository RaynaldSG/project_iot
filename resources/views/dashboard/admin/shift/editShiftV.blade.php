@extends('dashboard.layout.layoutdashboard')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <h5 class="text-center mt-2" style="font-weight: 700">Shift</h5>
                <form action="/dashboard/shift/{{ $shift->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="container p-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                                id="name" placeholder="name" value="{{ $shift->name }}" autofocus required>
                            <label for="floatingInput">Name</label>
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <center>
                            <div class="mb-4">
                                <p class="mb-0 ms-1">Start</p>
                                <input type="time" id="start" name="start" value="{{ $shift->start }}" required>
                                @error('start')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="mb-0 ms-1">End</p>
                                <input type="time" id="end" name="end" value="{{ $shift->end }}" required>
                                @error('end')
                                    {{ $message }}
                                @enderror
                            </div>
                        </center>
                    </div>
                    <button class="btn btn-success text-center mb-4" style="width: 100%" type="submit">Create</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
