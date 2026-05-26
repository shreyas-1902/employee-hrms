@extends('layout.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h3>
                Attendance Report
            </h3>

        </div>

        <div class="card-body">

            <!-- Search Form -->

            <form action="/attendance/report"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6">

                        <select name="employee_id"
                                class="form-control">

                            <option value="">
                                Select Employee
                            </option>

                            @foreach($employees as $employee)

                                <option value="{{ $employee->id }}">

                                    {{ $employee->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('employee_id')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <div class="col-md-3">

                        <button type="submit"
                                class="btn btn-primary">

                            Search

                        </button>

                    </div>

                </div>

            </form>

            <!-- Attendance Table -->

            @if(isset($attendances))

            <div class="table-responsive mt-4">

                <table class="table table-bordered">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($attendances as $attendance)

                        <tr>

                            <td>
                                {{ $attendance->id }}
                            </td>

                            <td>
                                {{ $attendance->attendance_date }}
                            </td>

                            <td>

                                @if($attendance->status == 'Present')

                                    <span class="badge bg-success">
                                        Present
                                    </span>

                                @elseif($attendance->status == 'Half Day')

                                    <span class="badge bg-warning text-dark">
                                        Half Day
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Absent
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="/attendance/{{ $attendance->id }}/edit"
                                   class="btn btn-primary btn-sm">

                                    Edit

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-danger">

                                No Attendance Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            @endif

        </div>

    </div>

</div>

@endsection