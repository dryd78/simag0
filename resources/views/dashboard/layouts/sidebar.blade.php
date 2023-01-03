<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                  <span data-feather="home" class="align-text-bottom"></span>
                  Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/employees*') ? 'active' : '' }}" href="/dashboard/employees">
                <span data-feather="database" class="align-text-bottom"></span>
                Human Resources
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/finance*') ? 'active' : '' }}" href="/dashboard/finance">
                <span data-feather="database" class="align-text-bottom"></span>
                Finance
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                <span data-feather="file-text" class="align-text-bottom"></span>
                My Reports
                </a>
            </li>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>S A L E S</span>
          </h6>
        
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/sales/inkaba*') ? 'active' : '' }}" href="/dashboard/sales/inkaba">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Sales | Inkaba
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/sales/SpBdg*') ? 'active' : '' }}" href="/dashboard/sales/SpBdg">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Sales | Saripetojo Bandung
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/sales/SpCrb*') ? 'active' : '' }}" href="/dashboard/sales/SpCrb">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Sales | Saripetojo Cirebon
                </a>
            </li>

          @can('admin')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>ADMINISTRATOR</span>
          </h6>
          <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/register*') ? 'active' : '' }}" href="/dashboard/register">
                <span data-feather="user-plus" class="align-text-bottom"></span>
                Add New User
                </a>
              </li>
              
              <li>
                <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="/dashboard/products">
                <span data-feather="codepen" class="align-text-bottom"></span>
                Products
                </a>
              </li>
          </ul>
          @endcan
      
    </div>
</nav>