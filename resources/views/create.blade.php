
@section('input')
	<h1>Add Todo</h1>
	<div class="add-todo">
		<form method="post" action="/">
			@csrf
			<input class="input input-20 {{ $errors->has('name') ? 'error' :''}} " type="text" name="name" placeholder="Todo name" value="{{old('name')}}">
			<input class="input input-40 {{ $errors->has('description') ? 'error' :''}}" type="text" name="description" placeholder="Todo description" value="{{old('description')}}">
				<select class="input input-20 {{ $errors->has('category') ? 'error' :''}}" name="category" placeholder="Todo category" value="{{old('category')}}">
					@if(!(old('category')))
						<option value="" disabled selected>Select category</option>
					@else
						<option value="{{old('category')}}">{{ Str::ucfirst(old('category')) }}</option>
					@endif
					<option value="finance">Finance</option>
					<option value="insurance">Insurance</option>
					<option value="state">State</option>

				</select>	
			<button class="input input-20 float-right" type="submit">Add</button>
		</form>
	</div>
	@if ($errors->any())
		<div class="input input-error">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</div>
	@endif
@endsection