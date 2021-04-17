<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Review;
use App\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


Route::get('/', function(){
    return redirect(url("book"));
});

Route::resource('book', 'BookController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add_review_for_book_{id}', function($id){      /* get function for retrieveing varibles from the from*/
    $user_reviewed = \DB::table('review')->where('review.user_id', '=', Auth::id())->where('review.book_id', '=', $id)->get();
    if (count($user_reviewed) > 0)
    {
        die("<h1>Cannot add multiple reviews!!!</h1>");
    }
    return view('books.add_review')->with('book', Book::find($id));
});

Route::post("add_book_review_action", function(Request $request){               /* post function to insert review data in reviews table & calculating average rating for book    */
    
    $request->validate([
        'review_text' => 'required',
        'rating' => 'required|min:0|max:5',
    ]);
    
    $user_id = Auth::id();
    $book_id = request('book_id');
    $review = new Review;
    $review->book_id = $book_id;
    $review->user_id = Auth::id();
    $review->review_text = request('review_text');
    $review->rating = request('rating');
    $review->save();
    $avg_rating = Review::where('review.book_id','=', request('book_id'))->avg('rating');
    $book_rating = Book::where('id', '=', request('book_id'))->update(['avg_rating' => $avg_rating ]);
    
    return redirect(url("book/$book_id"));
});

Route::get('/edit_review_for_book_{id}', function(){                            /* get function for editing the review*/
    $user_reviewed = Review::where('review.user_id', '=', Auth::id())->get();
    return view('books.edit_review')->with('review', $user_reviewed);
});

Route::post("edit_book_review_action", function(){               /* post function to update the values in review & book table    */
        
    $review = Review::where('review.user_id', '=', Auth::id())->first();
    $review->review_text = request('review_text');
    $review->rating = request('rating');
    $review->save();
    return redirect(url("book/$review->book_id"));
});

Route::any('/search',function(){                                /* function to search for the books  */
    $q = request('q');
    $books = Book::where('title','LIKE','%'.$q.'%')->orWhere('genre','LIKE','%'.$q.'%')->orWhere('year','LIKE','%'.$q.'%')
    ->orWhereHas('authors', function ($query) use($q) {
        $query->where('fname','LIKE','%'.$q.'%')->orWhere('lname','LIKE','%'.$q.'%')->orWhere('nationality','LIKE','%'.$q.'%');
    })->get();
    return view("books/search")->with('books', $books)->with('query', $q);
});

Route::get("/approve_curator", function(){                      /*function to get curators whose status is not approved */
   $curators = User::where('users.user_type_id', '=', 2)->Where('users.user_status_id', '!=', '2')->get();
   return view('books/approve_curator')->with('curators', $curators);
});

Route::post("approve_curator_by_admin", function(){               /* function to approve the curators by admin */
        
    $users = User::whereIn('id', request()->user_id);
    $data = ['user_Status_id' => 2];
    $users->update($data);
    return redirect(url("book"));
});

Route::get('high_avg_rating', function(){                           /* function which return 5 books with high avg rating in last 30 days
                                                                        which have min of 2 reviews and showin in decreasing rating order  */
    $rating_data = Book::orderBy('avg_rating', 'desc')->where( 'updated_at', '>', Carbon::now()->subDays(30))
    ->get();
    $reviewd_book = \DB::table('review')->get();
    $data = array();
    foreach ($reviewd_book as $i)
    {
        if (array_key_exists(strval($i->book_id), $data)){
            $data [strval($i->book_id)] += 1;
        }
        else{
            $data[$i->book_id] = 1;
        }
    }
    $book_ids = array();
    foreach ($data as $key => $val){
        if (($data[$key]) > 2){
            array_push($book_ids, $key);
        }
    }
    $books = Book::orderBy('avg_rating', 'desc')->whereIn('id', $book_ids)->where( 'updated_at', '>', Carbon::now()->subDays(30))
    ->limit('5')->get();
    return view('books/high_avg_rating')->with('books',$books);
});

Route::get("soft_deleted_books", function(){                    /* function to get the values of existing and soft deleted items  */
    $active_books = Book::all();
    $deactive_books = Book::onlyTrashed()->get();
    return view('books/active_deactive_books')->with('active_books', $active_books)->with('deactive_books', $deactive_books);
});


// incomplete functionality
Route::get('recommended_books', function(){             
    $words = ['absolutely', 'accepted', 'accomplish', 'adorable', 'affluent', 'agree', 'agreeable', 'amazing', 'appealing', 'attractive', 'awesome',
                'beaming', 'beautiful', 'bliss', 'bravo', 'brilliant', 'cheery', 'composed', 'cool', 'courageous', 'creative', 'dazzling', 'delight',
                'delightful', 'distinguished', 'divine', 'earnest', 'easy', 'ecstatic', 'effective', 'elegant', 'encouraging', 'energetic', 'energized',
                'enthusiastic', 'esteemed', 'excellent', 'exciting', 'exquisite', 'fabulous', 'famous', 'fantastic', 'favorable', 'fresh', 'friendly',
                'fun', 'funny', 'generous', 'genuine', 'good', 'gorgeous', 'great', 'happy', 'hearty', 'honest', 'ideal','imaginative','imagine','impressive','independent','innovate','innovative','instant','instantaneous','instinctive','intellectual','intelligent','intuitive','inventive','jovial','joy','jubilant','laugh','learned','legendary','light','lively','lovely','lucid','lucky','luminous','marvelous','masterful','meaningful','merit','meritorious','miraculous','motivating','moving','natural','nice','novel','now','nurturing','nutritiousokay','one','open','optimistic','paradise','perfect','phenomenal','pleasant','pleasurable','plentiful','poised','polished','popular','positive','powerful','prepared','pretty','principled','productive','progress','prominent','protected','proud','ready','reassuring','refined','refreshing','rejoice','reliable','remarkable','resounding','respected','restored','reward','rewarding','right','robust','safe','satisfactory','secure','seemly','simple','skilled','skillful','smile','soulful','sparkling','special','spirited','spiritual','stirring','stunning','stupendous','success','successful','sunny','super','superb','supporting','surprising','terrific','thorough','thrilling','thriving','tops','tranquil','transformative','transforming','trusting','truthful','unreal','unwavering','up','upbeat','upright','upstanding','valued','vibrant','victorious','victory','vigorous','virtuous','vital','vivacious','wealthy','welcome','well','whole','wholesome','willing','wonderful','wondrous','worthy','wow','zeal','zealous'
                ];

        $reviews = Review::where('user_id','=', Auth::id())->get();
        dd($reviews);
});

