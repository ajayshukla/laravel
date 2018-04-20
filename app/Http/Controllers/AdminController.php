<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use DB;

use View;

use App\Mail\Ordershipped;

use Mail;	

use App\Definition;

use App\Standardoffer;

class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }
	
	/**
     * View the All offers details.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOffer()
    {
		$Role_id = Auth::user()->role_id;
		$userId = Auth::user()->id;
		if($Role_id==3 || $Role_id==2){ 
		     $offers = Standardoffer::where('user_id',$userId)->get();
			 $countoffer = count($offers);
		}
		else if($Role_id==1)
		{
			$offers = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->get();
			$countoffer = count($offers);
		}
        return View::make('offer',compact('offers','countoffer'));
    }
	
	/**
     * Logout.
     *
     * @return \Response
     */
    public function logout()
    {
        \Auth::logout();    
		return Redirect::to('login');  
        //return $this->redirect('admin.index');
    }
	/**
     * Filter Offers By User Role
     *
     * @param  int  $id
     * @return Response
     */
	 public function search(Request $request)
    {
		$input = $request->all();
		$role_id = $input['search'];
		if($role_id==1)
		{
			$offers = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','1')->get();
			$countoffer = count($offers);
			return View::make('offer',compact('offers','countoffer'));
		}
		elseif($role_id==2)
		{
			$offers = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','2')->get();
			$countoffer = count($offers);
			return View::make('offer',compact('offers','countoffer'));
		}
		elseif($role_id==3)
		{
			$offers = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','3')->get();
			$countoffer = count($offers);
			return View::make('offer',compact('offers','countoffer'));
		}
		else
		{
			 return Redirect::to('offers');	
		}
    }
}
