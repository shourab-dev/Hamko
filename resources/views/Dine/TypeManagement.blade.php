@extends('layouts.AuthLayout')
@section('title', 'Dine Periods')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Dine Period Management</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dine.type.addOrUpdate', $editedType?->id) }}" method="POST">

                    @csrf
                    <input type="text" value="{{ $editedType?->name }}" class="form-control" name="name"
                        placeholder="Ex: Lunch">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    <button class="btn btn-primary rounded-0 mt-3">{{ $editedType ? 'Edit' : 'Add' }} Dine Period</button>

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
                            Dine Period
                        </th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($types as $key=>$type)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $type->name }}
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ str($type->time)->headline() }}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('dine.type.addOrEdit', $type->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('dine.type.delete', $type->id) }}"
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