@extends('layouts.task')

@section('content')

<div class="clearfix pt-4 pb-2">
    <div class="float-left">
        <h2>Manage Tasks</h2>
    </div>
    <div class="float-right">
        <a class="btn btn-success" href="{{ route('tasks.create') }}" title="Create Task">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card">
    <div class="card-header">Task Information</div>
    <div class="card-body">
        <div class="row">
         <form action="{{ route('tasks.index') }}" method="GET" class="form-inline">
            <div class="form-group mx-2">
                <input type="text" class="form-control" name="title" value="{{ request('title') }}" placeholder="Filter by title">
            </div>

            <div class="form-group mx-1">
                <label for="status" class="mr-1">Status:</label>
                <select name="status" class="form-control">
                    <option value="" {{ !request('status') ? 'selected' : '' }}>All</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="form-group mx-2">
                <label for="start_date" class="mr-2">Start Date:</label>
                <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="form-group mx-2">
                <label for="end_date" class="mr-2">End Date:</label>
                <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
            </div>
            <button class="btn btn-primary mx-1" type="submit">Filter</button>
            <a class="btn btn-primary" href="{{ route('tasks.index') }}" title="All Tasks">
                refresh
            </a>
        </form>
    </div>
    <br>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th >Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ date_format($task->due_date, 'd-m-yy') }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-link text-success" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-link text-primary" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('tasks.destroy', $task->id ) }}" method="post" class="d-inline">@csrf @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger" title="Delete" onclick="return confirm('Are you sure to delete this task?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        {{ $tasks->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
