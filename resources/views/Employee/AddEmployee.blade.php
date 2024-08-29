@extends('layouts.AuthLayout')
@section('title', 'Add Employee')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $employee ? 'Edit' : 'Add' }} Employee</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('employee.storeOrUpdate', $employee?->id) }}" method="POST">

                    @csrf
                    <input type="text" value="{{ $employee?->title }}" class="form-control my-2" name="name"
                        placeholder="Employee Name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" value="{{ $employee?->title }}" class="form-control my-2" name="email"
                        placeholder="Employee Email">
                    <input type="text" value="{{ $employee?->title }}" class="form-control my-2" name="phone"
                        placeholder="Employee Phone">
                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label for="date" class="mt-0">
                        Shift
                    </label>
                    <select name="shift_id" id="date" class="form-control">
                        @foreach ($shifts as $shift)
                        <option value="{{ $shift->id }}">{{ $shift->title }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-primary rounded-0 mt-3">{{ $employee ? 'Edit' : 'Add' }}Shift</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection