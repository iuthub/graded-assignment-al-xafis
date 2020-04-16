<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Task::all();

        if(Auth::check()){

            $userdatas = Task::where('user_id', Auth::user()->id)->get();
            return view('welcome')->with('datas', $datas)->with('userdatas', $userdatas);
        }

        return view('welcome')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $task = new Task([
            'name' => $data['name'],
        ]);

        $user->tasks()->save($task);

        session()->flash('success', 'Task successfully created');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $targets = Task::find($id);

        // return view('welcome')->with('targets',$target);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Task::find($id);

        return view('tasks.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTaskRequest $request, $id)
    {

        $info = request()->all();

        $datas = Task::find($id);

        $datas->name = $info['name'];

        $datas->save();

        session()->flash('success', "Task successfully updated");

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = Task::find($id);

        $datas->delete();

        session()->flash('success', 'Task successfully deleted');

        return redirect('/');
    }
}
