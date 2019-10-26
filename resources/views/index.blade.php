@extends('layout')
@extends('create')

@section('content')
	<h1>Test content</h1>
		@foreach ($todos as $todo)
			<li>{{$todo->name}}</li>
		@endforeach
 @endsection