<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd($request);
        // $validatedData = $request->validate([
          //  'title' => 'filled|string|required|max:255',
         //   'descripton' => 'required|filled',
      //  ]);
        
       $task = new Task();
       $task->fill($request->all()); // Or $product->fill($validatedData);
       $task->save();

        return response()->json(['message' => 'Operation successful'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    $task = Task::find($id);

     if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
    return $task;
    }



     public function all()
    {
   return Task::all(); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json(['message' => 'Update Task successful'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

$task = Task::find($id);

  if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
              }
      $task->delete();
    return response()->json(['message' => 'Delete Task successful'], 200);
    }
}
