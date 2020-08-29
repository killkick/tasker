
@extends('layouts.app')

@section('content')
    <h1 class="uk-text-primary uk-text-center">Status:{{ $status->status }}</h1>
    <div>
        <h3>Tasks:</h3>
        <ul>
            @forelse ($status->tasks as $task)
           <li><a href="/tasks/{{ $task->id }}">{{ $task->name }}</a></li>
            @empty
                <h3 class="uk-text-primary">not tasks yet!</h3>
            @endforelse
        </ul>
    </div>
@endsection
