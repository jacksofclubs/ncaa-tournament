@extends ('layouts.app')

@section ('content')
    <div class="col-md-8">

        <h1>Edit Team {{ $team->school_name }}</h1>

        <form method="POST" action="/teams/{{ $team->id }}">
            
            {{--Session token--}}
            {{ csrf_field() }}

            {{-- Set method=PATCH --}}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="school_name">School Name:</label>
                <input type="text" class="form-control" id="school_name" name="school_name" value="{{ $team->school_name }}">
            </div>

            <div class="form-group">
                <label for="short_name">Short Name:</label>
                <input type="text" class="form-control" id="short_name" name="short_name" value="{{ $team->short_name }}">
            </div>

            <div class="form-group">
                <label for="conference">Conference:</label>
                <input type="text" class="form-control" id="conference" name="conference" value="{{ $team->conference }}">
            </div>

            <div class="form-group">
                <a href="{{ url('/teams/' . $team->id) }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>
@endsection