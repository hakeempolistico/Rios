<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Authors',
            'authors' => Author::all()
        );
        return view('pages.authors')->with($data);
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
            'name' => 'required|unique:authors,name'
        ]);

        //Create Genre
        $author = new Author;
        $author->name = $request->input('name');
        $author->save();

        return redirect('/authors')->with('success', 'Author Created!');
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
            'genre' => 'required|unique:genres,genre_name'
        ]);

        //Update Genre
        $genre = Genre::find($request->input('id'));
        $genre->genre_name = $request->input('genre');
        $genre->save();

        return redirect('/genres')->with('success', 'Genre Edited!');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::destroy($id); 
        return redirect('/genres')->with('success', 'Item Has Been Delete');
    }

    public function soft_delete($id)
    {
        Genre::destroy($id); 
        return redirect('/genres')->with('success', 'Item Has Been Delete');
    }
}
