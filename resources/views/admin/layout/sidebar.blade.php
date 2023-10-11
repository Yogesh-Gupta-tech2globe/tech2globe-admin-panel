 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="{{ url('admin/img/tech2globe-logo.jpg') }}" alt="Tech2globe Logo" class="brand-image elevation-3" style="">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('admin/img/photos/'.Auth::guard('admin')->user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Session::get('page')=="dashboard")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="update_password" || Session::get('page')=="update_details")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="#" class="nav-link {{ $active}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Setting
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if(Session::get('page')=="update_password")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/update-password" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Update Admin Password</p>
                  </a>
                </li>
                @if(Session::get('page')=="update_details")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/update-details" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Update Admin Details</p>
                  </a>
                </li>
              </ul>
            </li>
            @if(Session::get('page')=="users")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="/admin/users" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
          @endif
          @if(Session::get('page')=="portfolio")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="/admin/portfolio" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Portfolio
              </p>
            </a>
          </li>
          @if(Session::get('page')=="landing_pages")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="/admin/landing-pages" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Layout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
