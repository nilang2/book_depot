@extends('layouts.app')

@section('title')
	Books
@endsection

@section('content')

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-header">

					<span style="font-size: 1.5rem;">Books</span>

					@if (Auth::id() && Auth::user()->user_type->name == 'Curator' && Auth::User()->user_status->name == 'Approved')
						<a href='{{url("book/create")}}' class="btn btn-outline-success float-right">
							Create book
						</a>
					@endif

				</div>

				<ul class="list-group list-group-flush">
					@forelse ($books as $book)
						<a href='{{url("book/$book->id")}}'>
							<li class="list-group-item">{{$book->title}}</li>
						</a>
					@empty
						<li class="list-group-item text-center">No record found!</li>
					@endforelse
				</ul>

			</div>
			<hr>
			<p><a href='{{url("high_avg_rating")}}'><button class="btn btn-outline-success float-left">SortBy Average Rating</button></a></p>

		</div>
	</div>

@endsection