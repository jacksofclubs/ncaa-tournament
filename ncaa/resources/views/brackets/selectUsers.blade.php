@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Select Users</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul>
                @foreach ($users as $user)
                    <div class="checkbox">
                      <label><input type="checkbox" value="">{{ $user->first_name }} {{ $user->last_name }}</label>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row" style="margin-top: 30px; text-align: right;">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ url('/brackets/selectTeams') }}" class="btn btn-primary">Continue to Teams</a>
        </div>
    </div>

@endsection