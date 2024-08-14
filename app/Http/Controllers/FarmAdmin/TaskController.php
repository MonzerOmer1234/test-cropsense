<?php

namespace App\Http\Controllers\FarmAdmin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'assigned_to_id' => 'nullable|exists:users,id',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->created_by_id = auth()->user()->id; // Assuming authenticated user creates the task
        $task->assigned_to_id = $request->assigned_to_id;
        $task->save();

        return response()->json(['message' => 'Task created successfully'], 201);
    }

    public function index(Request $request)
    {
        $user = auth()->user();

        // Fetch tasks assigned to the user
        $assignedTasks = Task::where('assigned_to_id', $user->id)->get();

        // Fetch tasks created by the user
        $createdTasks = Task::where('created_by_id', $user->id)->get();

        return response()->json(['assignedTasks' => $assignedTasks, 'createdTasks' => $createdTasks]);
    }


   /**
    * The function `unassignedTasks` retrieves all tasks that have not been assigned to any user and
    * returns them as a JSON response.
    *
    * @return array containing the unassigned tasks is being returned in JSON format.
    */
    public function unassignedTasks()
    {
        $unassignedTasks = Task::whereNull('assigned_to_id')->get();

        return response()->json(['unassignedTasks' => $unassignedTasks]);
    }


    public function assignTask(Request $request, $userId)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
        ]);

        $task = Task::find($request->taskId);

        // Ensure task is not already assigned
        // We can ignore this , because the admin can change the task assignee any time
        /**
         * if ($task->assigned_to_id) {
         *  return response()->json(['message' => 'Task is already assigned'], 400);
         *  }
         */

        $user = User::findOrFail($userId);
        $task->assigned_to_id = $user->id;
        $task->save();

        return response()->json(['message' => 'Task assigned successfully'], 200);
    }
}

