@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $team->school_name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label>Short Name: {{ $team->short_name }}</label>
            <br>
            <label>Conference: {{ $team->conference }}</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            {{-- Can use previous for the back button, but this can cause issues --}}
            {{-- <a href="{{ url()->previous() }}" class="btn btn-default">Back</a> --}}
            {{-- Can also do back button explicitly, like the line below --}}
            <a href="{{ url('/teams/') }}" class="btn btn-default">Back</a>
            <a href="{{ url('/teams/' . $team->id . '/edit') }}" class="btn btn-primary">Edit Team</a>
            <form method="post" action="/teams/{{ $team->id }}" onsubmit="return confirm('Do you really want to delete the team?');" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete Team</button>
            </form>
        </div>
    </div>

@endsection