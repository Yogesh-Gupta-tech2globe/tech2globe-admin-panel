@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if(Session::has('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success:</strong>{{ Session::get('success_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if(Session::has('error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error:</strong>{{ Session::get('error_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $pagename }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="">Our Work</a></li>
              <li class="breadcrumb-item active">{{ $pagename }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{ $pagename }}</h3>
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                  <a style="max-width: 150px; float: right;" href="{{ url('admin/add-edit-faq') }}" class="btn btn-block btn-primary mt-2">Link {{ $pagename }}</a>
                  @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="portfolio" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Linked Page</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                        @foreach($faq as $row)
                            <tr>
                            <td>{{ $i++; }}</td>
                            <td>{{ Str::limit($row['question'], 20, ' ...') }}</td>
                            <td>{{ Str::limit($row['answer'], 20, ' ...') }}</td>
                            <td>
                                @foreach ($allInnerPages as $item)
                                    @if($item['id'] == $row['page_id']) {{ $item['page_name'] }} | {{$item['page_url']}} @endif
                                @endforeach
                            </td>
                            <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                            <td>
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                @if ($row['status']==1)
                                    <a class="updateFaqStatus" id="faq-{{ $row['id'] }}" faq_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                @else
                                    <a class="updateFaqStatus" id="faq-{{ $row['id'] }}" faq_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                @endif
                                &nbsp;&nbsp;
                                @endif
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                <a href="{{ url('admin/add-edit-faq/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                                &nbsp;&nbsp;
                                @endif
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
