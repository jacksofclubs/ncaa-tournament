@extends ('layouts.app')

@section ('content')
    {{-- Display flash message if needed --}}
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Drafts</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul>
                @foreach ($drafts as $draft)
                    <li><a href="{{ url('/drafts/' . $draft->id) }}">{{ $draft->id }} - {{ $draft->short_description }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ url('/drafts/selectUsers') }}" class="btn btn-primary">Add Draft</a>
        </div>
    </div>
@endsection