@extends('admin.layout.layout')
@section('content')
@php
use App\Models\AdminsRole;
@endphp
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

              @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error:</strong>{{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')

            <div class="row">
              <div class="card w-100">
                <div class="card-header">
                  <h4>File Management Module</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{ count($allFiles) }}</h3>
      
                          <p>All Files</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="/admin/all-files" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{ count($linkedFiles) }}</h3>
      
                          <p>Linked Files</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/admin/linked-files" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>{{ count($unlinkedFiles) }}</h3>
      
                          <p>Unlinked Files</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/admin/unlinked-files" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    {{-- <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>65</h3>
      
                          <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div> --}}
                    <!-- ./col -->
                  </div>
                </div>
              </div>
            </div>

        @endif

        @if(AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->count() != 0 || Auth::guard('admin')->user()->type == 'admin')

            <div class="row">
              <div class="card w-100">
                <div class="card-header">
                  <h4>Header & Footer Module</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">CPU Traffic</span>
                          <span class="info-box-number">
                            10
                            <small>%</small>
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">Likes</span>
                          <span class="info-box-number">41,410</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
          
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>
          
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">Sales</span>
                          <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">New Members</span>
                          <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
              </div>
            </div>
            
        @endif
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
