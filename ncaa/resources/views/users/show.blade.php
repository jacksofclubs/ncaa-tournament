@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label>Username: {{ $user->username }}</label>
            <br>
            <label>Phone Number: {{ $user->phone_number }}</label>
            <br>
            <label>Email Address: {{ $user->email }}</label>
        </div>
    </div>

@endsection