<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use DB;

use Session;

use View;

use App\Definition;

use App\Standardoffer;

use App\Interestrate;

use App\User;

class StandardofferController extends Controller
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
     * Show the Standard Offer section.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		/*$authorid = Auth::user()->id;
		
		$checkPermission = DB::table('permission_roles')->join('permissions', 'permission_roles.permission_id', '=', 'permissions.id')
    	->select('permission_roles.role_id')->where('permissions.name','standardoffer_index')->get();
		
		if($checkPermission[0]->role_id!=$authorid){ 
		     // ACL Condition for logged-in user/admin for accessing the functionality
		 	 abort(403, 'Access denied You are not authorized to access this page');
		}*/
		$Role_id = Auth::user()->role_id;
		$userId = Auth::user()->id;
		if($Role_id==3 || $Role_id==2){ 
		     $standardoffer = Standardoffer::where('offertype','standard')->where('user_id',$userId)->get();
			 $countoffer = count($standardoffer);
		}
		else if($Role_id==1)
		{
			$standardoffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('standardoffers.offertype','standard')->get();
			$countoffer = count($standardoffer);
		}
		return View::make('standardoffer.index',compact('standardoffer','countoffer'));
    }
	/**
     * View the Standard Offer section details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$standardoffer = Standardoffer::find($id);
		$interestreate = Interestrate::where('standardoffer_id',$id)->get();
		return View::make('standardoffer.view',compact('standardoffer','interestreate'));
            
    }
	/**
     * Show the form for creating a new offer.
     *
     * @return Response
     */
    public function create()
    {
		$definition_lists  = Definition::select('id','name','installmenttenures')->get();
		 return View::make('standardoffer.create')
            ->with('definition_lists', $definition_lists);
    }
	/**
     * Store a Standard offer resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
		$input = $request->all();
        $rules = array(
            'offertitle'  			=> 'required',
            'transactionvalue'      => 'required|numeric',
			'processingfee'  		=> 'required|numeric',
			'terms'      			=> 'required|MAX:100',

        );
        $validator = Validator::make(Input::all(), $rules);
		if(isset($input['vendor']))
		{
			$vendor = $input['vendor'];
		}
		else
		{
			$vendor = 0;
		}
        // process the login
        if ($validator->fails()) {
            return Redirect::to('standardoffer/create')
                ->withErrors($validator);
        } else {
            // store
			$authorid = Auth::user()->id;
			$interestrate = $input['interestrate'];
			$interestamount = $input['interestamount'];
			if(isset($input['applicableto']))
			{
				$applicableto = implode(',',$input['applicableto']);
			}
			else
			{
				$applicableto = '';
			}
			$arrayRes = array_combine($interestrate,$interestamount);
            $standardoffer = new Standardoffer;
            $standardoffer->offertitle     		= $input['offertitle'];
            $standardoffer->offerref     		= $input['offerref'];
            $standardoffer->definition_id 		= $applicableto;
			$standardoffer->effectivedate 		= $input['effectivedate'];
			$standardoffer->effectivetime 		= $input['effectivetime'];
			$standardoffer->enddate 			= $input['offerdate'];
			$standardoffer->endtime 			= $input['offertime'];
			$standardoffer->vendors 			= $vendor;
			$standardoffer->transactionamount 	= $input['minimumtransactionvalue'];
			$standardoffer->processingfees 		= $input['processingfee'];
			$standardoffer->offertype 			= 'standard';
			$standardoffer->termscondition 		= $input['terms'];
			$standardoffer->transactionvalue 	= $input['transactionvalue'];
			$standardoffer->installmentnumber 	= $input['installmentnumber'];
			$standardoffer->status 				= $input['status'];
			$standardoffer->user_id 			= $authorid;
            $standardoffer->save();
		
			foreach($arrayRes as $interestkey => $interRes)
			{
				$interestreate = new Interestrate;
				$interestreate->standardoffer_id     = $standardoffer->id;
				$interestreate->interestrate     	= $interestkey;
				$interestreate->interestamount     	= $interRes;
				$interestreate->save();
			}

            // redirect
            Session::flash('message', 'Successfully created Offer');
            return Redirect::to('standardoffer');
        }
    }
	/**
     * Show the Standard Offer for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $standardoffer = Standardoffer::find($id);
		/*$getdefinitions = explode(',',$standardoffer['definition_id']);
		foreach($getdefinitions as $getdefinitionRes)
		{
			$definitionRes  = Definition::select('id','name')->where('id',$getdefinitionRes)->get();
		}*/ 
		$interestrate = Interestrate::select('interestrate','interestamount')->where('standardoffer_id',$id)->get();
		$definition_lists  = Definition::select('id','name')->get();
        // show the edit form and pass the nerd
        return View::make('standardoffer.edit',compact('standardoffer','definition_lists','interestrate'));
    }
	/**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
		$input = $request->all();
		$rules = array(
            'offertitle'  			=> 'required',
            'transactionvalue'      => 'required|numeric',
			'processingfee'  		=> 'required|numeric',
			'terms'      			=> 'required|MAX:100',
        );
		$validator = Validator::make(Input::all(), $rules);
		if(isset($input['vendor']))
		{
			$vendor = $input['vendor'];
		}
		else
		{
			$vendor = 0;
		}
        if ($validator->fails()) {
            return Redirect::to('report/' . $id . '/edit')
                ->withErrors($validator);
        }else {
			$authorid = Auth::user()->id;
            $standardoffer = Standardoffer::find($id);
			$interestrate = $input['interestrate'];
			$interestamount = $input['interestamount'];
			if(isset($input['applicableto']))
			{
				$applicableto = implode(',',$input['applicableto']);
			}
			else
			{
				$applicableto = '';
			}
			$arrayRes = array_combine($interestrate,$interestamount);
            $standardoffer->offertitle     		= $input['offertitle'];
            $standardoffer->offerref     		= $input['offerref'];
            $standardoffer->definition_id 		= $applicableto;
			$standardoffer->effectivedate 		= $input['effectivedate'];
			$standardoffer->effectivetime 		= $input['effectivetime'];
			$standardoffer->enddate 			= $input['offerdate'];
			$standardoffer->endtime 			= $input['offertime'];
			$standardoffer->vendors 			= $vendor;
			$standardoffer->transactionamount 	= $input['minimumtransactionvalue'];
			$standardoffer->processingfees 		= $input['processingfee'];
			$standardoffer->offertype 			= 'standard';
			$standardoffer->termscondition 		= $input['terms'];
			$standardoffer->transactionvalue 	= $input['transactionvalue'];
			$standardoffer->installmentnumber 	= $input['installmentnumber'];
			$standardoffer->status 				= $input['status'];
			$standardoffer->user_id 			= $authorid;
            $standardoffer->save();
			
			$interstrate = Interestrate::where('standardoffer_id',$id)->delete();
			foreach($arrayRes as $interestkey => $interRes)
			{
				$interestreate = new Interestrate;
				$interestreate->standardoffer_id     = $standardoffer->id;
				$interestreate->interestrate     	= $interestkey;
				$interestreate->interestamount     	= $interRes;
				$interestreate->save();
			}

            Session::flash('message', 'Successfully updated Offer');
            return Redirect::to('standardoffer/' . $id . '/edit');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $standardoffer = Standardoffer::find($id);
        $standardoffer->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the offer');
        return Redirect::to('standardoffer');
    }
	/**
     * Calculate The Interest Rate.
     *
     * @param  int  $id
     * @return Response
     */
	 public function getInterestRate(Request $request)
    {
		$input = $request->all();
		$transactionvalue = $input['transactionvalue'];
		$interestrate = $input['interestrate'];
		$installmentnumber = $input['installmentnumber'];
        $rate1 = ($transactionvalue * $interestrate/12);
		$rate2 = pow((1+$interestrate/12),$installmentnumber);
		$rate3 = pow((1+$interestrate/12),$installmentnumber)-1;
		$EMI = $rate1 *  $rate2 /  $rate3;
        return $EMI;
    }
	/**
     * Calculate The Paid Interest.
     *
     * @param  int  $id
     * @return Response
     */
	 public function getPaidInterest(Request $request)
    {
		$input = $request->all();
		$transactionvalue = $input['transactionvalue'];
		$interestrate = $input['interestrate'];
		$installmentnumber = $input['installmentnumber'];
        $rate1 = ($transactionvalue * $interestrate/12);
		$rate2 = pow((1+$interestrate/12),$installmentnumber);
		$rate3 = pow((1+$interestrate/12),$installmentnumber)-1;
		$EMI = $rate1 *  $rate2 /  $rate3;
		$PaidInterest = $EMI*$installmentnumber-$transactionvalue;
        return $PaidInterest;
    }
	/**
     * Calculate Total cost.
     *
     * @param  int  $id
     * @return Response
     */
	 public function getTotalCost(Request $request)
    {
		$input = $request->all();
		$transactionvalue = $input['transactionvalue'];
		$interestrate = $input['interestrate'];
		$installmentnumber = $input['installmentnumber'];
		$processingfees = $input['processingfees'];
        $rate1 = ($transactionvalue * $interestrate/12);
		$rate2 = pow((1+$interestrate/12),$installmentnumber);
		$rate3 = pow((1+$interestrate/12),$installmentnumber)-1;
		$EMI = $rate1 *  $rate2 /  $rate3;
		$PaidInterest = $EMI*$installmentnumber-$transactionvalue;
		$Totalcost = $EMI+$transactionvalue+$PaidInterest+$processingfees;
        return $Totalcost;
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
			$standardoffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','1')->where('standardoffers.offertype','standard')->get();
			$countoffer = count($standardoffer);
			return View::make('standardoffer.index',compact('standardoffer','countoffer'));
		}
		elseif($role_id==2)
		{
			$standardoffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','2')->where('standardoffers.offertype','standard')->get();
			$countoffer = count($standardoffer);
			return View::make('standardoffer.index',compact('standardoffer','countoffer'));
		}
		elseif($role_id==3)
		{
			$standardoffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','3')->where('standardoffers.offertype','standard')->get();
			$countoffer = count($standardoffer);
			return View::make('standardoffer.index',compact('standardoffer','countoffer'));
		}
		else
		{
			 return Redirect::to('standardoffer');	
		}
    }
}
