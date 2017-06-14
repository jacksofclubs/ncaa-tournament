@extends ('layouts.app')

@section ('content')
    {{-- Display flash message if needed --}}
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1>Users</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <ul>
                @foreach ($users as $user)
                    <li><a href="{{ url('/users/' . $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/users/create') }}" class="btn btn-primary">Add User</a>
        </div>
    </div>
@endsection