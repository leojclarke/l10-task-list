@extends('layouts.app')

<div class="container d-flex align-items-center justify-content-start">
    <h2 class="me-2">
        {{ $task->title }}
    </h2>
    @if ($task->completed)
        <span class="badge rounded-pill text-bg-success">
            Completed
        </span>
    @else
        <span class="badge rounded-pill text-bg-danger">
            Not completed
        </span>
    @endif
</div>

<a class="text-small fw-semibold" href="{{ route('tasks.index') }}">
    <i class="fas fa-arrow-left"></i> Go back to task list
</a>

@section('content')
    <div class="bg-light border rounded p-4">
        <p>{{ $task->description }}</p>

        @if ($task->long_description)
            <p class="fw-light">{{ $task->long_description }}</p>
        @endif

        <p class="mb-3 text-secondary"><small>{{ $task->created_at->diffForHumans() }} •
                {{ $task->updated_at->diffForHumans() }}</small></p>



        <div><a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit task</a></div>

        <div class="d-flex justify-content-start">
            <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-primary my-3" type="submit">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                </button>
            </form>

            <form class="ms-3" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger my-3"type="submit">Delete Task</button>
            </form>
        </div>
    @endsection
