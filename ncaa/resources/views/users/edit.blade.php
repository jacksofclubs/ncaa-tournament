@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
        </div>
    </div>
@endsection