<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Task::all()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     app
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'order' => $request->order
            ]);

            return response()->json([
                'status' => (bool) $task,
                'data'   => $task,
                'message' => $task ? 'Task Created!' : 'Error Creating Task'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        $status = $task->update(
                $request->only(['name', 'category_id', 'user_id', 'order'])
            );

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Task Updated!' : 'Error Updating Task'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
         $status = $task->delete();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Task Deleted!' : 'Error Deleting Task'
            ]);
    }
}
