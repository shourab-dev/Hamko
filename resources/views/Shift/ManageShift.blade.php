@extends('layouts.AuthLayout')
@section('title', 'Shift Management')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Shift Management</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('shift.storeOrUpdate', $editedShift?->id) }}" method="POST">

                    @csrf
                    <input type="text" value="{{ $editedShift?->title }}" class="form-control" name="title"
                        placeholder="Ex: General">

                    <label for="date" class="mt-3">
                        Time
                    </label>
                    <select name="time" id="date" class="form-control">
                        <option {{ $editedShift?->time == 'morning' ? 'selected': null }} value="morning">Morning
                        </option>
                        <option {{ $editedShift?->time == 'afternoon' ? 'selected': null }} value="afternoon">Afternoon
                        </option>
                    </select>

                    <button class="btn btn-primary rounded-0 mt-3">{{ $editedShift ? 'Edit' : 'Add' }} Shift</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">

        <div class="table-responsive">

            <table class="table bg-white">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Shift
                        </th>
                        <th>
                            Time
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($shifts as $key=>$shift)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $shift->title }}
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ str($shift->time)->headline() }}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('shift.index', $shift->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('shift.delete', $shift->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="4">No Shifts Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>



    </div>
</div>


@endsection