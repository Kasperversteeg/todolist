<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create()
    {
    	return view('/category');
    }

    public function store(Category $category)
    {
		$validated = request()->validate([
			'category' => ['required']
		]);
		Category::create($validated);

		return redirect('/');
    }
}
