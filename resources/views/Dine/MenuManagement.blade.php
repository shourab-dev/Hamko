@extends('layouts.AuthLayout')
@section('title', 'Dine Periods')
@section('content')

<div class="row">
    <div class="text-end mb-3">
        <a href="{{ route('dine.menu.addOrEdit') }}" class="btn btn-primary">Add Menu</a>
    </div>
 
    <div class="col-lg-12">

        <div class="table-responsive">

            <table class="table bg-white">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Menus
                        </th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse($types as $key=>$type)
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
                                <a href="{{ route('dine.type.addOrEdit', $type->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('dine.type.delete', $type->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="4">No Shifts Found</td>
                    </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>



    </div>
</div>


@endsection