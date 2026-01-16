<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    public function updateStatus(Task $task)
    {
        $this->authorize('updateStatus', $task);

        $task->update(['status' => 'done']);

        return back()->with('success','Status updated');
    }
}
