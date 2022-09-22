<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        $res = [];
//        $books = Book::paginate();
//        foreach ($books as $book) {
//            $res[$book['id']]['book_name'] = $book['book_name'];
//            $res[$book['id']]['author_name'] = $book->author_name;
//        }
//        return view("index", ['data'=> $res]);
        {
            $books = Book::paginate();
            return view('index', compact('books'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        Book::create($request->only(["book_name", "author_name"]));
//        return redirect()->route("books.index")->withSuccess("Created book ".$request->book_name);
        $book = $request->only(['book_name']);
        $name = $request->only(['author_name']);
        $author = DB::table('authors')->select('*')->where('authorName', $name)->get()->first();
        if ($author) {
            $book['author_id'] = $author->id;
        } else {
            $new_author = Author::create($name);
            $book['author_id'] = $new_author->id;
        }

        Book::create($book);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Book $book)
    {
        return view("show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Book $book)
    {
        return view("form", compact("book"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->only(['book_name', 'author_name']));
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route("books.index")->withDanger("Deleted book ".$book->book_name);
    }
}
