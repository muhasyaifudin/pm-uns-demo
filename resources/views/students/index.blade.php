<!DOCTYPE html>
<html>
<head>
    <title>Student App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('students') }}">Student Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('students') }}">View All students</a></li>
        <li><a href="{{ URL::to('students/create') }}">Create a student</a>
    </ul>
</nav>

<h1>All the students</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Student Level</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->grade }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the student (uses the destroy method DESTROY /students/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the student (uses the show method found at GET /students/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('students/' . $value->id) }}">Show this student</a>

                <!-- edit this student (uses the edit method found at GET /students/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('students/' . $value->id . '/edit') }}">Edit this student</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
