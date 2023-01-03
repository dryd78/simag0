<header class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><img src="/img/agronesia_headLogo.png" alt="SIMAG" width=25 class="img-thumbnail"> SIMAG</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-toggler px-3 bg-info border-0">Logout <span data-feather="log-out" class="align-text-bottom"></span></a></button>
        </form>
      </div>
    </div>
</header>