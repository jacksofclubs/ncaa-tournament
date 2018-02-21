@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $draft->id }} - {{ $draft->short_description }}</h1>
        </div>
    </div>

    <?php 
        $orderRanks = [
            'First', 'Second', 'Third', 'Fourth',
            'Fifth', 'Sixth', 'Seventh', 'Eighth'
        ];
    ?>

    <form method="POST" action="/brackets">

        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ul>
                    @foreach ($orderRanks as $i => $rank)
                        <div class="form-group">
                            <label class="control-label col-md-2 col-md-offset-2" >{{ $rank }}</label>
                            <div class="col-md-5">
                                <select class="form-control" id="sel1" name="ranks[{{ $i+1 }}]">
                                    <option value="" selected disabled></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        
    </form>
@endsection