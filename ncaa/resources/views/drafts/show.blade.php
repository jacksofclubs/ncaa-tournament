@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $draft->id }} - {{ $draft->short_description }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <label>Short Description: {{ $draft->short_description }}</label>
            <br>
            <label>Long Description: {{ $draft->long_description }}</label>
            <br>
            <label>Seconds per Round: {{ $draft->seconds_per_round }}</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{-- Can use previous for the back button, but this can cause issues --}}
            {{-- <a href="{{ url()->previous() }}" class="btn btn-default">Back</a> --}}
            {{-- Can also do back button explicitly, like the line below --}}
            <a href="{{ url('/drafts/') }}" class="btn btn-default">Back</a>
            <a href="{{ url('/drafts/' . $draft->id . '/edit') }}" class="btn btn-primary">Edit Draft</a>
            <form method="post" action="/drafts/{{ $draft->id }}" onsubmit="return confirm('Do you really want to delete the draft?');" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete Draft</button>
            </form>
        </div>
    </div>

@endsection