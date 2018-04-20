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

use App\Report;

class ReportController extends Controller
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
     * Show the report section.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$Role_id = Auth::user()->role_id;
		$userId = Auth::user()->id;
		if($Role_id==3 || $Role_id==2){ 
		     $report = Report::where('user_id',$userId)->get();
			 $countreport = count($report);
		}
		else if($Role_id==1)
		{
			$report = DB::table('reports')->join('users', 'reports.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('reports.*','roles.name')->get();
			$countreport = count($report);
		}
		return View::make('report/index',compact('report','countreport'));
    }
	/**
     * View the report section details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$report = Report::find($id);
		// show the view and pass the record to it
        return View::make('report.view')
            ->with('report', $report);
    }
	/**
     * Show the form for creating a new report.
     *
     * @return Response
     */
    public function create()
    {
        return view('report.create');
    }
	/**
     * Store a report resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
		$input = $request->all();
        $rules = array(
            'holdernaem'  			=> 'required',
            'cardno'      			=> 'required|numeric|MIN:16',
            'transactionid'  		=> 'required',
			'transactionamount'  	=> 'required|numeric',
			'installmenttenure'  	=> 'required|numeric',
			'interestrate'  		=> 'required|numeric',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('report/create')
                ->withErrors($validator);
        } else {
            // store
			$authorid = Auth::user()->id;
            $report = new Report;
            $report->cardholdername     = $input['holdernaem'];
            $report->cardno     		= $input['cardno'];
            $report->transactionid 		= $input['transactionid'];
			$report->date 				= $input['reportdate'];
			$report->transactionamount 	= $input['transactionamount'];
			$report->installmenttenure 	= $input['installmenttenure'];
			$report->interestrate 		= $input['interestrate'];
			$report->user_id 			= $authorid;
			$report->status 			= $input['status'];
            $report->save();

            // redirect
            Session::flash('message', 'Successfully created Report');
            return Redirect::to('report');
        }
    }
	 /**
     * Show the Report for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $report = Report::find($id);
        // show the edit form and pass the nerd
        return View::make('report.edit')
            ->with('report', $report);
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
            'holdernaem'  			=> 'required',
            'cardno'      			=> 'required|numeric|MIN:16',
            'transactionid'  		=> 'required',
			'transactionamount'  	=> 'required|numeric',
			'installmenttenure'  	=> 'required|numeric',
			'interestrate'  		=> 'required|numeric',

        );
		$validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('report/' . $id . '/edit')
                ->withErrors($validator);
        }else {
            $report = Report::find($id);
			$authorid = Auth::user()->id;
            $report->cardholdername     = $input['holdernaem'];
            $report->cardno     		= $input['cardno'];
            $report->transactionid 		= $input['transactionid'];
			$report->date 				= $input['reportdate'];
			$report->transactionamount 	= $input['transactionamount'];
			$report->installmenttenure 	= $input['installmenttenure'];
			$report->interestrate 		= $input['interestrate'];
			$report->user_id 			= $authorid;
			$report->status 			= $input['status'];
            $report->save();

            Session::flash('message', 'Successfully updated Report');
            return Redirect::to('report/' . $id . '/edit');
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
        $report = Report::find($id);
        $report->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Report');
        return Redirect::to('report');
    }
	/**
     * Filter Report By User Role
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
			$report = DB::table('reports')->join('users', 'reports.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('reports.*','roles.name')->where('roles.id','1')->get();
			$countreport = count($report);
			return View::make('report.index',compact('report','countreport'));
		}
		elseif($role_id==2)
		{
			$report = DB::table('reports')->join('users', 'reports.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('reports.*','roles.name')->where('roles.id','2')->get();
			$countreport = count($report);
			return View::make('report.index',compact('report','countreport'));
		}
		elseif($role_id==3)
		{
			$report = DB::table('reports')->join('users', 'reports.user_id', '=', 'users.id')->join('roles', 'users.role_id', '=', 'roles.id')->select('reports.*','roles.name')->where('roles.id','3')->get();
			$countreport = count($report);
			return View::make('report.index',compact('report','countreport'));
		}
		else
		{
			 return Redirect::to('report');	
		}
    }
}
