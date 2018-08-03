<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\IssuedBook;
use App\Member;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'authorCount' => Author::count('id'),
            'bookCount' => Book::count('id'),
            'issuedCount' => IssuedBook::where('status','issued')->count('id'),
            'memberCount' => Member::count('id'),
            'fictionCount' => Book::where('section_id', 5)->count('id'),
            'circulationCount' => Book::where('section_id', 1)->count('id'),
            'periodicalCount' => Book::where('section_id', 2)->count('id'),
            'generalCount' => Book::where('section_id', 3)->count('id'),
            'childrenCount' => Book::where('section_id', 4)->count('id'),
        );
        return view('pages.dashboard')->with($data);
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

}
