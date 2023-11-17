@extends('dashboard.layout.layoutdashboard')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="d-flex justify-content-center">
                    <img src=" @if (auth()->user()->image)
                        {{ asset('storage/' . auth()->user()->image) }}
                    @else
                        \assets\img\dashboard\profile.png
                    @endif
                    " class="img-fluid"  style="width: 50%; border-radius: 50%" alt="profile.png">
                </div>
                <h5 class="text-center mt-2" style="font-weight: 700">PROFILE</h5>
                <form action="/dashboard/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container p-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                                id="name" placeholder="name" value="{{ auth()->user()->name }}" autofocus required>
                            <label for="floatingInput">Name</label>
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <p class="mb-0 ms-1">Gender</p>
                            <select class="form-select" name="gender">
                                <option value="male" @if (auth()->user()->gender === 'male') selected @endif>Male</option>
                                <option value="female" @if (auth()->user()->gender === 'female') selected @endif>Female</option>
                            </select>
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" name="card_id" class="form-control @error('card_id')is-invalid @enderror"
                                id="card_id" placeholder="card_id" value="{{ auth()->user()->card_id }}" required>
                            <label for="floatingInput">Card ID</label>
                            @error('card_id')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="container m-0 p-0">
                            <label for="image"
                                class="form-label @error('image')
                                is-invalid
                                @enderror">Upload
                                Image</label>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="d-flex justify-content-center">
                                    <img class="img-preview img-fluid" style="width: 250px; height: 250px; border-radius: 50%; overflow:hidden; object-fit: cover">
                            </div>
                            <input class="form-control mt-4" name="image" type="file" id="image"
                                onchange="previewImage()">
                        </div>
                    </div>
                    <button class="btn btn-warning text-center mb-4" style="width: 100%" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function previewImage(){
    const image = document.querySelector('#image');
    const imgPrev = document.querySelector('.img-preview');

    imgPrev.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
        imgPrev.src = oFREvent.target.result;
    }
}
</script>
@endsection
