@extends('layouts.AuthLayout')
@section('title', 'Dine Periods')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $editedMenu ? 'Edit' : 'Add' }} Menu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dine.type.addOrUpdate', $editedMenu?->id) }}" method="POST">

                    @csrf
                    <input type="text" value="{{ $editedMenu?->name }}" class="form-control" name="title"
                        placeholder="Menu Name">
                    @error('title')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror


                    <div class="my-3">
                        <label for="day">
                            Select a Day
                        </label>
                        <select name="day" class="form-control">
                            @php
                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Satday' , 'Sunday']
                            @endphp
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{ str($day)->headline() }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('day')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror


                    <div class="my-3">
                        <label for="featured" class="d-flex align-items-center">
                            Featured <input type="checkbox" class="input-checkbox ms-2">
                        </label>
                    </div>







                    <button class="btn btn-primary rounded-0 mt-3">{{ $editedMenu ? 'Update ' : 'Store' }} Menu</button>

                </form>
            </div>
        </div>
    </div>

</div>


@endsection