@extends ('layouts.app')

@section ('content')

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Draft {{ $draft->id }} - {{ $draft->short_description }}</h1>

        <form method="POST" action="/drafts/{{ $draft->id }}">
            
            {{--Session token--}}
            {{ csrf_field() }}

            {{-- Set method=PATCH --}}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="short_description">Short Description:</label>
                <input type="text" class="form-control" id="short_description" name="short_description" value="{{ $draft->short_description }}">
            </div>

            <div class="form-group">
                <label for="short_description">Long Description:</label>
                <input type="text" class="form-control" id="long_description" name="long_description" value="{{ $draft->long_description }}">
            </div>

            <div class="form-group">
                <label for="seconds_per_round">Seconds per Round:</label>
                <input type="text" class="form-control" id="seconds_per_round" name="seconds_per_round" value="{{ $draft->seconds_per_round }}">
            </div>

            <div class="form-group">
                <a href="{{ url('/drafts/' . $draft->id) }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>

@endsection