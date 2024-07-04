<!DOCTYPE html>
<html>
<head>
    <title>Job Request</title>
</head>
<body>
    <p>"Hello HR Team! </p>
    <p>We have received a new job application. Details are as follows-:</p>
    <table border>
        <tr>
          <td>Name</td>
          <td>{{$data['fname']}} {{$data['lname']}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$data['email']}}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{$data['phone']}}</td>
        </tr>
        <tr>
            <td>Job request for</td>
            <td>{{$jobTitle['title']}}</td>
        </tr>
        <tr>
            <td>Resume</td>
            <td><a href="{{ url('storage/resume/'.$resumeName) }}" download="">Download</a></td>
        </tr>
        <tr>
            <td>Current CTC</td>
            <td>{{$data['cctcl']}}.{{$data['cctct']}}</td>
        </tr>
        <tr>
            <td>Expected CTC</td>
            <td>{{$data['ectcl']}}.{{$data['ectct']}}</td>
        </tr>
        <tr>
            <td>Notice Period</td>
            <td>{{$data['np']}} Days</td>
        </tr>
        <tr>
            <td>Last Company</td>
            <td>{{$data['organization']}}</td>
        </tr>
        <tr>
            <td>When you join</td>
            <td>{{$data['StartDate']}}</td>
        </tr>
    </table>

<p>Thanks</p>
   
</body>
</html>
