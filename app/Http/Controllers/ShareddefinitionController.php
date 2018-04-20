<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use Session;

use View;

use App\Definition;

use App\Tenures;

class ShareddefinitionController extends Controller
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
     * Show the Shared Definition section.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$definition = Definition::all();
		$countdefinition = count($definition);
		return View::make('shareddefinition.index',compact('definition','countdefinition'));
    }
	/**
     * View the Shareddefinition section details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$definition = Definition::find($id);
		// show the view and pass the record to it
        return View::make('shareddefinition.view')
            ->with('definition', $definition);
    }
	/**
     * Show the form for creating a new definition.
     *
     * @return Response
     */
    public function create()
    {
		return view('shareddefinition.create');
    }
	/**
     * Store a shared definition in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
		$input = $request->all();
		$cardidentifiers = implode(',',$input['cardidentifiers']);
		$rules = array(
            'cardname'      		=> 'required',
			'cardtype'      		=> 'required',
            'cardidentifiers' 		=> 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('shareddefinition/create')
                ->withErrors($validator);
        } else {
            // store
			$authorid = Auth::user()->id;
            $definition = new Definition;
            //$definition->installmenttenures     = $input['tenures'];
            $definition->name     				= $input['cardname'];
			$definition->cardtype     			= $input['cardtype'];
            $definition->cardidentifiers 		= $cardidentifiers;
			$definition->user_id 				= $authorid;
			$definition->status 				= $input['status'];
            $definition->save();

            // redirect
            Session::flash('message', 'Successfully created Definitions');
            return Redirect::to('shareddefinition');
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
        $definition = Definition::find($id);

		$cardidentifiers = explode(',',$definition['cardidentifiers']);
        // show the edit form and pass the nerd
        return View::make('shareddefinition.edit',compact('definition','cardidentifiers'));
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
		$cardidentifiers = implode(',',$input['cardidentifiers']);
		$rules = array(
            'cardtype'      		=> 'required',
            'cardidentifiers'  		=> 'required',
        );
		$validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('shareddefinition/' . $id . '/edit')
                ->withErrors($validator);
        }else {
			$authorid = Auth::user()->id;
            $definition = Definition::find($id);
            $definition->name     				= $input['cardname'];
            $definition->cardtype     			= $input['cardtype'];
            $definition->cardidentifiers 		= $cardidentifiers;
			$definition->user_id 				= $authorid;
			$definition->status 				= $input['status'];
            $definition->save();

            Session::flash('message', 'Successfully updated Definitions');
            return Redirect::to('shareddefinition/' . $id . '/edit');
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
        $definition = Definition::find($id);
        $definition->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Definitions');
        return Redirect::to('shareddefinition');
    }
	/**
     * Show the Tensures section.
     *
     * @return \Illuminate\Http\Response
     */
    public function tenures()
    {
		$tenures = Tenures::orderBy('id','ASC')->get();
		$counttenures = count($tenures);
		return View::make('tenure.index',compact('tenures','counttenures'));
    }
	/**
     * Show the form for creating a new tenures.
     *
     * @return Response
     */
    public function createtenures()
    {
		return view('tenure.create');
    }
	/**
     * Store a tenures in storage.
     *
     * @return Response
     */
    public function savetenures(Request $request)
    {
		$input = $request->all();
		$tenuresValue = $input['tenure'];
		$rules = array(
            'tenure'      		=> 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('/tenures/create')
                ->withErrors($validator);
        } else {
			//store
            foreach($tenuresValue as $tenureRes)
			{
				$getVal = Tenures::where('tenures',$tenureRes)->get();
				$countval = count($getVal);
				if($countval > 0)
				{
					Session::flash('message', 'You have already add '.$tenureRes.' value');
            		return Redirect::to('/tenures/create');	
				}
				else
				{
					$authorid = Auth::user()->id;
					$tenures = new Tenures;
					$tenures->tenures     			= $tenureRes;
					$tenures->user_id 				= $authorid;
					$tenures->save();
				}
			}
            // redirect
            Session::flash('message', 'Successfully created Tenures');
            return Redirect::to('/tenures');
        }
    }
	/**
     * Show the Tenures for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edittenures($id)
    {
        $tenures = Tenures::find($id);
        // show the edit form and pass the nerd
        return View::make('tenure.edit',compact('tenures'));
    }
	/**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updatetenures(Request $request,$id)
    {
		$input = $request->all();
		$rules = array(
             'tenure'      		=> 'required',
        );
		$validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/tenures/edittenures/'.$id.'')
                ->withErrors($validator);
        }else {
			$getVal = Tenures::where('tenures',$input['tenure'])->get();
			$countval = count($getVal);
			if($countval > 0)
			{
				Session::flash('message', 'You have already add '.$input['tenure'].' value');
				return Redirect::to('/tenures/create');	
			}
			else
			{
			
				$authorid = Auth::user()->id;
				$tenures = Tenures::find($id);
				$tenures->tenures     			= $input['tenure'];
				$tenures->user_id 				= $authorid;
				$tenures->save();
				
			}

            Session::flash('message', 'Successfully updated Tenures');
            return Redirect::to('/tenures/edittenures/'.$id.'');
        } 
    }
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deletetenures($id)
    {
        // delete
        $tenures = Tenures::find($id);
        $tenures->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Tenures');
        return Redirect::to('/tenures');
    }
}
