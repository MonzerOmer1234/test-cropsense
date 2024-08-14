<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{



    public function index()
    {
        // Fetch tasks assigned to the current user
        $assignedTasks = Task::where('assigned_to_id', Auth::id())
            ->whereIn('status', [1, 2])
            ->get();

        // Fetch tasks due today
        $tasksDueToday = Task::where('due_date', Carbon::today())->get();

        return response()->json(['today_tasks' => $tasksDueToday, 'assigned_tasks' => $assignedTasks], 200,);
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:1,2,3,4',
        ]);

        $task->status = $request->status;
        $task->save();

        return response()->json(['success' => 'task updated'], 200,);
    }

    public function sendRevisionRequest(Task $task)
    {
        // Logic for sending revision request (e.g., email, notification)

        // Assuming you want to change the status to 'revise' (4)
        $task->status = 4;
        $task->save();

        return response()->json(['sucess' => 'Revision request sent successfully'], 200,);
        // return redirect()->back()->with('success', 'Revision request sent successfully');
    }
}
