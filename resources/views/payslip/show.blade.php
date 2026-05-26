@extends('layout.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h4>Payslip</h4>
        </div>

        <div class="card-body">

            {{-- Employee Info --}}
            <h5>Employee Details</h5>
            <hr>

            <p><b>Name:</b> {{ $salary->employee->name }}</p>
            <p><b>Month:</b> {{ $salary->salary_month }}</p>

            {{-- Salary Table --}}
            <table class="table table-bordered mt-3">

                <tr>
                    <th>Basic Salary</th>
                    <td>{{ $salary->basic_salary }}</td>
                </tr>

                <tr>
                    <th>HRA</th>
                    <td>{{ $salary->hra }}</td>
                </tr>

                <tr>
                    <th>DA</th>
                    <td>{{ $salary->da }}</td>
                </tr>

                <tr>
                    <th>Bonus</th>
                    <td>{{ $salary->bonus }}</td>
                </tr>

                <tr>
                    <th>Gross Salary</th>
                    <td>
                        {{ $salary->basic_salary + $salary->hra + $salary->da + $salary->bonus }}
                    </td>
                </tr>

                <tr>
                    <th>Tax</th>
                    <td>{{ $salary->tax }}</td>
                </tr>

                <tr>
                    <th>Deductions</th>
                    <td>{{ $salary->deductions }}</td>
                </tr>

                <tr class="table-success">
                    <th>Net Salary</th>
                    <td><b>{{ $salary->net_salary }}</b></td>
                </tr>

            </table>

            <button onclick="window.print()" class="btn btn-primary no-print">
    Print Payslip
</button>

        </div>

    </div>

</div>

<style>
@media print {

    /* Hide everything except payslip */
    .no-print {
        display: none !important;
    }

    body {
        background: white !important;
    }

    .card {
        border: none !important;
        box-shadow: none !important;
    }
}
</style>

@endsection