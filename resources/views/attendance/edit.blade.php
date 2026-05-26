@extends('layout.app')

@section('content')

<div class="container mt-4">

    <div class="row">

        <div class="col-lg-8 offset-lg-2">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white">

                    <h3>
                        Edit Attendance
                    </h3>

                </div>

                <div class="card-body">

                    <form action="/attendance/{{ $attendance->id }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Employee -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Employee
                            </label>

                            <select name="employee_id"
                                    class="form-control">

                                @foreach($employees as $employee)

                                    <option value="{{ $employee->id }}"
                                        {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>

                                        {{ $employee->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Date -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Attendance Date
                            </label>

                            <input type="date"
                                   name="attendance_date"
                                   class="form-control"
                                   max="{{ date('Y-m-d') }}"
                                   value="{{ $attendance->attendance_date }}">
                        </div>

                        <!-- Status -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Status
                            </label>

                            <select name="status"
                                    class="form-control">

                                <option value="Present"
                                {{ $attendance->status == 'Present' ? 'selected' : '' }}>
                                    Present
                                </option>

                                <option value="Absent"
                                {{ $attendance->status == 'Absent' ? 'selected' : '' }}>
                                    Absent
                                </option>

                                <option value="Half Day"
                                {{ $attendance->status == 'Half Day' ? 'selected' : '' }}>
                                    Half Day
                                </option>

                            </select>

                        </div>

                        <button type="submit"
                                class="btn btn-success">

                            Update Attendance

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection