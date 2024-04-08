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
    <div class="container">
        <div class="row">
            <h1>Quản Lý Sinh viên</h1>
        </div>
        <div class="row d-flex">
            <div class="col-4">
                <a href="{{ route('create') }}" class="btn btn-info">Add Student</a>
            </div>
            <div class="col-6">
                <label for="">Tìm kiếm</label>
                <input type="text" id="search" name="search">
            </div>
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($students))
                        @foreach ($students as $key => $student)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>
                                    <a href="{{ route('edit', ['id' => $student->id])}}">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('delete', ['id' => $student->id])}}" onclick="return confirm('Ban co muon xoa khong')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
