<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Registered Members',
            'members' => Member::all()
        );
        return view('pages.members')->with($data);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'sex' => 'required',
            'contact' => 'required',
            'cover_image' => 'image|nullable|max:1999|dimensions:ratio=1/1'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.png';
        }

        //Create Genre
        $member = new Member;
        $member->firstname = $request->input('firstname');
        $member->lastname = $request->input('lastname');
        $member->sex = $request->input('sex');
        $member->contact = $request->input('contact');
        $member->house_number = $request->input('house_number');
        $member->street = $request->input('street');
        $member->barangay = $request->input('barangay');
        $member->city = $request->input('city');
        $member->province = $request->input('province');
        $member->email = $request->input('email');
        $member->note = $request->input('note');
        $member->cover_image = $fileNameToStore;
        $member->save();

        return redirect('/members')->with('success', 'Member Created!');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'sex' => 'required',
            'contact' => 'required',
            'cover_image' => 'image|nullable|max:1999|dimensions:ratio=1/1'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 

        //Update Books
        $member = Member::find($request->input('id'));
        $member->firstname = $request->input('firstname');
        $member->lastname = $request->input('lastname');
        $member->sex = $request->input('sex');
        $member->contact = $request->input('contact');
        $member->house_number = $request->input('house_number');
        $member->street = $request->input('street');
        $member->barangay = $request->input('barangay');
        $member->city = $request->input('city');
        $member->province = $request->input('province');
        $member->email = $request->input('email');
        $member->note = $request->input('note');
        if($request->hasFile('cover_image')){
            $member->cover_image = $fileNameToStore;
        } 
        $member->save();

        return redirect('/members')->with('success', 'Member Updated!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id); 

        if($member->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$member->cover_image);
        }

        $member->delete();
        return redirect('/members')->with('error', 'Member Deleted');
    }

    public function getInfo(Request $request)
    {
        $info = Member::find($request['id']);
        return response()->json($info);
    }
}
