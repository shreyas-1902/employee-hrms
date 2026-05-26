@extends('layout.app')

@section('content')

<div class="container mt-4">

    <div class="row">

        <div class="col-lg-8 offset-lg-2">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white">

                    <h3>
                        Mark Attendance
                    </h3>

                </div>

                <div class="card-body">

                    <form action="/attendance"
                          method="POST">

                        @csrf

                        <!-- Employee -->

                        <div class="mb-3">

    <label class="fw-bold">
        Employee
    </label>

    <select name="employee_id"
            class="form-control">

        <option value="">
            Select Employee
        </option>

        @foreach($employees as $employee)

            <option value="{{ $employee->id }}"
                {{ old('employee_id') == $employee->id ? 'selected' : '' }}>

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

                        <!-- Date -->

                        <div class="mb-3">

    <label class="fw-bold">
        Attendance Date
    </label>

    <input type="date"
           name="attendance_date"
           class="form-control"
           max="{{ date('Y-m-d') }}"
           value="{{ old('attendance_date') }}">

    @error('attendance_date')

        <small class="text-danger">
            {{ $message }}
        </small>

    @enderror

</div>

                        <!-- Status -->
                        <div class="mb-3">

<label class="fw-bold">
    Status
</label>

<select name="status"
        class="form-control">

    <option value="">
        Select Status
    </option>

    <option value="Present"
        {{ old('status') == 'Present' ? 'selected' : '' }}>

        Present

    </option>

    <option value="Absent"
        {{ old('status') == 'Absent' ? 'selected' : '' }}>

        Absent

    </option>

    <option value="Half Day"
        {{ old('status') == 'Half Day' ? 'selected' : '' }}>

        Half Day

    </option>

</select>

@error('status')

    <small class="text-danger">
        {{ $message }}
    </small>

@enderror

</div>

                        <button type="submit"
                                class="btn btn-success">

                            Save Attendance

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection