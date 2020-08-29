@extends('layouts.app')
@section('content')
    <div class="uk-container">
        <h1>
            {{ $project->name }}
        </h1>

        <h2 class="">STATUSES:</h2>
        <ul class="uk-flex uk-list">
            @foreach($statuses as $status)
                <li class="uk-margin-right uk-margin-remove-top">
                    <a href="/statuses/{{ $status->status }} "
                       class="uk-text-large uk-text-success">{{ $status->status }}</a>
                </li>
            @endforeach
        </ul>
        <div class="uk-flex  uk-margin-top">
            <form method="POST" action="{{\LaravelLocalization::localizeURL('/tasks')}}" enctype="multipart/form-data">
                <h1 class="uk-text-primary">Create new Task for {{   $project->name  }}</h1>
                @csrf
                <input
                        name="name"
                        class="uk-input"
                        placeholder="name"
                >
                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <input
                        type="file"
                        name="image"
                        id="image"
                        class="block ml-auto"
                        accept="image/*"
                >
                <select name="status">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}"> {{ $status->status }}</option>
                    @endforeach
                </select>
                <button type="submit">Submit</button>
            </form>
            @error('name')
            <p class="uk-text-danger">{{ $message }}</p>
            @enderror
        </div>
        <h3><a href="/projects">ALL projects</a></h3>
        <div class="uk-margin-top">
            <form action="{{ \LaravelLocalization::localizeURL(route('project_delete', $project)) }}" method="POST" class="uk-margin-large-right">
                @method('delete')
                @csrf
                <button class="uk-text-danger" type="submit"> DELETE Project</button>
            </form>
        </div>
    </div>

@endsection
