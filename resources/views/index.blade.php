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
					<div class="todo-row-left">
						<form method="post" action="/{{$todo->id}}">
							@method('PATCH')
							@csrf
							<input class="input input-20" type="text" name="name" placeholder="Todo name" value="{{$todo->name}}">
							<input class="input input-40" type="text" name="description" placeholder="Todo description" value="{{$todo->description}}">
							<select class="input input-20" name="category" placeholder="Todo category" value="">
								<option value="{{$todo->category}}">{{ Str::ucfirst($todo->category) }}</option>
								<option value="finance">Finance</option>
								<option value="insurance">Insurance</option>
								<option value="state">State</option>
							</select>
							<span>{{$todo->done}}</span>
							<button class="input input-10 float-right" type="submit">Edit</button>
						</form>
					</div>
					<div class="todo-row-right">
						<form class="left" method="POST" action="/{{$todo->id}}">
								@method('DELETE')
								@csrf
								<button class="input delete" input="submit">Delete</button>
						</form>
					</div>
				</div>
				<hr>
			@endforeach

		@endif
 @endsection