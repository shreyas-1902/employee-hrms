@extends('layout.app')

@section('content')

<div class="container col-10">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">
            <h3>Add Salary Structure</h3>
        </div>

        <div class="card-body">

            <form action="/salary/store" method="POST">

                @csrf

                <!-- Success Message -->
                @if(session('success'))

                    <div class="alert alert-primary">
                        {{ session('success') }}
                    </div>

                @endif

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

                <div class="mb-3">

    <label class="fw-bold">Salary Month</label>

    <input type="month" name="salary_month" id="salaryMonth" class="form-control">


    @error('salary_month')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

                <!-- Basic Salary -->
                <div class="mb-3">

                    <label class="fw-bold">Basic Salary</label>

                    <input type="text"
       name="basic_salary"
       id="basicSalary"
       class="form-control bg-light"
       readonly>

                    @error('basic_salary')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- HRA -->
                <div class="mb-3">

                    <label class="fw-bold">HRA</label>

                    <input type="text"
                           name="hra"
                           class="form-control"
                           value="{{ old('hra', 0) }}">

                    @error('hra')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- DA -->
                <div class="mb-3">

                    <label class="fw-bold">DA</label>

                    <input type="text"
                           name="da"
                           class="form-control"
                           value="{{ old('da', 0) }}">

                    @error('da')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Bonus -->
                <div class="mb-3">

                    <label class="fw-bold">Bonus</label>

                    <input type="text"
                           name="bonus"
                           class="form-control"
                           value="{{ old('bonus', 0) }}">

                    @error('bonus')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Deductions -->
                <div class="mb-3">

                    <label class="fw-bold">Deductions</label>

                    <input type="text" name="deductions" id="deductions" class="form-control" readonly>

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
                    Save Salary Structure
                </button>

            </form>

        </div>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const employeeSelect = document.getElementById("employeeSelect");
    const salaryInput = document.getElementById("basicSalary");

    employeeSelect.addEventListener("change", function () {

        const salary = this.options[this.selectedIndex].dataset.salary;

        salaryInput.value = salary ?? "";

    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const employee = document.getElementById("employeeSelect");
    const month = document.getElementById("salaryMonth");

    const deductionInput = document.getElementById("deductions");

    async function calculate() {

        if (!employee.value || !month.value) return;

        const res = await fetch(`/salary/calc-deduction?employee_id=${employee.value}&month=${month.value}`);
        const data = await res.json();

        deductionInput.value = data.deduction;
    }

    employee.addEventListener("change", calculate);
    month.addEventListener("change", calculate);

});
</script>   

@endsection