 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="{{ url('admin/img/tech2globe-logo.png') }}" alt="Tech2globe Logo" class="brand-image" width="100%" style="">
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
          {{-- @if(Session::get('page')=="portfolio")
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
          </li> --}}


          {{-- @if(Session::get('page')=="layout" || Session::get('page')=="all_layout")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="/admin/layout" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Layout
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="layout")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/layout" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layout</p>
                </a>
              </li>
              @if(Session::get('page')=="all_layout")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/all-layout" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Layouts</p>
                </a>
              </li>
            </ul>
          </li> --}}

          @if(Session::get('page')=="file_management" || Session::get('page')=="linked_files" || Session::get('page')=="unlinked_files")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                File Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if(Session::get('page')=="file_management")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/all-files" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Files</p>
                </a>
              </li>

              @if(Session::get('page')=="linked_files")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/linked-files" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Linked Files</p>
                </a>
              </li>

              @if(Session::get('page')=="unlinked_files")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/unlinked-files" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unlinked Files</p>
                </a>
              </li>
            </ul>
          </li>

          @if(Session::get('page')=="tech2globe_header" || Session::get('page')=="tech2globe_footer")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="/admin/tech2globe-layout" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-glasses"></i>
              <p>
                Header & Footer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              @if(Session::get('page')=="tech2globe_header")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/tech2globe-layout/header" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Header</p>
                </a>
              </li>

              @if(Session::get('page')=="tech2globe_footer")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/tech2globe-layout/footer" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Footer</p>
                </a>
              </li>
            </ul>
          </li>

          @if(Session::get('page')=="our_work" || Session::get('page')=="testimonial" || Session::get('page')=="portfolio" || Session::get('page')=="case_study" || Session::get('page')=="faqs" || Session::get('page')=="blog")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-pen-fancy"></i>
              <p>
                Our Work
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if(Session::get('page')=="testimonial")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonial</p>
                </a>
              </li>

              @if(Session::get('page')=="portfolio")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/portfolio" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Portfolio</p>
                </a>
              </li>

              @if(Session::get('page')=="case_study")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Case Study</p>
                </a>
              </li>

              @if(Session::get('page')=="faqs")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>

              @if(Session::get('page')=="blog")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
            </ul>
          </li>

          @if(Session::get('page')=="extras" || Session::get('page')=="company_branch" || Session::get('page')=="contact_social" || Session::get('page')=="achievements" || Session::get('page')=="captcha")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-gopuram"></i>
              <p>
                Extras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if(Session::get('page')=="company_branch")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/company-branch" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Branch Handling</p>
                </a>
              </li>

              @if(Session::get('page')=="contact_social")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="/admin/contact-social" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact & Social Media</p>
                </a>
              </li>

              @if(Session::get('page')=="achievements")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Acheivements</p>
                </a>
              </li>

              @if(Session::get('page')=="captcha")
                @php $active="active" @endphp
              @else
                @php $active="" @endphp
              @endif
              <li class="nav-item">
                <a href="" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recaptcha Keys (V2)</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
