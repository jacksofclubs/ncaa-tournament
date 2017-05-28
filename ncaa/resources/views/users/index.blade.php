@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <h1>List of Users</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <ul>
                @foreach ($users as $user)
                    <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection