@extends('layout.app')

@section('content')

<div class="container col-10">

    <div class="card shadow-lg border-0">

        <div class="card-header  bg-primary text-white">
            <h3>Add Employee</h3>
        </div>

        <div class="card-body">

            <form action="/employees" method="POST">

                @csrf

                <!-- Success Message -->

                @if(session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif

                <!-- Name -->

                <div class="mb-3">

                    <label class="fw-bold">Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}">

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Email -->

                <div class="mb-3">

                    <label class="fw-bold">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Phone -->

                <div class="mb-3">

                    <label class="fw-bold">Phone</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone') }}">

                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Department -->

                <div class="mb-3">

                    <label class="fw-bold">Department</label>

                    <input type="text"
                           name="department"
                           class="form-control"
                           value="{{ old('department') }}">

                    @error('department')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Designation -->

                <div class="mb-3">

                    <label class="fw-bold">Designation</label>

                    <input type="text"
                           name="designation"
                           class="form-control"
                           value="{{ old('designation') }}">

                    @error('designation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <!-- Salary -->

                <div class="mb-3">

                    <label class="fw-bold">Salary</label>

                    <input type="text"
                           name="salary"
                           class="form-control"
                           value="{{ old('salary') }}">

                    @error('salary')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Save Employee

                </button>

            </form>

        </div>

    </div>

</div>

@endsection