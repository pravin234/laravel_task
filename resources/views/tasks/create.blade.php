@extends('layouts.task')

@section('metaTitle', 'Create Task')
@section('metaDescription', 'Create a new task.')
@section('content')
<div class="clearfix pt-4 pb-2">
    <div class="float-left">
        <h2>Add Task</h2>
    </div>
    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('tasks.index') }}" title="All Tasks">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li style="color: red;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-header">
        Task Information
    </div>
    <div class="card-body">

    <form action="{{ route('tasks.store') }}" method="POST" onsubmit="return validateSearch()">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Title *</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                    @error('title-error') <span style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Status *</label>
                    <select name="status" class="form-control">
                        <option value="" {{ old('status') === '' ? 'selected' : '' }}>Select Status</option>
                        @foreach($statusMap as $value)
                        <option value="{{ $value }}" {{ old('status') === $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('status') <span style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Description *</label>
                    <textarea name="description" class="form-control" >{{ old('description') }}</textarea>
                    @error('description') <span style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Due Date *</label>
                    <input type="date" name="due_date" class="form-control datepicker" placeholder="Planned Start Date" data-date-format="yyyy-mm-dd" value="{{ old('due_date') }}">
                    @error('due_date') <span style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center p-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-primary" href="{{ route('tasks.index') }}">Cancel</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('form').validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 255
                },
                status: 'required',
                description: {
                    required:true,
                    maxlength: 500
                },
                due_date: {
                    required: true,
                    date: true
                }
            },
            messages: {
                title: {
                    required: 'Please enter a title',
                    maxlength: 'Title must not exceed 255 characters'
                },
                status: 'Please select a status',
                description: {
                    maxlength: 'Description must not exceed 500 characters'
                },
                due_date: {
                    required: 'Please enter a due date',
                    date: 'Please enter a valid date'
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element); // Display error message after the form element
            }
        });
    });
</script>

@endsection
