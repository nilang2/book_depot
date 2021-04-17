@extends('layouts.app')

@section('title')
    Book Details
@endsection

@section('content')
    <h1></h1>
        @foreach ($books as $book)
            <h2>Book Title: {{$book->title}}</h2>
            <p>
                <label>Average Rating: {{$book->avg_rating}}</label>
            </p>
        @endforeach
@endsection