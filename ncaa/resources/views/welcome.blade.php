@extends ('layouts/master')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            NCAA Tournament
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Documentation</a>
            <a href="#">Enter</a>
            <a href="https://laracasts.com">Laracasts</a>
        </div>
    </div>
</div>