@extends ('layouts.app')

@section ('content')

    <!-- TODO can possibly chain these together -->
    {{ $request->session()->forget('region_ul') }} <!-- Delete existing if exists so no duplicates -->
    {{ $request->session()->forget('region_ur') }}
    {{ $request->session()->forget('region_ll') }}
    {{ $request->session()->forget('region_lr') }}
    {{ $request->session()->push('region_ul', $request->region_ul) }}
    {{ $request->session()->push('region_ur', $request->region_ur) }}
    {{ $request->session()->push('region_ll', $request->region_ll) }}
    {{ $request->session()->push('region_lr', $request->region_lr) }}

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

    <form method="POST" action="/brackets" class="form-horizontal">

        {{--Session token--}}
        {{ csrf_field() }}

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
                        <select class="form-control" id="sel1" name="teams[{{ strtolower($regionName) . '-' . $seed }}]">
                            <option value="" selected disabled></option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->school_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach <!-- Seeds -->

        @endforeach <!-- Regions -->

        <div class="row" style="margin-top: 30px; text-align: right;">
            <div class="form-group col-md-6 col-md-offset-3">
                <a href="{{ url('/brackets/selectRegions') }}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">
                    Save Draft
                    &nbsp;
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>

    </form>

@endsection