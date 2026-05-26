@extends('layout.app')

@section('content')

<div class="container col-8 mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Generate Payslip</h4>
        </div>

        <div class="card-body">

            <form action="/payslip/generate" method="POST">
                @csrf

                {{-- Employee --}}
                 <!-- Employee Select -->
                 <div class="mb-3">

<label class="fw-bold">Employee</label>

<select name="employee_id" class="form-control" id="employeeSelect">

<option value="">Select Employee</option>

@foreach($employees as $emp)

<option 
value="{{ $emp->id }}"
data-salary="{{ $emp->salary }}">
{{ $emp->name }}
</option>

@endforeach

</select>

@error('employee_id')
    <small class="text-danger">{{ $message }}</small>
@enderror

</div>

                {{-- Month --}}
                <div class="mb-3">
                    <label>Month</label>
                    <input type="month" name="salary_month" class="form-control">
                </div>

                <button class="btn btn-success">
                    Generate Payslip
                </button>

            </form>

        </div>

    </div>

</div>

@endsection