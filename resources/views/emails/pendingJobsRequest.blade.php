<!DOCTYPE html>
<html>
<head>
    <title>Pending Job Requests</title>
</head>
<body>
    <p>"Hello Admin! </p>
    <p>There are {{count($pendingJobsRequest)}} Job request at Tech2globe, which require your attention.</p>

    <table border>
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
                <th>Download Resume</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingJobsRequest as $row)
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
                <td><a href="{{ url('storage/resume/'.$row['file']) }}" download="">Download</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

<p>Thanks</p>
   
</body>
</html>
