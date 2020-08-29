
@extends('layouts.app')
@section('content')
    <div class="uk-grid">
        <div class="uk-width-1-3">
            <h1>
                The task is  : {{ $task->name }}
            </h1>
        </div>
        <div class="uk-width-1-3">
            <h1>
                The Project is  : {{ $task->project->name }}
            </h1>
        </div>
        <div class="uk-width-1-3">
            <h1>
                The Status is  : {{ $task->status()->get()->first()->status }}
            </h1>
        </div>
    </div>


    <div >
        <img style="width: 400px ; height: 300px"  src="{{ asset($task->image) }}" alt="">
    </div>

    <div class="uk-flex uk-flex-between">
        <div>  <h3 class="uk-text-primary"> UPDATE YOUR TASK</h3>
            <form action="{{ \LaravelLocalization::localizeURL(route('task_edit', $task)) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <input
                        name="name"
                        class="uk-input"
                        placeholder="name"
                >
                <input type="hidden"  name="project_id" value="{{ $task->project->id }}">

                <input
                        type="file"
                        name="image"
                        id="image"
                        class="block ml-auto"
                        accept="image/*"
                >
                <select name="status" >
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



        <form action="{{ \LaravelLocalization::localizeURL(route('task_delete', $task)) }}" method="POST" class="uk-margin-large-right">
            @method('delete')
            @csrf
            <button class="uk-text-danger" type="submit">  DELETE task</button>
        </form>

    </div>



@endsection
