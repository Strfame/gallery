@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
				
@endsection

@section('content')
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="collapse navbar-collapse">
						<form method="GET" action="{{ route('pictures.index') }}" class="form-inline my-2 my-lg-0">
								<button class="btn btn-primary" type="submit">Back to gallery</button>
						</form>
				</div>
		</nav>

		<img src="../images/{{ $picture->full_name }}" class="img-thumbnail" alt="{{$picture->full_name}}"></img>
		
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Title:</label>
				<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$picture->title}}">
				</div>
		</div>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Description:</label>
				<div class="col-sm-10">
						<p>{{$picture->description}}</p>
				</div>
		</div>

		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Created at:</label>
				<div class="col-sm-10">
						<p>{{$picture->created_at}}</p>
				</div>
		</div>
@endsection