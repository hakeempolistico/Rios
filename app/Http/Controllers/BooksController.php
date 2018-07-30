<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Book;
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
        $authors = [
            'Article' => 'Artikler lest', 
            'Comment' => 'Antall kommentarer', 
            'Thumb' => 'Antall "bli med"', 
            'View' => 'Tid på døgnet'
        ]; 
        $data = array(
            'title' => 'Books',
            'authors' => $authors,
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
        //
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
