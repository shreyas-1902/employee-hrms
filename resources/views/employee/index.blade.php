@extends('layout.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            Payroll Management System
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">

        <h2 class="text-primary fw-bold">
            Employee List
        </h2>

        <a href="/employees/create" class="btn btn-success">
            Add Employee
        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($employees as $employee)

                    <tr>
    <td>{{ $employee->id }}</td>
    <td>{{ $employee->name }}</td>
    <td>{{ $employee->email }}</td>
    <td>{{ $employee->phone }}</td>
    <td>{{ $employee->department }}</td>
    <td>{{ $employee->designation }}</td>
    <td>₹ {{ $employee->salary }}</td>

    <td>

        <a href="/employees/{{ $employee->id }}/edit"
           class="btn btn-primary btn-sm">

            Edit

        </a>

        <form action="/employees/{{ $employee->id }}"
      method="POST"
      style="display:inline-block;"
      onsubmit="return confirm('Are you sure you want to delete this employee?')">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger btn-sm">

        Delete

    </button>

</form>

    </td>
</tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>
@endsection