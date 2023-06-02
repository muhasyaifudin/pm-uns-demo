<!DOCTYPE html>
<html>
<head>
    <title>student App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('students') }}">Student Data</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('students') }}">View All Students</a></li>
        <li><a href="{{ URL::to('students/create') }}">Create a Student</a>
    </ul>
</nav>

<h1>Showing {{ $student->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $student->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $student->email }}<br>
            <strong>Level:</strong> {{ $student->grade }}
        </p>
    </div>

</div>
</body>
</html>
