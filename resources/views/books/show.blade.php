@extends('layouts.app')

@section('title')
	Book Details
@endsection

@section('content')
	<h2>Book Title: {{$book->title}}</h2>

	<hr />

	<input type="hidden" name="book_id" value="{{$book->id}}">

	<div class="row">

		<div class="col-md-6">
			<img src="{{asset('storage/'.$book->image)}}" class="img-fluid" alt="image" style="width:300px;height:300px;">
		</div>

		<div class="col-md-6">
			<label style="font-weight: bolder;">Author:</label>
			<ul>
				@foreach ($book->authors as $author)
					<li>{{$author->fname}} {{$author->lname}}</li>
				@endforeach
			</ul>

			<hr />

			@if (Auth::id() && Auth::user()->user_type->name == 'Curator' && Auth::User()->user_status->name == 'Approved')

				<div class="row">
					<a href='{{url("book/$book->id/edit")}}' class="btn btn-link">
						Edit book
					</a>

					<form method="POST" action='{{url("book/$book->id")}}'>
						{{csrf_field()}}
						{{ method_field('DELETE') }}
						<button type="submit" value="Delete" class="btn btn-danger">Delete</button>
					</form>
				</div>

				<hr />

					<label>Average Rating: {{$book->avg_rating}}</label>

				<hr />

			@endif

			@if (Auth::id())
				@if ($reviewed)
					<a href="{{url("edit_review_for_book_$book->id")}}" class="btn btn-secondary">Edit Review</a>
				@else
					<a href="{{url("add_review_for_book_$book->id")}}" class="btn btn-success">Add Review</a>
				@endif
			@endif
		</div>

	</div>

	<hr />

	@if (count($reviews) > 0)

		<blockquote class="blockquote">
			<strong>
				Number of reviews for {{$book->title}} : {{count($reviews)}}
			</strong>
		</blockquote>

		@forelse ($reviews as $review)
			<blockquote class="blockquote border p-2">
				<h4 class="mb-0">Reviewed By: {{$review->user->name}} </h4>
				<h5 class="mb-0">Ratings:  {{$review->rating}}/5 </h5>
				<p class="mb-0 pl-5">{{$review->review_text}}</p>
				<footer class="blockquote-footer text-right">Reviewed on : {{$review->updated_at}}</footer>
			</blockquote>
		@empty
			<blockquote class="blockquote text-center">
				<p class="mb-0">No Review</p>
			</blockquote>
		@endforelse

		{{ $reviews->links() }}

	@endif
@endsection