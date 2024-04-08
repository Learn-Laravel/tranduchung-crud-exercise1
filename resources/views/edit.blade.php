<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <h1>Edit Student</h1>
    <form action="{{ route('update')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name"></label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name')  ?? $studentDetail -> name }}">
        </div>
        <div class="mb-3">
            <label for="phone"></label>
            <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') ?? $studentDetail -> phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('index') }}" class="btn btn-warning">Quay lai</a>
    </form>
</body>
