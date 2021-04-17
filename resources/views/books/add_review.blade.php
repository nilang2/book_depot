@extends('layouts.app')

@section('title')
	Add review
@endsection

@section('content')
	<h2>Add review for {{ $book->tite ?? '' }}</h2>

	<hr />

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-body">

					<form method="POST" action={{url("add_book_review_action")}}>
						{{ csrf_field() }}
						<input type="hidden" name="book_id" value="{{ $book->id }}">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Review</label>
							<div class="col-sm-10">
								<textarea name="review_text" class="form-control"></textarea>
							</div>
						</div>
						@error('review_text')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Rating</label>
							<div class="col-sm-10">
								<input type="number" step="0.01" name="rating" class="form-control">
							</div>
						</div>
						@error('rating')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror

						<div class="form-group row mb-0">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>

					</form>

				</div>

			</div>
		</div>
	</div>
@endsection