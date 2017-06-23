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
            <h1>Teams</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <ul>
                @foreach ($teams as $team)
                    <li><a href="{{ url('/teams/' . $team->id) }}">{{ $team->school_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/teams/create') }}" class="btn btn-primary">Add Team</a>
        </div>
    </div>
@endsection