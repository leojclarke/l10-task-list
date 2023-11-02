@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <div class="container-sm">
        <form method="POST"
            action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
            @csrf
            @isset($task)
                @method('PUT')
            @endisset
            <div class="mb-3">
                <label class="form-label fs-6 fw-semibold" for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title"
                    value="{{ $task->title ?? old('title') }}" />
                @error('title')
                    <p class="error-message form-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fs-6 fw-semibold" for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows=5>{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label fs-6 fw-semibold" for="long_description">Full Description</label>
                <textarea class="form-control" name="long_description" id="long_description" rows=10>{{ $task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
                    <p class="error-message">{{ $message }}</p>
                @enderror

            </div>

            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-danger my-3" href="{{ route('tasks.index') }}">Cancel</a>
                <button class="btn btn-success my-3 ms-3" type="submit">
                    @isset($task)
                        Update task
                    @else
                        Add task
                    @endisset
                </button>
            </div>

        </form>
    </div>
@endsection
