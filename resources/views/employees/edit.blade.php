@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')

<div class="container mt-5">

    <h2>Edit Employee</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('employees.update', $employee->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $employee->name }}">
        </div>


        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ $employee->email }}">
        </div>


        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
        </div>


        <div class="mb-3">
            <label>Salary</label>
            <input type="text" name="salary" class="form-control" value="{{ $employee->salary }}">
        </div>


        <div class="mb-3">
            <label>Country</label>

            <select name="country_id" id="country" class="form-select">

                <option value="">Select Country</option>

                @foreach($countries as $country)

                    <option value="{{ $country->id }}"
                        {{ $employee->country_id == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>

                @endforeach

            </select>
        </div>


        <div class="mb-3">
            <label>State</label>

            <select name="state_id"
                    id="state"
                    class="form-select">

                <option value="">Select State</option>

            </select>
        </div>


        <div class="mb-3">
            <label>City</label>

            <select name="city_id"
                    id="city"
                    class="form-select">

                <option value="">Select City</option>

            </select>
        </div>


        <div class="mb-3">
            <label>Skill</label>

            <select name="skill_id" class="form-select">

                @foreach($skills as $skill)

                    <option value="{{ $skill->id }}"
                        {{ $employee->skill_id == $skill->id ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>

                @endforeach

            </select>
        </div>


        <div class="mb-3">
            <label>Department</label>

            <select name="department_id" class="form-select">

                @foreach($departments as $department)

                    <option value="{{ $department->id }}"
                        {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>

                @endforeach

            </select>
        </div>


        <div class="mb-3">
            <label>Joining Date</label>

            <input type="date"
                   name="joining_date"
                   value="{{ $employee->joining_date }}"
                   class="form-control">
        </div>


        <div class="mb-3">
            <label>Photo</label>

            <input type="file"
                   name="photo"
                   class="form-control">

            @if($employee->photo)
                <br>
                <img src="{{ asset('storage/' . $employee->photo) }}"
                     width="100">
            @endif
        </div>


        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('employees.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>






<script>

window.onload = function(){

    let countryId = document.getElementById('country').value;

    if(countryId){
        fetch('/employees/states/' + countryId)
        .then(res => res.json())
        .then(data => {

            let state = document.getElementById('state');

            data.forEach(function(item){

                let selected =
                    item.id == {{ $employee->state_id }} ? 'selected' : '';

                state.innerHTML +=
                    '<option value="'+item.id+'" '+selected+'>'+item.name+'</option>';
            });

            loadCities({{ $employee->state_id }});
        });
    }

};


function loadCities(stateId){

    fetch('/employees/cities/' + stateId)
    .then(res => res.json())
    .then(data => {

        let city = document.getElementById('city');

        data.forEach(function(item){

            let selected =
                item.id == {{ $employee->city_id }} ? 'selected' : '';

            city.innerHTML +=
                '<option value="'+item.id+'" '+selected+'>'+item.name+'</option>';
        });
    });

}



document.getElementById('country').addEventListener('change', function(){

    let countryId = this.value;

    fetch('/employees/states/' + countryId)
    .then(res => res.json())
    .then(data => {

        let state = document.getElementById('state');
        state.innerHTML = '<option value="">Select State</option>';

        data.forEach(function(item){

            state.innerHTML +=
                '<option value="'+item.id+'">'+item.name+'</option>';
        });

    });

});


document.getElementById('state').addEventListener('change', function(){

    let stateId = this.value;

    fetch('/employees/cities/' + stateId)
    .then(res => res.json())
    .then(data => {

        let city = document.getElementById('city');
        city.innerHTML = '<option value="">Select City</option>';

        data.forEach(function(item){

            city.innerHTML +=
                '<option value="'+item.id+'">'+item.name+'</option>';
        });

    });

});

</script>

@endsection