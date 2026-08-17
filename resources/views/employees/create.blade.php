@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')

<div class="container mt-5">

    <h2>Employee Registration</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('employees.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Employee Name</label>
            <input type="text"
                   name="name"
                   class="form-control">
        </div>


        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control">
        </div>
                              

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" step="0.01" min="0" class="form-control form-control-lg" id="salary" name="salary" value="{{ old('salary') }}" required>
                            </div>
                        </div>
        <div class="mb-3">
            <label>Country</label>

            <select name="country_id"
                    id="country"
                    class="form-select">

                <option value="">Select Country</option>

                @foreach($countries as $country)

                    <option value="{{ $country->id }}">
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

            <select name="skill_id"
                    class="form-select">

                <option value="">Select Skill</option>

                @foreach($skills as $skill)

                    <option value="{{ $skill->id }}">
                        {{ $skill->name }}
                    </option>

                @endforeach

            </select>
        </div>


        <div class="mb-3">
            <label>Department</label>

            <select name="department_id"
                    class="form-select">

                <option value="">Select Department</option>

                @foreach($departments as $department)

                    <option value="{{ $department->id }}">
                        {{ $department->name }}
                    </option>

                @endforeach

            </select>
        </div>


        <div class="mb-3">
            <label>Joining Date</label>

            <input type="date"
                   name="joining_date"
                   id="joining_date"
                   class="form-control">
        </div>


        <div class="mb-3">
            <label>Years of Service</label>

            <input type="text"
                   id="years"
                   class="form-control"
                   readonly>
        </div>


        <div class="mb-3">
            <label>Photo</label>

            <input type="file"
                   name="photo"
                   class="form-control">
        </div>


        <button type="submit"
                class="btn btn-primary">

            Save Employee

        </button>

        <a href="{{ route('employees.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </form>

</div>


<script>

    // Country -> State

    document.getElementById('country').addEventListener('change', function(){

        let countryId = this.value;

        let state = document.getElementById('state');

        let city = document.getElementById('city');

        state.innerHTML = '<option value="">Select State</option>';

        city.innerHTML = '<option value="">Select City</option>';


        if(countryId != '')
        {
            fetch('/employees/states/' + countryId)

            .then(response => response.json())

            .then(data => {

                data.forEach(function(item){

                    state.innerHTML +=
                        '<option value="' + item.id + '">' +
                        item.name +
                        '</option>';

                });

            });
        }

    });


    // State -> City

    document.getElementById('state').addEventListener('change', function(){

        let stateId = this.value;

        let city = document.getElementById('city');

        city.innerHTML = '<option value="">Select City</option>';


        if(stateId != '')
        {
            fetch('/employees/cities/' + stateId)

            .then(response => response.json())

            .then(data => {

                data.forEach(function(item){

                    city.innerHTML +=
                        '<option value="' + item.id + '">' +
                        item.name +
                        '</option>';

                });

            });
        }

    });


    // Calculate years of service

    document.getElementById('joining_date')
        .addEventListener('change', function(){

            let joiningDate = new Date(this.value);

            let today = new Date();

            let years =
                today.getFullYear() -
                joiningDate.getFullYear();

            if(
                today.getMonth() < joiningDate.getMonth() ||
                (
                    today.getMonth() == joiningDate.getMonth() &&
                    today.getDate() < joiningDate.getDate()
                )
            )
            {
                years--;
            }

            document.getElementById('years').value =
                years + ' Year(s)';

        });

</script>

@endsection