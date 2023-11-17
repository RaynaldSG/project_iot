@extends('dashboard.layout.layoutdashboard')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-3 d-flex justify-content-center">
            <img src="@if (auth()->user()->image)
            {{ asset('storage/' . auth()->user()->image) }}
        @else
            \assets\img\dashboard\profile.png
        @endif
        " class="img-fluid" alt="profile.png"  style="border-radius: 50%" >
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
        const tempStart = "<?= $startTime?>";
        const tempEnd  = "<?= $endTime?>";
        const timeS = new Date(tempStart).getTime();
        const timeE = new Date(tempEnd).getTime();


        var x = setInterval(function () {
            var now = new Date().getTime();
            var dateNow = new Date();
            var interval = timeS - now;
            var checkEnd = timeE - now;

            if(interval > 0){
                var hours = Math.floor((interval % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((interval % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((interval % (1000 * 60)) / 1000);
                countdownID.innerHTML = "Shift Start: " + hours + " Hours, "+ minutes + " Minutes, " + seconds + " Seconds ";
            }

            else if (interval < 0 && checkEnd < 0) {
                var date = dateNow.getDate() - 1;
                var month = dateNow.getMonth() + 1;
                var year = dateNow.getFullYear();
                var hour = dateNow.getHours();
                var min = dateNow.getMinutes();
                var sec = dateNow.getSeconds();

                var strDatetime = year + '-' + month + '-' + date + ' ' + hour+ ':' + min + ':' + sec;
                var dateTimeCount = new Date(strDatetime);

                interval = timeS - dateTimeCount.getTime();
                console.log(interval);

                var hours = Math.floor((interval % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((interval % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((interval % (1000 * 60)) / 1000);
                countdownID.innerHTML = "Shift Start: " + hours + " Hours, "+ minutes + " Minutes, " + seconds + " Seconds";
            }

            else{
                var interval = Math.abs(timeE - now);
                var hours = Math.floor((interval % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((interval % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((interval % (1000 * 60)) / 1000);

                countdownID.innerHTML = "Shift End: " + hours + " Hours, "+ minutes + " Minutes, " + seconds + " Seconds ";
            }

        }, 1000);

    </script>

@endsection
