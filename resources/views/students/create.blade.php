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
        <a class="navbar-brand" href="{{ URL::to('students') }}">Student Data</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('students') }}">View All Students</a></li>
        <li><a href="{{ URL::to('students/create') }}">Create a Student</a>
    </ul>
</nav>

<h1>Create a student</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'students')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('student_level', 'student Level') }}
        {{ Form::select('student_level', array('0' => 'Select a Level', '1' => 'Grade 1', '2' => 'Grade 2', '3' => 'Grade 3'), '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the student!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
