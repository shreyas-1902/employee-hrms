@extends('layout.app')

@section('content')

<div class="container col-12">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h4 class="mb-0">Salary Structure List</h4>

            <a href="/salary/create" class="btn btn-primary btn-sm">
                + Add Salary
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Employee</th>
                        <th>Salary Month</th>
                        <th>Basic Salary</th>
                        <th>HRA</th>
                        <th>DA</th>
                        <th>Bonus</th>
                        <th>Deductions</th>
                        <th>Net Salary</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($salaries as $salary)

                        <tr>
                            <td>{{ $salary->id }}</td>
                            <td>{{ $salary->employee->name ?? 'N/A' }}</td>
                            <td>{{ $salary->salary_month }}</td>
                            <td>{{ $salary->basic_salary }}</td>
                            <td>{{ $salary->hra }}</td>
                            <td>{{ $salary->da }}</td>
                            <td>{{ $salary->bonus }}</td>
                            <td>{{ $salary->deductions }}</td>
                            <td><b>{{ $salary->net_salary }}</b></td>
                            <td>
    <a href="/salary/edit/{{ $salary->id }}"
       class="btn btn-warning btn-sm">
        Edit
    </a>
</td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection