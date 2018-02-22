@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $draft->id }} - {{ $draft->short_description }}</h1>
            <h2>Select Each User's Teams</h2>
        </div>
    </div>

    <?php 
        $rounds = [
            'First', 'Second', 'Third', 'Fourth',
            'Fifth', 'Sixth', 'Seventh', 'Final'
        ];
    ?>

    <form method="POST" action="/brackets">

        {{ csrf_field() }}

        @foreach ($rounds as $round)

            <div class="row" style="text-align: left">
                <div class="col-md-6 col-md-offset-2">
                    <h3>{{ $round }} Round</h3>
                </div>
            </div>

            @foreach ($selectionOrder as $i => $userId)
                <div class="form-group">
                    <label class="control-label col-md-2 col-md-offset-2" >User {{ $userId }}:</label>
                    <div class="col-md-5">
                        <select class="form-control" id="sel1" name="usersTeams[user-{{ $userId }}-pick{{ $i }}]">
                            <option value="" selected disabled></option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->school_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach <!-- Users -->

        @endforeach <!-- Rounds -->

        <div class="row" style="margin-top: 30px; text-align: right;">
            <div class="form-group col-md-6 col-md-offset-3 ">
                <a href="{{ url('/drafts') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Save Bracket
                    &nbsp;
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>

    </form>
@endsection