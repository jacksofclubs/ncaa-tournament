@extends ('layouts.app')

@section ('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Select Teams</h1>
        </div>
    </div>

    <?php
        $regionNames = Array('East', 'Midwest', 'South', 'West');
        $seeds = Array(
            '1', '16', '8', '9',  '5', '12', '4', '13',
            '6', '11', '3', '14', '7', '10', '2', '15'
        ); 
    ?>

    <form class="form-horizontal">
        @foreach ($regionNames as $regionName)

            <div class="row" style="text-align: left">
                <div class="col-md-6 col-md-offset-2">
                    <h3>Select Teams In {{ $regionName}} Region</h3>
                </div>
            </div>

            @foreach ($seeds as $seed)
                <div class="form-group">
                    <label class="control-label col-md-2 col-md-offset-2" for="email">{{ $seed }} seed:</label>
                    <div class="col-md-5">
                        <select class="form-control" id="sel1">
                            <option value="" selected disabled></option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->school_name }}">{{ $team->school_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach <!-- Seeds -->

        @endforeach <!-- Regions -->

    </form>

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