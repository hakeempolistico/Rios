<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\IssuedBook;
use App\Book;
use App\Member;
use Illuminate\Support\Facades\DB;


class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Book Issues',
            'books' => Book::all(),
            'members' => Member::all(),
            'issues' => DB::table('issued_books')
            ->select(
                'issued_books.id as id', 
                'issued_books.created_at as created_at',
                'books.book_title as book_title',
                'members.firstname as firstname',
                'members.lastname as lastname'
            )
            ->where('status', 'issued')
            ->join('books', 'books.id', '=', 'issued_books.book_id')
            ->join('members', 'members.id', '=', 'issued_books.member_id')
            ->get()
        );
        return view('pages.issues')->with($data);
    }

    public function returned()
    {
        $data = array(
            'title' => 'Book Issues',
            'books' => Book::all(),
            'members' => Member::all(),
            'issues' => DB::table('issued_books')
            ->select(
                'issued_books.id as id', 
                'issued_books.created_at as created_at',
                'issued_books.updated_at as updated_at',
                'books.book_title as book_title',
                'members.firstname as firstname',
                'members.lastname as lastname'
            )
            ->where('status', 'returned')
            ->orderBy('updated_at', 'DESC')
            ->join('books', 'books.id', '=', 'issued_books.book_id')
            ->join('members', 'members.id', '=', 'issued_books.member_id')
            ->get()
        );
        return view('pages.returned')->with($data);
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
            'book_title' => 'required',
            'member' => 'required',
        ]);


        //Check Copies
        $book = Book::whereId($request->input('book_title'))->first();
        if($book['copies'] == 0){
            return redirect('/issues')->with('error', 'Cannot Issue book. Book has no more copies!');
        }

        //Issue Book
        $issued_books = new IssuedBook;
        $issued_books->book_id = $request->input('book_title');
        $issued_books->member_id = $request->input('member');
        $issued_books->save();

        //Subtract Copies
        DB::table('books')->where('id', $request->input('book_title'))->decrement('copies');

        return redirect('/issues')->with('success', 'Book Issued!');
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
            'id' => 'required'
        ]);

        //Check Copies
        $issued = IssuedBook::whereId($request->input('id'))->first();

        //Add Copies
        DB::table('books')->where('id', $issued['book_id'])->increment('copies');

        //Update Books
        $issued_book = IssuedBook::find($request->input('id'));
        $issued_book->status = 'returned';
        $issued_book->save();

        return redirect('/issues')->with('success', 'Book Returned!');    
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
