@extends ('layouts.app')

@section ('content')
    <div class="col-md-8">

        <h1>Create a User</h1>

        <form method="POST" action="/users">

            {{--Session token--}}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" value="password">
            </div>

            <div class="form-group">
                <a href="{{ url('/users/') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>
@endsection