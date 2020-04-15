<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        //fetch all todos from database
        //display all todos on todos.index
        return view('todos.index')->with('todos',Todo::all());
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo',$todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'name'=> 'required|min:4|max:24',
            'description' => 'required'
        ]);

        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success','Todo Created Successfully');

        return redirect('/todos');


    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
        $this->validate(request(),[
            'name'=> 'required|min:4|max:24',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success','Todo Updated Successfully');

        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;

        $todo->save();

        session()->flash('success','Todo completed Successfully');

        return redirect('/todos');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        session()->flash('success','Todo Deleted Successfully');

        return redirect('/todos');
    }
}
