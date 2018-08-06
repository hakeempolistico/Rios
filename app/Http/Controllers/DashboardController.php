<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\IssuedBook;
use App\Member;
use Illuminate\Support\Facades\DB;
use Carbon;

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
            'booksWeeklyReport' => Book::where('created_at', '>=', Carbon::today()->subDays(7))->count('id'),
            'issuedWeeklyReport' => IssuedBook::where('created_at', '>=', Carbon::today()->subDays(7))
            ->where('status', 'issued')
            ->count('id'),
            'returnedWeeklyReport' => IssuedBook::where('created_at', '>=', Carbon::today()->subDays(7))
            ->where('status', 'returned')
            ->count('id'),
            'membersWeeklyReport' => Member::where('created_at', '>=', Carbon::today()->subDays(7))->count('id'),
            'lastMembers' => Member::orderBy('created_at', 'desc')->take(5)->get(), 
            'lastBooks' => DB::table('books')
            ->select('books.book_title as title', 'authors.author_name as author')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->take(5)
            ->orderBy('books.created_at', 'desc')
            ->get(),
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
