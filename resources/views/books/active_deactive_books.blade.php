@extends('layouts.app')

@section('title')
	Books
@endsection

@section('content')

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-header">
					<span style="font-size: 1.5rem;">Activated Books</span>
				</div>

				<ul class="list-group list-group-flush">
					@forelse ($active_books as $book)
						<li class="list-group-item">{{$book->title}}</li>
					@empty
						<li class="list-group-item text-center">No record found!</li>
					@endforelse
				</ul>
			</div><hr>
			<div class="card">
				<div class="card-header">
					<span style="font-size: 1.5rem;">Deactivated Books</span>
				</div>

				<ul class="list-group list-group-flush">
					@forelse ($deactive_books as $book)
						<li class="list-group-item">{{$book->title}}</li>
					@empty
						<li class="list-group-item text-center">No record found!</li>
					@endforelse
				</ul>

			</div>
		</div>
	</div>

@endsection