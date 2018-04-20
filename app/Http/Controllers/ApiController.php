<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\auth;

use Illuminate\Support\Facades\Redirect;

use App\Apiuser;

use App\Standardoffer;

use App\Report;

use Session;

class ApiController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api');
    }
	/**
     * Show Dashboard instance.
     *
     * @return void
     */
    public function dashboard()
    {
		 return view('dashboard');
    }
	/**
     * Show App From instance.
     *
     * @return void
     */
    public function appForm()
    {
		$user_id = 4;
		$appuser = Apiuser::where('user_id',$user_id)->get();
		//$userId =  Auth::guard('api')->user();
		$countApp = count($appuser);
		if($countApp > 0)
		{
			Session::flash('message', 'You are already created an App');
			return Redirect::to('/api/dashboard');
		}
		else
		{	
			return view('createapp');
		}
	}
	/**
     * Create App key and Secret Key instance.
     *
     * @return void
     */
    public function generateKeys(Request $request)
    {
		$input = $request->all();
		$input['user_id'] = 4;
		$apiuser = Apiuser::select('appid')->max('appid');
		$input['appid'] = $apiuser+1;
		$input['appsecret'] = substr( md5(rand()), 0, 15);
		$apiuser = new Apiuser;
		$apiuser->user_id    = $input['user_id'];
		$apiuser->appname    = $input['appname'];
		$apiuser->appid   	 = $input['appid'];
		$apiuser->appsecret  = $input['appsecret'];
		$apiuser->save();
        /*return response(array(
                'error' => false,
                'message' =>'Successfully Created APP',
               ),200);*/
		return redirect('/api/view'); 
    }
	
	/**
     * Show the App id.
     *
     * @return void
     */
    public function viewApp(Request $request)
    {
		$user_id = 4;
		$appuser = Apiuser::where('user_id',$user_id)->get();
        return view('view',compact('appuser'));
			   
			   
    }
	
	/**
     * Show the standard offer section.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStandardOffer()
    {
		$standardOffer = Standardoffer::where('offertype','standard')->get();
        return response(array(
                'error' => false,
                'products' => $standardOffer->toArray(),
               ),200);
    }
	/**
     * Show the promo offer section.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPromoOffer()
    {
		$promoOffer = Standardoffer::where('offertype','promo')->get();
        return response(array(
                'error' => false,
                'products' => $promoOffer->toArray(),
               ),200);
    }
	/**
     * Show the Report section.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReport()
    {
		$report = Report::all();
        return response(array(
                'error' => false,
                'products' => $report->toArray(),
               ),200);
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
}
