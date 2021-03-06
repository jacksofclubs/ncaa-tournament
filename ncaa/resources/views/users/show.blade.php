@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <label>Username: {{ $user->username }}</label>
            <br>
            <label>Phone Number: {{ $user->phone_number }}</label>
            <br>
            <label>Email Address: {{ $user->email }}</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{-- Can use previous for the back button, but this can cause issues --}}
            {{-- <a href="{{ url()->previous() }}" class="btn btn-default">Back</a> --}}
            {{-- Can also do back button explicitly, like the line below --}}
            <a href="{{ url('/users/') }}" class="btn btn-default">Back</a>
            <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-primary">Edit User</a>
            <form method="post" action="/users/{{ $user->id }}" onsubmit="return confirm('Do you really want to delete the user?');" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete User</button>
            </form>
        </div>
    </div>

@endsection