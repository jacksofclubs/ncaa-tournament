@extends ('layouts.app')

@section ('content')
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
@endsection