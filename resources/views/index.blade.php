@extends('layout')
@extends('create')

@section('content')
	<div class="index-title">
		<div class="float-left">
			<h1>Todo List</h1>
		</div>
		<div class="float-right">
			<a href="/sort">Sort by name</a>
		</div>
	</div>
		@if(count($todos) === 0)
			<h3>No todo's, great job!</h3>
		@else
			@foreach ($todos as $todo)
				<div class="todo-row">
					<form class="todo-row-check input" method="POST" action="/complete/{{ $todo->id }}">
						@method('PATCH')
						@csrf
						<label>
						  <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $todo->completed ? 'checked' : ''}}>
						</label>
					</form>

					<form class="todo-row-form" method="post" action="/{{$todo->id}}">
						@method('PATCH')
						@csrf

						<input class="input" type="text" name="name" placeholder="Todo name" value="{{$todo->name}}">
						
						
						<input class="input" type="text" name="description" placeholder="Todo description" value="{{$todo->description}}">
						
						<select class="input" name="category" placeholder="Todo category" value="">
							
							{{-- Vervangen voor eloquent versie --}}
							<option value="{{$todo->category_id}}">{{ $categories->find($todo->category_id)->category  }}</option>
							{{-- Vervangen voor eloquent versie --}}

							@foreach($categories as $category)
								<option>{{$category->category}}</option>
							@endforeach
						</select>

						<button class="input" type="submit">Edit</button>
					</form>

					<form class="todo-row-delete" method="POST" action="/{{$todo->id}}">
							@method('DELETE')
							@csrf
							<button class="input delete" input="submit">Delete</button>
					</form>
				
				</div>
				<hr>
			@endforeach

		@endif
 @endsection