
@section('input')
	<form method="post" action="/">
		@csrf
		<input class="todo-input" type="text" name="name" placeholder="Todo name" value="{{old('name')}}">
		<input class="todo-input" type="text" name="description" placeholder="Todo description" value="{{old('description')}}">
		<select name="category" placeholder="Todo category" value="{{old('category')}}">
			@if(!(old('category')))
				<option value="" disabled selected>Select category</option>
			@else
				<option value="{{old('category')}}">{{ Str::ucfirst(old('category')) }}</option>
			@endif
			<option value="finance">Finance</option>
			<option value="insurance">Insurance</option>
			<option value="state">State</option>
		</select>
		<button type="submit">Add</button>
	</form>
	@if ($errors->any())
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	@endif
@endsection