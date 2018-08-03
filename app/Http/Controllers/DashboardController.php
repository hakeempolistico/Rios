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
            'memberCount' => Member::count('id')
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
