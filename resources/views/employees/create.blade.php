@extends('layouts.app')

@section('title', 'Employee List')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2 class="mb-4">Add Employee</h2>
            
            <form action="{{ route('employees.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="text" class="form-control" id="salary" name="salary" required>
                </div>
                
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <select name="state_id" id="state" class="form-select" required>
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select name="city_id" id="city" class="form-select" required>
                        <option value="">Select City</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('#state').change(function() {
        let stateId = $(this).val();
        
        if (stateId) {
            $('#city').html('<option value="">Loading...</option>');
            
            $.ajax({
                url: '/get-cities/' + stateId,
                type: 'GET',
                success: function(data) {
                    let options = '<option value="">Select City</option>';
                    data.forEach(function(city) {
                        options += `<option value="${city.id}">${city.name}</option>`;
                    });
                    $('#city').html(options);
                },
                error: function() {
                    $('#city').html('<option value="">Error loading cities</option>');
                }
            });
        } else {
            $('#city').html('<option value="">Select City</option>');
        }
    });
});
</script>
@endsection

