@extends ('layouts.app')

@section ('content')

    {{ $request->session()->forget('users') }} <!-- Delete existing if exists so no duplicates -->
    {{ $request->session()->push('users', $request->users) }}

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Select Location of Regions</h1>
        </div>
    </div>

    <form method="POST" action="/brackets/selectTeams">

        {{--Session token--}}
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="sel1">Which region is in the upper left?</label>
                    <select class="form-control" id="sel1">
                        <option value="" selected disabled>Please select</option>
                        <option>East</option>
                        <option>Midwest</option>
                        <option>South</option>
                        <option>West</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="sel1">Which region is in the upper right?</label>
                    <select class="form-control" id="sel1">
                        <option value="" selected disabled>Please select</option>
                        <option>East</option>
                        <option>Midwest</option>
                        <option>South</option>
                        <option>West</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="sel1">Which region is in the lower left?</label>
                    <select class="form-control" id="sel1">
                        <option value="" selected disabled>Please select</option>
                        <option>East</option>
                        <option>Midwest</option>
                        <option>South</option>
                        <option>West</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="sel1">Which region is in the lower right?</label>
                    <select class="form-control" id="sel1">
                        <option value="" selected disabled>Please select</option>
                        <option>East</option>
                        <option>Midwest</option>
                        <option>South</option>
                        <option>West</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px; text-align: right;">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ url('/brackets/selectTeams') }}" class="btn btn-primary">
                    Continue
                    &nbsp;
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

    </form>

@endsection