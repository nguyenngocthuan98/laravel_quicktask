<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\Http\Requests\TaskRequest;

use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    /**
     * Display a list of all of task.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index()
    {
        $tasks = Task::orderBy('id','desc')->get();
        return view('tasks', [
            'tasks' => $tasks,
        ]);
    }


    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TaskRequest $req)
    {
        Task::create($req->all());
        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
