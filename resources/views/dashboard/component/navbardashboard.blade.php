<nav class="navbar navbar-expand-lg bg-body-tertiary"
    style="background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%)">
    <div class="container-fluid">
        <div class="justify-content-start align-items-center" style="width: 25%">
            <a class="btn border-white border-1" data-bs-toggle="offcanvas" href="#sidebar" role="button"
                aria-controls="offcanvasExample" style="background-color: rgba(224, 195, 252, 0.4)">
                <i class="bi bi-list"></i>
            </a>
        </div>
        <a class="navbar-brand m-0" href="/dashboard" style="font-weight: 700">IoTAbs</a>
        <div class="justify-content-end d-flex" style="width: 25%" id="navbarSupportedContent">
            <a href="/dashboard/profile"><img class="img-fluid" style="height: 30px;" src="\assets\img\dashboard\profileNav.png" alt="{{ auth()->user()->name }}"></a>
        </div>
    </div>
</nav>
