@extends('layouts.app')
@section('content')
    <div class="uk-text-center">
        <h1 class="uk-text-primary uk-text-italic"> This is your project Mr.{{ Auth::user()->name }}</h1>
    </div>
    <div>

        @foreach($projects as $project )
            <a class="uk-display-block" href="{{ route('project_item' , $project) }}"> {{ $project->name }}</a>

        @endforeach
    </div>
@endsection
