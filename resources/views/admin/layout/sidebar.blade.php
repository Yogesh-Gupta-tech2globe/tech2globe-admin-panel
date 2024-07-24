<?php
use App\Models\AdminsRole;
?>
 
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
          
          @if(Session::get('page')=="update_password" || Session::get('page')=="update_details")
            @php $active="active" @endphp
          @else
            @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link {{ $active}}">
              <i class="nav-icon fas fa-user-cog"></i>
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
                  <p>Update Password</p>
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
                  <p>Update Details</p>
                </a>
              </li>
            </ul>
          </li>

          @if(Auth::guard('admin')->user()->type == 'admin')
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

          @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="file_management" || Session::get('page')=="linked_files" || Session::get('page')=="unlinked_files" || Session::get('page')=="css_files" || Session::get('page')=="js_files" || Session::get('page')=="include_files")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-folder-open"></i>
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

                @if(Session::get('page')=="css_files")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/css-files" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>CSS File</p>
                  </a>
                </li>

                @if(Session::get('page')=="js_files")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/js-files" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>JS File</p>
                  </a>
                </li>

                @if(Session::get('page')=="include_files")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/include-files" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Include Files</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="tech2globe_header" || Session::get('page')=="tech2globe_mobile_header" || Session::get('page')=="tech2globe_footer")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="/admin/tech2globe-layout" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-wave-square"></i>
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

                {{-- @if(Session::get('page')=="tech2globe_mobile_header")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/tech2globe-layout/mobile-header" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mobile Header</p>
                  </a>
                </li> --}}

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
          @endif

          @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'ourWork'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="our_work" || Session::get('page')=="testimonial" || Session::get('page')=="portfolio" || Session::get('page')=="case_study" || Session::get('page')=="faq" || Session::get('page')=="blog")
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
                  <a href="/admin/testimonial" class="nav-link {{ $active}}">
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
                  <a href="/admin/case-study" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Case Study</p>
                  </a>
                </li>

                @if(Session::get('page')=="faq")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/faq" class="nav-link {{ $active}}">
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
                  <a href="/admin/blog" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blog</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="extras" || Session::get('page')=="site_logo" || Session::get('page')=="company_branch" || Session::get('page')=="contact_social" || Session::get('page')=="achievements" || Session::get('page')=="recaptcha")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Extras
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                @if(Session::get('page')=="site_logo")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/site-logo" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Site Logo</p>
                  </a>
                </li>

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
                  <a href="/admin/achievements" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Achievements</p>
                  </a>
                </li>

                @if(Session::get('page')=="recaptcha")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/recaptcha" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Recaptcha Keys</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Event'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="event")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="/admin/event" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-calendar-plus"></i>
                <p>
                  {{"Event"}}
                </p>
              </a>
            </li>
          @endif

          @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Jobs'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="jobs" || Session::get('page')=="job_applications")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Jobs
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                @if(Session::get('page')=="jobs")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/jobs" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jobs</p>
                  </a>
                </li>

                @if(Session::get('page')=="job_applications")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/job-applications" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Job Applications</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          @if(Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="logs")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="/admin/logs" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  {{"Logs"}}
                </p>
              </a>
            </li>
          @endif

          @if(Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="seo")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="/admin/seo" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                  {{"SEO"}}
                </p>
              </a>
            </li>
          @endif

          @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')
            @if(Session::get('page')=="rtestimonial" || Session::get('page')=="rportfolio" || Session::get('page')=="rcase_study" || Session::get('page')=="rfaq")
              @php $active="active" @endphp
            @else
              @php $active="" @endphp
            @endif
            <li class="nav-item">
              <a href="" class="nav-link {{ $active }}">
                <i class="nav-icon fas fa-dice-d20"></i>
                <p>
                  Resources
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                @if(Session::get('page')=="rtestimonial")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/resources/testimonial" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Testimonial</p>
                  </a>
                </li>

                @if(Session::get('page')=="rportfolio")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/resources/portfolio" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Portfolio</p>
                  </a>
                </li>

                @if(Session::get('page')=="rcase_study")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/resources/case-study" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Case Study</p>
                  </a>
                </li>

                @if(Session::get('page')=="rfaq")
                  @php $active="active" @endphp
                @else
                  @php $active="" @endphp
                @endif
                <li class="nav-item">
                  <a href="/admin/resources/faq" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FAQs</p>
                  </a>
                </li>

              </ul>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
