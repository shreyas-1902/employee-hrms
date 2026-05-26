@extends('layout.app')

@section('content')

<div class="container mt-5">

    <div class="row">

        <div class="col-lg-8 offset-lg-2">

            <div class="card shadow-lg border-0">

                <div class="card-header bg-primary text-white">

                    <h3>
                        Edit Employee
                    </h3>

                </div>

                <div class="card-body">

                    <form action="/employees/{{ $employee->id }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Name -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $employee->name) }}">

                            @error('name')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <!-- Email -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', $employee->email) }}">

                            @error('email')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <!-- Phone -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Phone
                            </label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   value="{{ old('phone', $employee->phone) }}">

                            @error('phone')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <!-- Department -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Department
                            </label>

                            <input type="text"
                                   name="department"
                                   class="form-control"
                                   value="{{ old('department', $employee->department) }}">

                            @error('department')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <!-- Designation -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Designation
                            </label>

                            <input type="text"
                                   name="designation"
                                   class="form-control"
                                   value="{{ old('designation', $employee->designation) }}">

                            @error('designation')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <!-- Salary -->

                        <div class="mb-3">

                            <label class="fw-bold">
                                Salary
                            </label>

                            <input type="text"
                                   name="salary"
                                   class="form-control"
                                   value="{{ old('salary', $employee->salary) }}">

                            @error('salary')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <!-- Buttons -->

                        <button type="submit"
                                class="btn btn-primary">

                            Update Employee

                        </button>

                        <a href="/employees"
                           class="btn btn-secondary">

                            Back

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection