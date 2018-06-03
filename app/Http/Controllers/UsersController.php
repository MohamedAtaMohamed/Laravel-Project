<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'   => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt('123456')
        ]);

        $profile = Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatars/1.jpeg'
        ]);


        Session::flash('success','created user and profile successfully');

        return redirect()->route('users');


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

    public function admin($id){

        $user = User::find($id);
        if ($user){

            $user->admin = 1;
            Session::flash('danger',"Changed permissions  user to admin successfully");
            $user->save();

            return redirect()->back();
        }
        Session::flash('danger',"Don't play in the URL :D");
        return redirect()->back();
    }

    public function notadmin($id){

        $user = User::find($id);
        if ($user){

            $user->admin = 0;
            Session::flash('danger',"Changed permissions  admin to user successfully");
            $user->save();

            return redirect()->back();
        }
        Session::flash('danger',"Don't play in the URL :D");
        return redirect()->back();
    }
}
