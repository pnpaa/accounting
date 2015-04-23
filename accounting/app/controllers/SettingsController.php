<?php

class SettingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $transaction;
	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->transaction=new Transactions();

    }
	public function index()
	{
		return View::make('settings.index')->with('settings', $this->transaction->whereIs_archived(0)->whereType(1)->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('settings.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		  $privatekey = "6Ldk3wETAAAAAIs0nLlbzcXF9peUBarqhOuUAls0";
          $resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],Input::get('recaptcha_challenge_field'),Input::get('recaptcha_response_field'));
    	  if (!$resp->is_valid) {
				    // What happens when the CAPTCHA was entered incorrectly
				   return  Redirect::route('settings.index')->with(['error'=>'Captcha Mismatched']);
				  }
        $input=Input::only('_token','transaction_amount','transaction_purpose');
        $input['type']=1;
        $input['uniq_id']=uniqid();
        $input['transaction_setter']=Auth::id();
        $this->transaction->create($input);
		return  Redirect::route('settings.index')->with(['info'=>'Successfully Added','data'=>$input]);;
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

       $input=Input::only('un_archived','id','archived');

       $transaction = $this->transaction->find((int)$input['id']);
        if ($input['archived']) {
           Data::update($transaction,['is_archived'=>1]);
        }
        else if ($input['un_archived']) {
           Data::update($transaction,['is_archived'=>0]);
       }else{
         Data::update( $transaction,array(
        	    'transaction_purpose' => Input::get('transaction_purpose'),
             'transaction_amount'  => Input::get('transaction_amount')
         ));
       }
        return Response::make(['success'=>'ok'],200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id=0)
	{
	    return Response::make($this->transaction->find(Input::get('id'))->delete()?'success':'fail',200);
	}


}
