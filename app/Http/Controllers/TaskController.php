<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('id','desc')->get();
       
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo',
            ],
            
            [
                'label' => 'Done',
                'value' => 'Done',
            ]

            ];
       return view('create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request -> validate([
        'title'=>'required'
       ]);
       $task = new Task();
       $task->title = $request->title;
       $task->description = $request->description;
       $task->status = $request->status;
       $task->save();
    
       return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task:: findOrFail($id);
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo',
            ],
            
            [
                'label' => 'Done',
                'value' => 'Done',
            ]

            ];
       return view('edit', compact('statuses', 'task'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task:: findOrFail($id);
        $request -> validate([
            'title'=>'required'
           ]);
           
           $task->title = $request->title;
           $task->description = $request->description;
           $task->status = $request->status;
           $task->save();
        
           return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task:: findOrfail($id);
        $task->delete();

        return redirect()->route('task.index');
    }
}
