  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dashboard/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Hi Admin !</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      @if(request()->is('*questions*'))
      <form action="{{ URL('/sz-admin/questions') }}" method="GET">       
      @elseif(request()->is('*reports*'))
        <form action="{{ URL('/sz-admin/reports') }}" method="GET">  
      @elseif(request()->is('*comments*'))
        <form action="{{ URL('/sz-admin/comments') }}" method="GET">
      @else
        <form action="{{ URL('/sz-admin/users') }}" method="GET">
      @endif
      <div class="form-inline">
        <div class="input-group">
          <input class="form-control form-control-sidebar" type="search" name="q" placeholder="Search" >
          <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      </form>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ URL('/sz-admin/home') }}" @if(request()->is('*home*')) class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard

              <!--  <span class="right badge badge-danger">New</span>   -->

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ URL('/sz-admin/users') }}" @if(request()->is('*users*')) class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon fas fa-table"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ URL('/sz-admin/questions') }}" @if(request()->is('*questions*')) class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon fas fa-th"></i>
              <p>
                Questions
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ URL('/sz-admin/comments') }}" @if(request()->is('*comments*')) class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Comments
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" @if(request()->is('*words*')) class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Words
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/words') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/words/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>             

            </ul>

          </li>

          <li class="nav-item">
            <a href="#" @if(request()->is('*ads*')) class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Ads
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ App\Models\Ad::count() }}</span>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/ads') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/ads/new') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Ad</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/ads?sort=new') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/ads?sort=active') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/ads?sort=finish') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expired</p>
                </a>
              </li>


            </ul>

          </li>

          <li class="nav-item">
            <a href="#" @if(request()->is('*reports*')) class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ App\Models\Report::count() }}</span>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/reports') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/reports?sort=users') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/reports?sort=questions') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Questions</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ URL('/sz-admin/reports?sort=comments') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comments</p>
                </a>
              </li>              

            </ul>

          </li>


          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
            <button class="nav-link">
              <i class="nav-icon fas fa-door-open"></i>
              <p>
                Logout
              </p>
          </button>
          </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>