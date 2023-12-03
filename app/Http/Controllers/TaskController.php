<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct(Task $task){
        $this->task =$task;

    }
    public function index(Request $request)
    {
        $input = $request->all();
        $tasks = $this->task->getData($input);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $statusMap = ['pending','completed'];
        return view('tasks.create',compact('statusMap'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|alpha',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed',
        ]);
        $result = $this->task->saveData($input);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');

    }

    public function show(string $id)
    {   
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(string $id)
    {
        $statusMap = ['pending','completed'];
        $task = Task::find($id);
        return view('tasks.edit',compact('statusMap','task'));

    }

    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'title' => 'required|unique:tasks,title,'. $id .'ID',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed',
        ]);
        $update = $this->task->updateData($input,$id);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(string $id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
