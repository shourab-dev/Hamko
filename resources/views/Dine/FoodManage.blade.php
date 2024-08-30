@extends('layouts.AuthLayout')
@section('title', 'Dine Periods')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Food</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dine.food.addOrUpdate', $editedFood?->id) }}" method="POST">

                    @csrf
                    <input type="text" value="{{ $editedFood?->title }}" class="form-control" name="title"
                        placeholder="Ex: Beef | Rice | Banana">
                    @error('title')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror

                    <div class="my-2">
                        <label for="type">
                            Dine Type
                        </label>
                        <select name="type" class="form-control ">
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="metrix">
                            Metrix
                        </label>
                        <select name="metrix" class="form-control ">
                            <option value="pcs">Piece</option>
                            <option value="pcs">Gram</option>
                        </select>
                    </div>


                    <input type="number" value="{{ $editedFood?->per_person }}" class="form-control" name="per_person"
                        placeholder="Ex: 250g or 1 pcs ">
                    @error('metrix')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror

                    <button class="btn btn-primary rounded-0 mt-3">{{ $editedFood ? 'Edit' : 'Add' }} Food Item</button>

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
                            Food
                        </th>

                        <th>Dine Type</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($foods as $key=>$food)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $food->title }}
                        </td>
                        
                        <td>
                            <span class="badge bg-primary">{{ str($food->dineType->name)->headline() }}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('dine.food.addOrEdit', $food->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('dine.food.delete', $food->id) }}"
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