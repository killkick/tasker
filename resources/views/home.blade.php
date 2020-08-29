@extends('layouts.app')

@section('content')
    <div class="uk-container-large">
        <div uk-grid class="uk-grid">
            <div class="uk-width-2-5 General">
                <h1>{{ __('General') }}</h1>
                <a href="{{ route('projects') }}">Projects </a>
            </div>
            <div class="uk-width-3-5">
                <h1>{{ __('create_project') }}</h1>
                <form method="POST" action="{{ \LaravelLocalization::localizeURL('/projects') }}">
                    @csrf
                    <input class="uk-input" type="text" name="name" placeholder="Project name">

                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
