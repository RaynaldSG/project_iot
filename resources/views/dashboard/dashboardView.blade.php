@extends('dashboard.layout.layoutdashboard')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-3">
            <img src="\assets\img\dashboard\profile.png" class="img-fluid" alt="profile.png"  style="border-radius: 50%" >
        </div>
    </div>
    <div class="row justify-content-center ms-2 mt-5 pb-2" style="">
        <div class="text-center mt-2">
            <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
            <h3>Shift Time: {{ auth()->user()->shift->start }} - {{ auth()->user()->shift->end }}</h3>
            <h4 id="countdown">Shift Start: {{ $countdown }}</h4>
        </div>
    </div>

    <script>
        const countdownID = document.getElementById("countdown");
        const temp = "<?= $startTime?>";
        const time = new Date(temp).getTime();

        var x = setInterval(function () {
            var now = new Date().getTime();
            var interval = time - now;

            var hours = Math.floor((interval % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((interval % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((interval % (1000 * 60)) / 1000);

            countdownID.innerHTML = "Shift Start: " + hours + " Hours, "+ minutes + " Minutes, " + seconds + " Seconds ";

            if (interval < 0) {
                var interval = Math.abs(time - now);

                var hours = Math.floor((interval % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((interval % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((interval % (1000 * 60)) / 1000);
                countdownID.innerHTML = "Shift Start: " + hours + " Hours, "+ minutes + " Minutes, " + seconds + " Seconds ago";
            }
        }, 1000);

    </script>

@endsection
