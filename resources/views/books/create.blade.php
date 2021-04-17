@extends('layouts.app')

@section('title')
	Add Book
@endsection

@section('content')
		
	<h2>Add Book form</h2>

	<hr />

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-body">

					<form method="POST" action="{{url("book")}}" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" class="@error('title') is-invalid @enderror">
								@error('title')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Gener</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="genre" class="@error('title') is-invalid @enderror">
								@error('genre')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Published Year</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="published_year" class="@error('title') is-invalid @enderror">
								@error('published_year')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Author</label>
							<div class="col-sm-10">
								<select name="author_id[]" class="form-control" multiple>
									@foreach ($authors as $author)
										<option value="{{$author->id}}">{{$author->fname}} {{$author->lname}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Upload</label>
							<div class="col-sm-10">
								<input type="file" class="form-control-file" name="image">
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn btn-primary">Create</button>
							</div>
						</div>

					</form>

				</div>

			</div>
		</div>
	</div>

@endsection