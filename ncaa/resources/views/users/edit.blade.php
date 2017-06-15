@extends ('layouts.app')

@section ('content')
    <div class="col-md-8">

        <h1>Edit User {{ $user->first_name }} {{ $user->last_name }}</h1>

        <form method="POST" action="/users/{{ $user->id }}">
            
            {{--Session token--}}
            {{ csrf_field() }}

            {{-- Set method=PATCH --}}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
            </div>

            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
            </div>

            <div class="form-group">
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>
@endsection