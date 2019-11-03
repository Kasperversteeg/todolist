<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

class TodoController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $todos = Todo::all();
        return view('index', compact('todos','categories'));
    }

    public function sort()
    {
        $todos = Todo::all()->sortBy('name');
        return view('index', compact('todos'));
        // dd($todos);
    }
    public function search()
    {
        $request = request('query');
        $results = Todo::where('name','LIKE','%'.$request.'%')
                        ->orwhere('description','LIKE','%'.$request.'%')
                                ->get();
        $categories = Category::all();

        if (count($results) > 0) {
           return view('search', compact('results', 'categories'));
        } else {
            return view('search')->withMessage('We found nothing, sorry!');
        }
    }

    public function store(Todo $todo)
    {
        $validated = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required']
        ]);

        Todo::create($validated);
        return redirect('/');
    }

    public function update(Todo $todo)
    {
       $todo->update(request(['name', 'description', 'category']));
        return redirect('/');
    }

    public function complete(Todo $todo)
    {
         // dd(request()->has('completed'));
       $todo->update([
            'completed' => request()->has('completed')
        ]);

        // $todo->update(['completed']);

        return back();
    }

    public function destroy(Todo $todo)
    {
        Todo::findOrFail($todo->id)->delete();
        // $todo->destroy();
        return redirect('/');
    }
}
