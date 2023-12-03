@extends('layouts.task')

@section('metaTitle', 'View Task')
@section('metaDescription', 'View task details.')
@section('content')
<div class="clearfix pt-4 pb-2">
    <div class="float-left">
        <h2>Task Details ({{ $task->title }})</h2>
    </div>
    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('tasks.index') }}" title="All Tasks">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Task Information
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <strong>Title:</strong> {{ $task->title }}
            </div>
            <div class="col-md-6">
                <strong>Status:</strong> {{ $task->status }}
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-12">
                <strong>Description:</strong> {{ $task->description }}
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6">
                <strong>Due Date:</strong> {{ $task->due_date }}
            </div>
            <!-- Add more details as needed -->
        </div>
    </div>
</div>

@endsection
