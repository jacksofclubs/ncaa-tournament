@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Select Teams</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul>
                @foreach ($teams as $team)
                    <div class="checkbox">
                      <label><input type="checkbox" value="">{{ $team->school_name }}</label>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row" style="margin-top: 30px; text-align: right;">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ url('/brackets/draft') }}" class="btn btn-primary">
                Continue
                &nbsp;
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>

@endsection