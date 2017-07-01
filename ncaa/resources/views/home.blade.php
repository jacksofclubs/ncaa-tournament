@extends('layouts.app')

@section('content')
<!--     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
            </div>
        </div>
    </div> -->
<!--     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 style="text-align: center;">NCAA Basketball Bracket Tournament Challenge</h2>
            <p style="text-align: justify;">NCAA basketball tournament web application. Users draft teams and compete against each other. Input as many users and teams as you want. Select which eight users will be competing against each other. Participants choose teams in the draft - these will be their teams for the duration of the tournament. As the tournament progresses, participants will be awarded points when their teams win. The one who has the most points at the end of the tournament will be the winner.</p>

            <div class="form-group" style="margin-top: 75px; text-align: center;">
                <a href="{{ url('#') }}" class="btn-lg btn-primary">Create a Bracket!</a>
            </div>
        </div>
    </div> -->
    <div class="jumbotron" style="text-align: center;">
        <h1 class="display-3" style="text-align: center;">NCAA Bracket Challenge</h1>
        <p class="lead">Choose your friends.  Choose your teams.  Dominate.</p>
        <hr class="my-4">
        <p>Create your bracket today!</p>
        <p class="lead" style="margin-top: 75px;">
            <a class="btn btn-primary btn-lg" href="{{ url('#') }}" role="button">Create Bracket</a>
        </p>
    </div>
@endsection
