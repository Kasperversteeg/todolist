@extends('layout')

@extends('create')

@section('search-content')
	<h1>Search results</h1>
		@if(!empty($message))
			<p>{{$message}}</p>
		@elseif(count($results) > 0)

			@foreach ($results as $result)
				<div class="todo-row">
					<div class="todo-row-left">
						<form method="post" action="/{{$result->id}}">
							@method('PATCH')
							@csrf
							<input class="input input-20" type="text" name="name" placeholder="Todo name" value="{{$result->name}}">
							<input class="input input-40" type="text" name="description" placeholder="Todo description" value="{{$result->description}}">
							<select class="input input-20" name="category" placeholder="Todo category" value="">
								
								{{-- Vervangen voor eloquent versie --}}
								<option value="{{$result->category_id}}">{{ $categories->find($result->category_id)->category  }}</option>
								{{-- Vervangen voor eloquent versie --}}

								@foreach($categories as $category)
									<option>{{$category->category}}</option>
								@endforeach
							</select>
							<button class="input input-10 float-right" type="submit">Edit</button>
						</form>
					</div>
					<div class="todo-row-right">
						<form class="left" method="POST" action="/{{$result->id}}">
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