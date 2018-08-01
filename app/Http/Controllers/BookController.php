<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Book;
use App\Author;
use App\Genre;
use App\Section;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = array(
            'title' => 'Books',
            'authors' => Author::all(),
            'sections' => Section::all(),
            'genres' => Genre::all(),
            'books' => DB::table('books')
            ->select('books.id as id', 'books.copies as copies',
                'books.book_title as book_title', 
                'authors.author_name as author_name', 
                'genres.genre_name as genre_name', 
                'sections.section_name as section_name'
            )
            ->where('copies', '!=' , 0)
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->join('genres', 'genres.id', '=', 'books.genre_id')
            ->join('sections', 'sections.id', '=', 'books.section_id')
            ->get()
        );
        return view('pages.books')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'book_title' => 'required|unique:books,book_title',
            'author' => 'required',
            'genre' => 'required',
            'section' => 'required',
        ]);

        //Create Genre
        $book = new Book;
        $book->book_title = $request->input('book_title');
        $book->author_id = $request->input('author');
        $book->genre_id = $request->input('genre');
        $book->section_id = $request->input('section');
        $book->save();

        return redirect('/books')->with('success', 'Book Created!');
    }

    public function addCopies(Request $request)
    {
        $this->validate($request, [
            'copies' => 'required'
        ]);

        //Add Copies
        $book = Book::find( $request->input('id') );
        $book->copies += $request->input('copies');
        $book->save();

        return redirect('/books')->with('success', 'Copies Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'book_title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'section' => 'required',
        ]);

        //Update Books
        $book = Book::find($request->input('id'));
        $book->book_title = $request->input('book_title');
        $book->author_id = $request->input('author');
        $book->genre_id = $request->input('genre');
        $book->section_id = $request->input('section');
        $book->save();

        return redirect('/books')->with('success', 'Book Edited!');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id); 
        return redirect('/books')->with('error', 'Book Deleted');
    }
}
