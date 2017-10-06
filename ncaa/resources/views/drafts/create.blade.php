@extends ('layouts.app')

@section ('content')
    <div class="col-md-8 col-md-offset-2">

        <h1>Create a Draft</h1>

        <form method="POST" action="/drafts">

            {{--Session token--}}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="first_name">Description:</label>
                <input type="text" class="form-control" id="short_description" name="short_description">
            </div>

            <div class="form-group">
                <a href="{{ url('/home') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>
@endsection