@extends('layout.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h3>
                Attendance List
            </h3>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($attendances as $attendance)

                    <tr>

                        <td>{{ $attendance->id }}</td>

                        <td>{{ $attendance->employee->name }}</td>

                        <td>{{ $attendance->attendance_date }}</td>

                        <td>

                            @if($attendance->status == 'Present')

                                <span class="badge bg-success">
                                    Present
                                </span>

                            @elseif($attendance->status == 'Absent')

                                <span class="badge bg-danger">
                                    Absent
                                </span>

                                @else
                                <span class="badge bg-danger">
                                    Half Day
                                </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection