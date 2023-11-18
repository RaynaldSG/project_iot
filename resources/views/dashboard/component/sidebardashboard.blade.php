<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="offcanvasExampleLabel" style="background-image: linear-gradient(180deg, #e0c3fc 0%, #8ec5fc 100%)">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <div class="offcanvas-body">
        <div class="container mb-2">
            <a class="text-decoration-none text-black icon-link icon-link-hover" style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/dashboard"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
        </div>
        <div class="container mb-2">
            <a class="text-decoration-none text-black icon-link icon-link-hover" style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/dashboard/profile"><i class="bi bi-person-vcard-fill me-2"></i>Profile</a>
        </div>
        <div class="container mb-2">
            <a class="text-decoration-none text-black icon-link icon-link-hover" style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/dashboard/attendance"><i class="bi bi-card-checklist me-2"></i>Attendance Log</a>
        </div>
        <hr>
        @can('admin')
        <h5 class="offcanvas-title mb-4" id="offcanvasExampleLabel">Administrator</h5>
        <div class="container mb-2">
            <a class="text-decoration-none text-black icon-link icon-link-hover" style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/dashboard/shift"><i class="bi bi-file-ruled me-2"></i>Shift</a>
        </div>
        <div class="container mb-2">
            <a class="text-decoration-none text-black icon-link icon-link-hover" style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/dashboard/user"><i class="bi bi-person-lines-fill me-2"></i>User Data</a>
        </div>
        <div class="container mb-2">
            <a class="text-decoration-none text-black icon-link icon-link-hover" style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/dashboard/log"><i class="bi bi-file-text-fill me-2"></i>Log</a>
        </div>
        <hr>
        @endcan
        <div class="container mb-2">
            <a class="text-decoration-none text-black icon-link icon-link-hover" style="font-size: 20px; --bs-icon-link-transform: translate3d(0, -0.25rem, 0);" href="/logout"><i class="bi bi-door-open-fill"></i>Logout</a>
        </div>
    </div>
</div>
