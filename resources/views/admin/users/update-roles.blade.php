@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                 <!-- form start -->
                 @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success:</strong>{{ Session::get('success_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                
                
                    <div class="card-body">
                      {{-- <form name="usersForm" id="usersForm" action="{{ url('admin/update-role/'.$id) }}"method="post">@csrf
                        @if(!empty($userRoles))
                        @foreach ($userRoles as $role)
                          @if($role['module']=="portfolio")
                            @if($role['view_access']==1)
                              @php $viewPortfolio = "checked" @endphp
                            @else
                              @php $viewPortfolio = "" @endphp
                            @endif
                            @if($role['edit_access']==1)
                              @php $editPortfolio = "checked" @endphp
                            @else
                              @php $editPortfolio = "" @endphp
                            @endif
                            @if($role['full_access']==1)
                              @php $fullPortfolio = "checked" @endphp
                            @else
                              @php $fullPortfolio = "" @endphp
                            @endif
                          @endif
                        @endforeach
                        @endif
                        <input type="hidden" value="{{$id}}" name="user_id">
                        <input type="hidden" value="portfolio" name="module">
                        <div class="form-group">
                          <label for="layout">Portfolio: &nbsp;&nbsp;&nbsp;</label>
                          <input type="checkbox" name="portfolio[view]" value="1" @if(isset($viewPortfolio)) {{ $viewPortfolio }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="checkbox" name="portfolio[edit]" value="1" @if(isset($editPortfolio)) {{ $editPortfolio }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="checkbox" name="portfolio[full]" value="1" @if(isset($fullPortfolio)) {{ $fullPortfolio }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                      </form> --}}
                      {{-- <form name="usersForm" id="usersForm" action="{{ url('admin/update-role/'.$id) }}"method="post">@csrf
                        @if(!empty($userRoles))
                          @foreach ($userRoles as $role)
                            @if($role['module']=="layout")
                              @if($role['view_access']==1)
                                @php $viewLayout = "checked" @endphp
                              @else
                                @php $viewLayout = "" @endphp
                              @endif
                              @if($role['edit_access']==1)
                                @php $editLayout = "checked" @endphp
                              @else
                                @php $editLayout = "" @endphp
                              @endif
                              @if($role['full_access']==1)
                                @php $fullLayout = "checked" @endphp
                              @else
                                @php $fullLayout = "" @endphp
                              @endif
                            @endif
                          @endforeach
                          @endif
                          <input type="hidden" value="{{$id}}" name="user_id">
                          <input type="hidden" value="layout" name="module">
                          <div class="form-group">
                              <label for="layout">Layout: &nbsp;&nbsp;&nbsp;</label>
                              <input type="checkbox" name="layout[view]" value="1" @if(isset($viewLayout)) {{ $viewLayout }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="layout[edit]" value="1" @if(isset($editLayout)) {{ $editLayout }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="layout[full]" value="1" @if(isset($fullLayout)) {{ $fullLayout }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                      </form> --}}
                      {{-- <form name="usersForm" id="usersForm" action="{{ url('admin/update-role/'.$id) }}"method="post">@csrf
                        @if(!empty($userRoles))
                          @foreach ($userRoles as $role)
                            @if($role['module']=="layout")
                              @if($role['view_access']==1)
                                @php $viewLayout = "checked" @endphp
                              @else
                                @php $viewLayout = "" @endphp
                              @endif
                              @if($role['edit_access']==1)
                                @php $editLayout = "checked" @endphp
                              @else
                                @php $editLayout = "" @endphp
                              @endif
                              @if($role['full_access']==1)
                                @php $fullLayout = "checked" @endphp
                              @else
                                @php $fullLayout = "" @endphp
                              @endif
                            @endif
                          @endforeach
                          @endif
                          <input type="hidden" value="{{$id}}" name="user_id">
                          <input type="hidden" value="layout" name="module">
                          <div class="form-group">
                              <label for="layout">Tech2Globe Layout: &nbsp;&nbsp;&nbsp;</label>
                              <input type="checkbox" name="layout[view]" value="1" @if(isset($viewLayout)) {{ $viewLayout }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="layout[edit]" value="1" @if(isset($editLayout)) {{ $editLayout }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="layout[full]" value="1" @if(isset($fullLayout)) {{ $fullLayout }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                      </form> --}}
                      <form name="usersForm" id="usersForm" action="{{ url('admin/update-role/'.$id) }}"method="post">@csrf
                        @if(!empty($userRoles))
                          @foreach ($userRoles as $role)
                            @if($role['module']=="fileManagement")
                              @if($role['view_access']==1)
                                @php $viewFileManagement = "checked" @endphp
                              @else
                                @php $viewFileManagement = "" @endphp
                              @endif
                              @if($role['edit_access']==1)
                                @php $editFileManagement = "checked" @endphp
                              @else
                                @php $editFileManagement = "" @endphp
                              @endif
                              @if($role['full_access']==1)
                                @php $fullFileManagement = "checked" @endphp
                              @else
                                @php $fullFileManagement = "" @endphp
                              @endif
                            @endif
                          @endforeach
                          @endif
                          <input type="hidden" value="{{$id}}" name="user_id">
                          <input type="hidden" value="fileManagement" name="module">
                          <div class="form-group">
                              <label for="fileManagement">File Management: &nbsp;&nbsp;&nbsp;</label>
                              <input type="checkbox" name="fileManagement[view]" value="1" @if(isset($viewFileManagement)) {{ $viewFileManagement }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="fileManagement[edit]" value="1" @if(isset($editFileManagement)) {{ $editFileManagement }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="fileManagement[full]" value="1" @if(isset($fullFileManagement)) {{ $fullFileManagement }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                      </form>
                      <form name="usersForm" id="usersForm" action="{{ url('admin/update-role/'.$id) }}"method="post">@csrf
                        @if(!empty($userRoles))
                          @foreach ($userRoles as $role)
                            @if($role['module']=="headfoot")
                              @if($role['view_access']==1)
                                @php $viewheadfoot = "checked" @endphp
                              @else
                                @php $viewheadfoot = "" @endphp
                              @endif
                              @if($role['edit_access']==1)
                                @php $editheadfoot = "checked" @endphp
                              @else
                                @php $editheadfoot = "" @endphp
                              @endif
                              @if($role['full_access']==1)
                                @php $fullheadfoot = "checked" @endphp
                              @else
                                @php $fullheadfoot = "" @endphp
                              @endif
                            @endif
                          @endforeach
                          @endif
                          <input type="hidden" value="{{$id}}" name="user_id">
                          <input type="hidden" value="headfoot" name="module">
                          <div class="form-group">
                              <label for="headfoot">Header & Footer: &nbsp;&nbsp;&nbsp;</label>
                              <input type="checkbox" name="headfoot[view]" value="1" @if(isset($viewheadfoot)) {{ $viewheadfoot }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="headfoot[edit]" value="1" @if(isset($editheadfoot)) {{ $editheadfoot }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="headfoot[full]" value="1" @if(isset($fullheadfoot)) {{ $fullheadfoot }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                      </form>
                      <form name="usersForm" id="usersForm" action="{{ url('admin/update-role/'.$id) }}"method="post">@csrf
                        @if(!empty($userRoles))
                          @foreach ($userRoles as $role)
                            @if($role['module']=="ourWork")
                              @if($role['view_access']==1)
                                @php $viewourWork = "checked" @endphp
                              @else
                                @php $viewourWork = "" @endphp
                              @endif
                              @if($role['edit_access']==1)
                                @php $editourWork = "checked" @endphp
                              @else
                                @php $editourWork = "" @endphp
                              @endif
                              @if($role['full_access']==1)
                                @php $fullourWork = "checked" @endphp
                              @else
                                @php $fullourWork = "" @endphp
                              @endif
                            @endif
                          @endforeach
                          @endif
                          <input type="hidden" value="{{$id}}" name="user_id">
                          <input type="hidden" value="ourWork" name="module">
                          <div class="form-group">
                              <label for="ourWork">Our Work: &nbsp;&nbsp;&nbsp;</label>
                              <input type="checkbox" name="ourWork[view]" value="1" @if(isset($viewourWork)) {{ $viewourWork }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="ourWork[edit]" value="1" @if(isset($editourWork)) {{ $editourWork }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="ourWork[full]" value="1" @if(isset($fullourWork)) {{ $fullourWork }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                      </form>
                      <form name="usersForm" id="usersForm" action="{{ url('admin/update-role/'.$id) }}"method="post">@csrf
                        @if(!empty($userRoles))
                          @foreach ($userRoles as $role)
                            @if($role['module']=="Extras")
                              @if($role['view_access']==1)
                                @php $viewExtras = "checked" @endphp
                              @else
                                @php $viewExtras = "" @endphp
                              @endif
                              @if($role['edit_access']==1)
                                @php $editExtras = "checked" @endphp
                              @else
                                @php $editExtras = "" @endphp
                              @endif
                              @if($role['full_access']==1)
                                @php $fullExtras = "checked" @endphp
                              @else
                                @php $fullExtras = "" @endphp
                              @endif
                            @endif
                          @endforeach
                          @endif
                          <input type="hidden" value="{{$id}}" name="user_id">
                          <input type="hidden" value="Extras" name="module">
                          <div class="form-group">
                              <label for="fileManagement">Extras: &nbsp;&nbsp;&nbsp;</label>
                              <input type="checkbox" name="Extras[view]" value="1" @if(isset($viewExtras)) {{ $viewExtras }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="Extras[edit]" value="1" @if(isset($editExtras)) {{ $editExtras }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="Extras[full]" value="1" @if(isset($fullExtras)) {{ $fullExtras }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                      </form>
                    </div>
                    <!-- /.card-body -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
