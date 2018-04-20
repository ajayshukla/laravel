<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use App\User;

use Session;

use View;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
     * Show the User section.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		$Role_id = Auth::user()->role_id;
		if($Role_id==3){ 
		     // ACL Condition for logged-in user/admin for accessing the functionality
		 	 abort(403, 'Access denied You are not authorized to access this page');
		}
		if($Role_id==1)
		{
			$user = User::with('Role')->whereRaw('role_id!=1')->get();	
		}
		else if($Role_id==2)
		{
			$user = User::with('Role')->whereRaw('role_id!=1 AND role_id!=2')->get();		
		}
		return View::make('user.index',compact('user','Role_id'));
    }
	/**
     * Change the User Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeRole(Request $request,$id)
    {	
		$input = $request->all();
		$user = User::find($id);
		$user->role_id	= $input['role_status'];;
        $user->save();
		Session::flash('message', 'Successfully updated Role');
        return Redirect::to('user');
    }
	/**
     * View the User Profile details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user = User::with('Role')->where('id',$id)->get();
		$user_id = $id;
		// show the view and pass the record to it
        return View::make('user.view',compact('user','user_id'));
    }
	/**
     * Show the Profile for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
		$user_id = $id;
        // show the edit form and pass the nerd
        return View::make('user.edit',compact('user','user_id'));
    }
	/**
     * Update the profile resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
		$input = $request->all();
		$rules = array(
            'organization' => 'required',
			'mailingaddress' => 'required',
            'email' => 'required|email|max:255',
			'firstname' => 'required',
			'lastname' => 'required',
			'designation' => 'required',
			'phonenumber' => 'required|numeric|MIN:10',

        );
		$validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/edit/' . $id)
                ->withErrors($validator);
        }else {
            $user = User::find($id);
            $user->organization     	= $input['organization'];
            $user->mailingaddress   	= $input['mailingaddress'];
            $user->ntn 					= $input['ntn'];
			$user->firstname 			= $input['firstname'];
			$user->lastname 			= $input['lastname'];
			$user->designation 			= $input['designation'];
			$user->phonenumber 			= $input['phonenumber'];
			$user->email 				= $input['email'];
            $user->save();

            Session::flash('message', 'Successfully updated Profile');
            return Redirect::to('user/edit/' . $id);
        } 
    }
	/**
     * Change the User Password.
     *
     * @param  int  $id
     * @return Response
     */
    public function changepassword($id)
    {
		$user_id = $id;
        // show the edit form and pass the nerd
        return View::make('user.changepassword',compact('user_id'));
    }
	/**
     * Update the User Password.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request,$id)
    {	
		$input = $request->all();
		$rules = array(
            'password' => 'required|min:6|confirmed',
			'password_confirmation' => 'required',
        );
		$validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/changepassword/' . $id)
                ->withErrors($validator);
        }else {
		$user = User::find($id);
		$user->password	=  bcrypt($input['password_confirmation']);
        $user->save();
		Session::flash('message', 'Successfully updated password');
        return Redirect::to('user/changepassword/' . $id);
		}
    }
}
