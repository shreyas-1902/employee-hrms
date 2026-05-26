@extends('layout.app')

@section('content')

<div class="container col-10">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">
            <h3>Edit Salary Structure</h3>
        </div>

        <div class="card-body">

            <form action="/salary/update/{{ $salary->id }}" method="POST">

                @csrf

                <!-- Employee -->
                <div class="mb-3">

                    <label class="fw-bold">Employee</label>

                    <select name="employee_id" class="form-control">

                        <option value="">Select Employee</option>

                        @foreach($employees as $emp)

                            <option value="{{ $emp->id }}"
                                {{ $salary->employee_id == $emp->id ? 'selected' : '' }}>
                                {{ $emp->name }}
                            </option>

                        @endforeach

                    </select>

                    @error('employee_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">

    <label class="fw-bold">Salary Month</label>

    <input type="month"
           name="salary_month"
           id="salaryMonth"
           class="form-control"
           value="{{ old('salary_', $salary->salary_month) }}"
           required>

    @error('salary_month')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

                <!-- Basic Salary -->
                <div class="mb-3">

                    <label class="fw-bold">Basic Salary</label>

                    <input type="number"
                           name="basic_salary"
                           class="form-control"
                           value="{{ old('basic_salary', $salary->basic_salary) }}">

                    @error('basic_salary')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- HRA -->
                <div class="mb-3">

                    <label class="fw-bold">HRA</label>

                    <input type="number"
                           name="hra"
                           class="form-control"
                           value="{{ old('hra', $salary->hra) }}">

                    @error('hra')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- DA -->
                <div class="mb-3">

                    <label class="fw-bold">DA</label>

                    <input type="number"
                           name="da"
                           class="form-control"
                           value="{{ old('da', $salary->da) }}">

                    @error('da')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Bonus -->
                <div class="mb-3">

                    <label class="fw-bold">Bonus</label>

                    <input type="number"
                           name="bonus"
                           class="form-control"
                           value="{{ old('bonus', $salary->bonus) }}">

                    @error('bonus')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Deductions -->
                <div class="mb-3">

                    <label class="fw-bold">Deductions</label>

                    <input type="number"
                           name="deductions"
                           class="form-control"
                           value="{{ old('deductions', $salary->deductions) }}">

                    @error('deductions')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">

    <label class="fw-bold">Tax (%) will be auto calculated</label>

    <input type="text"
           class="form-control bg-light"
           value="10% (Auto)"
           readonly>

</div>

                <button type="submit" class="btn btn-primary">
                    Update Salary
                </button>

            </form>

        </div>

    </div>

</div>

@endsection