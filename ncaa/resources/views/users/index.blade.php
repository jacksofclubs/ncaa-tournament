@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @foreach ($users as $user)
                        <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection