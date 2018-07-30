<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Book;
use App\Author;
use App\Genre;
use App\Section;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //AUTHORS
        $selectAuthors = [];
        foreach (Author::all() as $author) {
            $selectAuthors[$author->id] = $author->author_name;
        } 

        //GENRE
        $selectGenres = [];
        foreach (Genre::all() as $genre) {
            $selectGenres[$genre->id] = $genre->genre_name;
        } 

        //SECTION
        $selectSections = [];
        foreach (Section::all() as $section) {
            $selectSections[$section->id] = $section->section_name;
        } 

        $data = array(
            'title' => 'Books',
            'authors' => $selectAuthors,
            'genres' => $selectGenres,
            'sections' => $selectSections,
            'books' => DB::table('books')
            ->select('books.id as id', 
                'books.book_title as book_title', 
                'authors.author_name as author_name', 
                'genres.genre_name as genre_name', 
                'sections.section_name as section_name'
            )
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
            'author_id' => 'required',
            'genre_id' => 'required',
            'section_id' => 'required',
        ]);

        //Create Genre
        $book = new Book;
        $book->book_title = $request->input('book_title');
        $book->author_id = $request->input('author_id');
        $book->genre_id = $request->input('genre_id');
        $book->section_id = $request->input('section_id');
        $book->save();

        return redirect('/books')->with('success', 'Book Created!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
