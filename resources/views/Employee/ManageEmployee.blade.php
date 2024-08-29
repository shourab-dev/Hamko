@extends('layouts.AuthLayout')
@section('title', 'All Employee')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee name</th>
                            <th>Employee Phone</th>
                            <th>Employee Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $key=>$employee)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td> {{ $employee->name }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No Employee Found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3 px-4">{{ $employees->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection