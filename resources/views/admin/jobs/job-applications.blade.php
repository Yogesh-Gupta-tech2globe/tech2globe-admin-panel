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
                            <button style="max-width: 100px; float: right;" class="btn btn-block btn-primary mt-2" id="jobRequestSendMail">Send Mail</button>
                            <button style="max-width: 100px; float: right;" class="btn btn-block btn-primary mt-2 mx-2" id="jobRequestExport">Export</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="jobApplicationTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Job Vacancy</th>
                                        <th>Contact No.</th>
                                        <th>Apply Date</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Download Resume</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row['fname'] }}</td>
                                        <td>{{ $row['lname'] }}</td>
                                        <td>{{ $row['email'] }}</td>
                                        <td>
                                            @foreach ($alljobs as $item)
                                            @if ($item['id'] == $row['vacancy_id'])
                                            {{$item['title']}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $row['phone'] }}</td>
                                        <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                                        <td>
                                            @if ($row['status'] == 1)
                                            {{"Pending"}}
                                            @elseif($row['status'] == 2)
                                            {{"Reviewed"}}
                                            @elseif($row['status'] == 3)
                                            {{"In Progress"}}
                                            @else
                                            {{"Completed"}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                            <a href="" class="update-jobRequest-status" data-toggle="modal" data-target="#update-status" data-status="{{ $row['status'] }}" data-id="{{ $row['id'] }}">Edit</a>
                                            @endif
                                        </td>
                                        <td><a href="{{ url('storage/resume/'.$row['file']) }}" download="">Download</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             <!-- Preloader -->
                            <div class="rocketloader text-center m-5" style="display: none">
                              <img src="{{ url('admin/img/1476.gif') }}" alt="preloader">
                            </div>
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

<div class="modal fade" id="update-status">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <form id="update-jobRequest-status" action="update-jobRequest-status" method="post">@csrf
                <div class="modal-header">
                    <h4 class="modal-title">Edit {{$pagename}} Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Status</label>
                        <select class="form-control" name="status" required id="showjobstatus">
                            <option value="1">Pending</option>
                            <option value="2">Reviewed</option>
                            <option value="3">In Progress</option>
                            <option value="4">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- xlsx library -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>

<script>
$(document).ready(function() {
    $("#jobApplicationTable").DataTable({
        
    });

    $('#jobRequestExport').click(function() {
        // Create a workbook
        var wb = XLSX.utils.book_new();
        wb.Props = {
            Title: "Job Applications",
            Subject: "Exported Data",
            Author: "Admin",
            CreatedDate: new Date()
        };
        
        // Convert table to worksheet
        var ws = XLSX.utils.table_to_sheet(document.getElementById('jobApplicationTable'));
        
        // Add worksheet to workbook
        XLSX.utils.book_append_sheet(wb, ws, "Job Applications");
        
        // Write workbook and trigger download
        XLSX.writeFile(wb, 'JobApplications.xlsx');
    });
});
</script>

@endsection
