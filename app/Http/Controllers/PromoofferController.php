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

class PromoofferController extends Controller
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
     * Show the Promo Offer section.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$Role_id = Auth::user()->role_id;
		$userId = Auth::user()->id;
		if($Role_id==3 || $Role_id==2){ 
		     $promooffer = Standardoffer::where('offertype','promo')->where('user_id',$userId)->get();
			 $countoffer = count($promooffer);
		}
		else if($Role_id==1)
		{
			$promooffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('standardoffers.offertype','promo')->get();
			$countoffer = count($promooffer);
		}
		return View::make('promooffer.index',compact('promooffer','countoffer'))
            ->with('promooffer', $promooffer);
    }
	/**
     * View the Promo Offer section details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$promooffer = Standardoffer::find($id);
		$interestreate = Interestrate::where('promooffer_id',$id)->get();
		return View::make('promooffer.view',compact('promooffer','interestreate'));
    }
	/**
     * Show the form for creating a Promo offer.
     *
     * @return Response
     */
    public function create()
    {
		$definition_lists  = Definition::select('id','name','installmenttenures')->get();
		 return View::make('promooffer.create')
            ->with('definition_lists', $definition_lists);
    }
	/**
     * Store a Promo offer resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
		$input = $request->all();
        $rules = array(
            'offertitle'  					=> 'required',
            'minimumtransactionamount'     	=> 'required|numeric',
			'processingfee'  				=> 'required|numeric',
			'transactionvalue'  			=> 'required|numeric',
			'installmentnumber'  			=> 'required|numeric',
			'terms'      					=> 'required|MAX:100',

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
            return Redirect::to('promooffer/create')
                ->withErrors($validator);
        } else {
            // store
			$authorid = Auth::user()->id;
			$interestrate = $input['interestrate'];
			$interestamount = $input['interestamount'];
			$arrayRes = array_combine($interestrate,$interestamount);
			if(isset($input['applicableto']))
			{
				$applicableto = implode(',',$input['applicableto']);
			}
			else
			{
				$applicableto = '';
			}
            $promooffer = new Standardoffer;
            $promooffer->offertitle     	= $input['offertitle'];
            $promooffer->offerref     		= $input['offerref'];
            $promooffer->definition_id 		= $applicableto;
			$promooffer->effectivedate 		= $input['effectivedate'];
			$promooffer->effectivetime 		= $input['effectivetime'];
			$promooffer->enddate 			= $input['offerdate'];
			$promooffer->endtime 			= $input['offertime'];
			$promooffer->vendors 			= $vendor;
			$promooffer->transactionamount 	= $input['minimumtransactionamount'];
			$promooffer->processingfees 	= $input['processingfee'];
			$promooffer->transactionvalue 	= $input['transactionvalue'];
			$promooffer->installmentnumber 	= $input['installmentnumber'];
			$promooffer->offertype 		= 'promo';
			$promooffer->termscondition 	= $input['terms'];
			$promooffer->status 			= $input['status'];
			$promooffer->user_id 			= $authorid;
            $promooffer->save();
			
			foreach($arrayRes as $interestkey => $interRes)
			{
				$interestreate = new Interestrate;
				$interestreate->promooffer_id     = $promooffer->id;
				$interestreate->interestrate     	= $interestkey;
				$interestreate->interestamount     	= $interRes;
				$interestreate->save();
			}

            // redirect
            Session::flash('message', 'Successfully created Offer');
            return Redirect::to('promooffer');
        }
    }
	/**
     * Show the Promo Offer for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $promooffer = Standardoffer::find($id);
		$definition_lists  = Definition::select('id','name')->get();
		$interestrate = Interestrate::select('interestrate','interestamount')->where('promooffer_id',$id)->get();
        // show the edit form and pass the nerd
        return View::make('promooffer.edit',compact('promooffer','definition_lists','interestrate'));
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
            'offertitle'  					=> 'required',
            'minimumtransactionamount'     	=> 'required|numeric',
			'processingfee'  				=> 'required|numeric',
			'transactionvalue'  			=> 'required|numeric',
			'installmentnumber'  			=> 'required|numeric',
			'terms'      					=> 'required|MAX:100',
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
            return Redirect::to('promooffer/' . $id . '/edit')
                ->withErrors($validator);
        }else {
			$authorid = Auth::user()->id;
			$promooffer = Standardoffer::find($id);
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
            $promooffer->offertitle     	= $input['offertitle'];
            $promooffer->offerref     		= $input['offerref'];
            $promooffer->definition_id 		= $applicableto;
			$promooffer->effectivedate 		= $input['effectivedate'];
			$promooffer->effectivetime 		= $input['effectivetime'];
			$promooffer->enddate 			= $input['offerdate'];
			$promooffer->endtime 			= $input['offertime'];
			$promooffer->vendors 			= $vendor;
			$promooffer->transactionamount 	= $input['minimumtransactionamount'];
			$promooffer->processingfees 	= $input['processingfee'];
			$promooffer->transactionvalue 	= $input['transactionvalue'];
			$promooffer->installmentnumber 	= $input['installmentnumber'];
			$promooffer->termscondition 	= $input['terms'];
			$promooffer->status 			= $input['status'];
			$promooffer->user_id 			= $authorid;
            $promooffer->save();
			
			$interstrate = Interestrate::where('promooffer_id',$id)->delete();
			foreach($arrayRes as $interestkey => $interRes)
			{
				$interestreate = new Interestrate;
				$interestreate->promooffer_id     	= $promooffer->id;
				$interestreate->interestrate     	= $interestkey;
				$interestreate->interestamount     	= $interRes;
				$interestreate->save();
			}
			
            Session::flash('message', 'Successfully updated Offer');
            return Redirect::to('promooffer/' . $id . '/edit');
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
        $promooffer = Standardoffer::find($id);
        $promooffer->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the offer');
        return Redirect::to('promooffer');
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
			$promooffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','1')->where('standardoffers.offertype','promo')->get();
			$countoffer = count($promooffer);
			return View::make('promooffer.index',compact('promooffer','countoffer'));
		}
		elseif($role_id==2)
		{
			$promooffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','2')->where('standardoffers.offertype','promo')->get();
			$countoffer = count($promooffer);
			return View::make('promooffer.index',compact('promooffer','countoffer'));
		}
		elseif($role_id==3)
		{
			$promooffer = DB::table('standardoffers')->join('users', 'standardoffers.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('standardoffers.*','roles.name')->where('roles.id','3')->where('standardoffers.offertype','promo')->get();
			$countoffer = count($promooffer);
			return View::make('promooffer.index',compact('promooffer','countoffer'));
		}
		else
		{
			 return Redirect::to('promooffer');	
		}
    }

}
