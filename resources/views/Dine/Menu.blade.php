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

                    <div class="row align-items-center">

                        <div class="col-lg-6">
                            <div class="my-3">
                                <label for="day">
                                    Select a Day
                                </label>
                                <select name="day" class="form-control">
                                    @php
                                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Satday' ,
                                    'Sunday']
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
                        </div>
                        <div class="col-lg-6">
                            <label for="day">
                                Food Type
                            </label>
                            <select name="day" class="form-control">

                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ str($type->name)->headline() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="my-3 row align-items-center">
                        <div class="col-lg-2">
                            <label for="featured" class="d-flex align-items-center">
                                Featured <input value="{{ true }}" id="featured" type="checkbox"
                                    class="input-checkbox ms-2">
                            </label>
                        </div>
                        <div class="featuredDate col-lg-10" style="display: none">
                            <label for="featuredDate" class="d-block">
                                Featured Date
                                <input type="date" name="featured_date" id="featuredDate" class="form-control">
                            </label>
                        </div>
                    </div>

                    <div class="my-2">
                        <select name="" class="seachable-select" id="seachable-select"></select>
                    </div>

            </div>





            <button class="btn btn-primary rounded-0 mt-3">{{ $editedMenu ? 'Update ' : 'Store' }} Menu</button>

            </form>

        </div>
    </div>
</div>

</div>

@push('customJs')
<script src="{{ asset('backend/nice-select2.js') }}"></script>
<script>
    const featured = document.querySelector('#featured')
    const featuredDate = document.querySelector('.featuredDate')
            featured.addEventListener('change', (e)=>{
                if(e.target.checked){
                    featuredDate.style.display = 'block'
                } else{
                    featuredDate.style.display = 'none'

                }
                
                
            })


            var options = {searchable: true, placeholder: 'select', searchtext: 'zoek', selectedtext: 'geselecteerd'};
            NiceSelect.bind(document.getElementById("seachable-select"), options);
</script>
@endpush

@endsection