@extends ('layouts.app')

@section ('content')

    {{ $request->session()->forget('users') }} <!-- Delete existing if exists so no duplicates -->
    {{ $request->session()->push('users', $request->users) }}

    <?php 
        $regions = ['region_ul', 'region_ur', 'region_ll', 'region_lr'];
        $text    = ['upper left', 'upper right', 'lower left', 'lower right'];
    ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Select Location of Regions</h1>
        </div>
    </div>

    <form method="POST" action="/brackets/selectTeams">

        {{--Session token--}}
        {{ csrf_field() }}

        @foreach ($regions as $i => $region)

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="{{ $region }}">Which region is in the {{ $text[$i] }}?</label>
                        <select class="form-control" name="{{ $region }}" id="{{ $region }}">
                            <option value="" selected disabled>Please select</option>
                            <option value="east">East</option>
                            <option value="midwest">Midwest</option>
                            <option value="south">South</option>
                            <option value="west">West</option>
                        </select>
                    </div>
                </div>
            </div>

        @endforeach

        <div class="row" style="margin-top: 30px; text-align: right;">
            <div class="form-group col-md-6 col-md-offset-3 ">
                <a href="{{ url('/brackets/selectUsers') }}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">
                    Continue
                    &nbsp;
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>

    </form>

@endsection