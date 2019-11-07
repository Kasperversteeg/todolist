@extends('layout')

@extends('create')

@section('content')
	<h1>Search results</h1>
		@if(!empty($message))
			<p>{{$message}}</p>
		@elseif(count($results) > 0)

			@foreach ($results as $result)
				<div class="todo-row">
					<form class="todo-row-check input" method="POST" action="/complete/{{ $result->id }}">
						@method('PATCH')
						@csrf
						<label>
						  <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $result->completed ? 'checked' : ''}}>
						</label>
					</form>

					<form class="todo-row-form" method="post" action="/{{$result->id}}">
						@method('PATCH')
						@csrf

						<input class="input todo-name" type="text" name="name" placeholder="Todo name" value="{{$result->name}}">
						
						
						<input class="input todo-descr" type="text" name="description" placeholder="Todo description" value="{{$result->description}}">
						
						<select class="input todo-cat" name="category_id" placeholder="Todo category" value="">
							
							{{-- Vervangen voor eloquent versie --}}
							<option value="{{$result->category_id}}">{{ $categories->find($result->category_id)->category  }}</option>
							{{-- Vervangen voor eloquent versie --}}

							@foreach($categories as $category)
								<option value="{{$category->id}}" >{{$category->category}}</option>
							@endforeach
						</select>

						<button class="input todo-edit" type="submit">Edit</button>
					</form>

					<form class="todo-row-delete" method="POST" action="/{{$result->id}}">
							@method('DELETE')
							@csrf
							<button class="input delete" input="submit">Delete</button>
					</form>
				
				</div>
				<hr>
			@endforeach
		@endif
@endsection