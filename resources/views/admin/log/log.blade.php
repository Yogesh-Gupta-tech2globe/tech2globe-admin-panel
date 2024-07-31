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
                  <button style="max-width: 100px; float: right;" class="btn btn-block btn-primary mt-2 mx-2" id="logsExport">Export</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="logTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Module</th>
                      <th>Sub Module</th>
                      <th>Activity</th>
                      <th>File name</th>
                      <th>User</th>
                      <th>User Role</th>
                      <th>Modified On</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $row)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->getExtraProperty('module') }}</td>
                            <td>{{ $row->getExtraProperty('submodule') }}</td>
                            <td>{{ $row['log_name'] }} {{$row['description']}}</td>
                            <td>
                                @php $name = $row['subject_type']::where('id',$row['subject_id'])->first(); @endphp
                                @if($name->categoryName)
                                    {{$name->categoryName}}
                                @elseif($name->subCategoryName)
                                    {{$name->subCategoryName}}
                                @elseif($name->page_name)
                                    {{$name->page_name}}
                                @elseif($name->sub_category_name)
                                    {{$name->sub_category_name}}
                                @elseif($name->file_name)
                                    {{$name->file_name}}
                                @elseif($name->title)
                                    {{$name->title}}
                                @elseif($name->fname)
                                    {{$name->fname}} {{$name->lname}}
                                @elseif($name->customer_name)
                                    {{$name->customer_name}}
                                @elseif($name->page_url)
                                    {{$name->page_url}}
                                @elseif($name->question)
                                    {{ Str::limit($name->question, 20, ' ...') }}
                                @elseif($name->blog_id)
                                    {{$name->blog_id}}
                                @elseif($name->admin_id)
                                  @php $aname = App\Models\Admin::where('id',$name->admin_id)->first(); @endphp
                                    {{$aname->name}}
                                @else
                                    {{$name->name}}
                                @endif
                            </td>
                            <td>{{ $row->admins->name }}</td>
                            <td>{{ $row->admins->role }}</td>
                            <td>{{ $row['created_at'] }}</td>
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

<!-- xlsx library -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>

<script>
$(document).ready(function() {
    $("#logTable").DataTable({
        
    });

    $('#logsExport').click(function() {
        // Create a workbook
        var wb = XLSX.utils.book_new();
        wb.Props = {
            Title: "Logs",
            Subject: "Exported Data",
            Author: "Admin",
            CreatedDate: new Date()
        };
        
        // Convert table to worksheet
        var ws = XLSX.utils.table_to_sheet(document.getElementById('logTable'));
        
        // Add worksheet to workbook
        XLSX.utils.book_append_sheet(wb, ws, "logs");
        
        // Write workbook and trigger download
        XLSX.writeFile(wb, 'logs.xlsx');
    });
});
</script>

@endsection
