@extends('layouts.app')

@section('title')
	Books
@endsection

@section('content')
	<h2>Curators</h2>
	<hr />

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-body">
				@if (count($curators) > 0)
					<form method="POST" action={{url("approve_curator_by_admin")}}>
						{{ csrf_field() }}

						@foreach ($curators as $key => $curator)
						<div class="form-group row">
							<input type="hidden"  name="user_id[]" value="{{ $curator->id }}"> 
							<label class="col-sm-2 col-form-label">{{$curator->name}}</label>
							<div class="col-sm-10 custom-control custom-checkbox">
								<input type="checkbox" name="approved[]" class="custom-control-input" id="customCheck{{ $key }}">
								<label class="custom-control-label" for="customCheck{{ $key }}">Approve</label>
							</div>
						</div>
						@endforeach

						<div class="form-group row mb-0">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn btn-primary">Approve</button>
							</div>
						</div>

					</form>
				@else
					<h2>All curators are approved.</h2>
				@endif
				</div>

			</div>
		</div>
	</div>

	@if (Auth::id() && Auth::user()->user_type->name == 'Curator')
	<!-- <p><a href='{{url("book/create")}}'><button>Create book</button></a></p> -->
	@endif
@endsection