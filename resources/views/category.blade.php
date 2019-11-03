	<h1>Create Category</h1>
	<form method="post" action="/createCategory">
		@csrf
		<div>
			<input type="text" name="category" placeholder="Category name" class="input {{ $errors->has('category') ? 'error' :''}}" value="{{ old('title') }}">
		</div>
		
			<button type="submit">Create Category</button>
		</div>
	</form>

	@if ($errors->any())
		<ul class="error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
