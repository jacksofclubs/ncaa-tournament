@extends ('layouts.app')

@section ('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Who Will Be Participating?</h1>
        </div>
    </div>

    <form method="POST" action="/brackets/selectRegions">

        {{--Session token--}}
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul>
                    @foreach ($users as $user)
                        <div class="checkbox">
                          <label><input type="checkbox" name="users[]" value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</label>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row" style="margin-top: 30px; text-align: right;">
            <div class="form-group col-md-6 col-md-offset-3 ">
                <a href="{{ url('/home') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Continue
                    &nbsp;
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>

    </form>

@endsection