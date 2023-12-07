<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-white" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="{{ asset('assets') }}/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('admin') ? 'active bg-gradient-dark' : 'active text-dark' }} " href="admin">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">analytics</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('request') ? 'active bg-gradient-dark' : 'active text-dark' }} " href="request">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">list_alt</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Pengajuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('process') ? 'active bg-gradient-dark' : 'active text-dark' }} " href="process">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">running_with_errors</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Proses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('completed') ? 'active bg-gradient-dark' : 'active text-dark' }} " href="completed">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">checklist</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Selesai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('canceled') ? 'active bg-gradient-dark' : 'active text-dark' }} " href="canceled">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">sentiment_dissatisfied</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Dibatalkan</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form action="{{ route('logout') }}" method="post">@csrf
                <button type="submit" class="btn bg-gradient-info w-100">Logout</button>
            </form>

        </div>
    </div>
</aside>