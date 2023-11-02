@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')

    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">
            <i class="fas fa-add"></i> Add task</a>
    </div>

    @forelse($tasks as $task)
        <a class="text-decoration-none" href="{{ route('tasks.show', ['task' => $task->id]) }}">
            <div class="d-flex align-items-center shadow-sm p-2 mb-3 bg-body-tertiary rounded">
                <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn me-3" type="submit">
                        @if ($task->completed)
                            <i class="fas fa-check-circle text-success fs-3"></i>
                        @else
                            <i class="fa-regular fa-circle text-success fs-3"></i>
                        @endif
                    </button>
                </form>
                <p class="fs-4 bold fw-semibold text-dark text-decoration-none m-0">
                    {{ $task->title }}</p>
            </div>
        </a>
    @empty
        <li>
            <small>
                There are no tasks
            </small>
        </li>
    @endforelse


    @if ($tasks->count())
        <div class="my-3">
            {{ $tasks->links() }}
        </div>
    @endif



@endsection
