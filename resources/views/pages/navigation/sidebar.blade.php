<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="">
        <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="...">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin') ? 'active' : '' }} " href="admin">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(0.000000, 148.000000)">
                                    <path class="color-background" d="M22.5,2.5A20,20,0,1,0,42.5,22.5,20,20,0,0,0,22.5,2.5Zm0,36A16,16,0,1,1,38.5,22.5,16,16,0,0,1,22.5,38.5Zm0-30A14,14,0,1,0,8.5,22.5,14,14,0,0,0,22.5,8.5Zm0,26A12,12,0,1,1,34.5,22.5,12,12,0,0,1,22.5,34.5Zm0-22A10,10,0,1,0,12.5,22.5,10,10,0,0,0,22.5,12.5Z"/>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>                
              </div>
              <span class="nav-link-text ms-1 text-secondary">Dashboard</span>
            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('request') ? 'active' : '' }} " href="request">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12px" height="12px" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <span class="nav-link-text ms-1 text-secondary">Daftar Pengajuan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('process') ? 'active' : '' }} " href="process">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                    <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                        <path class="color-background" d="M22.5,2.5A20,20,0,1,0,42.5,22.5L22.5,22.5Z"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1 text-secondary">Daftar Proses</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('completed') ? 'active' : '' }} " href="completed">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12px" height="12px" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>                      
                </div>
                <span class="nav-link-text ms-1 text-secondary">Daftar Selesai</span>
            </a>
        </li>
  
        <li class="nav-item">
            <a class="nav-link {{ request()->is('canceled') ? 'active' : '' }} " href="canceled">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12px" height="12px" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>                                          
                </div>
                <span class="nav-link-text ms-1 text-secondary">Daftar Dibatalkan</span>
            </a>
        </li>

      </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form action="{{ route('logout') }}" method="post">@csrf
                <button type="button" class="btn bg-gradient-primary w-100" id="logout-btn">Logout</button>
            </form>

        </div>
    </div>
</aside>