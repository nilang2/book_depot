@extends('layouts.app')

@section('title')
    Books
@endsection

@section('content')
    @if(count($books) > 0)
    <h3>Search Result for : {{$query}}</h3><hr>
    <ul>
        @foreach ($books as $book)
            <a href='{{url("book/$book->id")}}'><li>{{$book->title}}</li></a>
        @endforeach
    </ul>
    @else
    <h3>No data found</h3>
    @endif
    @if (Auth::id() && Auth::user()->user_type->name == 'Curator')
    <p><a href='{{url("book/create")}}'><button>Create book</button></a></p>
    @endif
@endsection