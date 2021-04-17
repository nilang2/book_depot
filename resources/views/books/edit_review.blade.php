@extends('layouts.app')

@section('title')
  Add review
@endsection

@section('content')
	<!-- <h2>Add review for {{$review}}</h2> -->

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-body">

					<form method="POST" action={{url("edit_book_review_action")}}>
						{{ csrf_field() }}
						<input type="hidden" name="review_id" value="{{ $review[0]->id }}">

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Review</label>
							<div class="col-sm-10">
								<textarea name="review_text" class="form-control">{{ $review[0]->review_text }}</textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Rating</label>
							<div class="col-sm-10">
								<input type="number" step="0.01" name="rating" class="form-control" value="{{ $review[0]->rating }}">
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn btn-success">Update</button>
							</div>
						</div>

					</form>

				</div>

			</div>
		</div>
	</div>
@endsection