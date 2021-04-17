<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Author;
use App\Review;
use App\Book_Author;
use App\Genre;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books/index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::id() && Auth::user()->user_type->name == 'Curator')
        {
            return view('books/create')->with('authors', Author::all());
        }
        else
        {
            return redirect('books'); //redirct to list page
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'genre' => 'required|max:50',
            'published_year' => 'required|numeric|min:1701|max:2020'
        ]);
        
        $image_store = "";
        if (request()->file('image')){
            $image_store = request()->file('image')->store('images', 'public');
        }        $book = new Book();
        $book->title = $request->title;
        $book->genre = $request->genre;
        $book->published_year = $request->published_year;
        $book->image = $image_store;
        $book->save();
        foreach (request('author_id') as $i)
        {
            $book_author = new Book_Author();
            $book_author->book_id = $book->id;
            $book_author->author_id = $i;
            $book_author->save();
        }
        return redirect("book/$book->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $reviews = Review::where('review.book_id', '=', $id)->paginate(5);
        $reviewed = Review::where('review.book_id', '=', $id)->where('user_id', '=', auth()->id())->exists();
        return view('books/show')->with('book', $book)->with('reviews', $reviews)->with('reviewed', $reviewed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::user()->user_type->name == 'Curator')
        {
            $book = Book::find($id);
            $genres = \DB::table('genres')->select('*')->get();
            return view('books.edit')->with('book', $book)->with('genres', $genres)->with('authors', Author::all());
        }
        else
        {
            return redirect('books'); //redirct to list page
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'genre' => 'required|max:50',
            'published_year' => 'required|numeric|min:1701|max:2020',
            'author_id' => 'required'
        ]);
        $image_store = "";
        if (request()->file('image')){
            $image_store = request()->file('image')->store('images', 'public');
        }
        $book =Book::find($id);
        $book->title = $request->title;
        $book->genre = $request->genre;
        $book->published_year = $request->published_year;
        $book->image = $image_store;
        $book->genre = 0;
        $book->save();
        $book_author = Book_Author::where('book_id', '=', $id)->get();
        foreach ($book_author as $i)
        {
            $book_author->book_id = $book->id;
            $book_author->author_id = $i;
            $book_author->save();
        }
        return redirect("book/$book->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $book = Book::find($id);
        if ($book != Null){
            
            $book->delete();
            $books = Book::all();
            return view('books/index')->with('books', $books);
        }
    }
}
