@section('input')
	<h1>Add Todo</h1>
	
	<div class="add-todo">
		<form class="add-todo-form" method="post" action="/">
			@csrf
			<input class="input todo-name {{-- {{ $errors->has('name') ? 'error' :''}} --}} " type="text" name="name" placeholder="Todo name" value="{{old('name')}}">
			@error('name')
				<div class="name-error error">Name is not valid</div>
			@enderror
			<input class="input todo-descr {{ $errors->has('description') ? 'error' :''}}" type="text" name="description" placeholder="Todo description" value="{{old('description')}}">
			@error('description')
				<div class="descr-error error">Description is not valid</div>
			@enderror
			<select class="input todo-cat{{ $errors->has('category_id') ? 'error' :''}}" name="category_id" placeholder="Todo category" value="{{old('category_id')}}">
				@if(!(old('category_id')))
					<option value="" disabled selected>Select category</option>
				@else
					<option value="{{old('category_id')}}">{{ Str::ucfirst( $categories->find(old('category_id'))->category ) }}</option>
				@endif	
				@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->category}}</option>
				@endforeach
			</select>
			@error('category_id')
				<div class="cat-error error">No category selected</div>
			@enderror	
			<button class="input todo-edit" type="submit">Add</button>
		</form>
	</div>

	
@endsection