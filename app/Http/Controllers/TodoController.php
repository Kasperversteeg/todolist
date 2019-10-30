<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function sort()
    {
        $todos = Todo::all()->sortBy('name');
        return view('index', compact('todos'));
        // dd($todos);
    }
    public function search(Request $request)
    {
        $request = request('query');
        $results = Todo::where('name','LIKE','%'.$request.'%')
                        ->orwhere('description','LIKE','%'.$request.'%')
                        ->orwhere('category','LIKE','%'.$request.'%')
                                ->get();

        if (count($results) > 0) {
           return view('search', compact('results'));
        } else {
            return view('search')->withMessage('We found nothing, sorry!');
        }

        // $results = Todo::where('category', '=', $id)->get();
        // return view('search', compact('results'));
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'category' => ['required']
        ]);
        Todo::create($validated);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $toUpdate = Todo::findOrFail($request->id);
        $toUpdate->update(request(['name', 'description', 'category']));
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Todo::findOrFail($request->id)->delete();
        // $todo->destroy();
        return redirect('/');
    }
}
