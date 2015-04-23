<?php


class SessionController extends BaseController {

	public function __construct()
	{
		/* $this->beforeFilter('csrf', array('on' => 'post'));*/
	}

	public function viewlogin()
	{
		if(Auth::check()){
			return Redirect::route('dashboard');
		}
		 return View::make('sessions.login');

	}
	public function login()
	{
        $creds = Input::only('username','password');
        if(Auth::attempt( $creds ))return getHomeUrl();
		return Redirect::back()->with(['message'=>'Opps! Invalid Username or Password']);
	}
	public function logout($value='')
	{
		session_start();$_SESSION['isLogin']=false;

		Auth::logout();
		return Redirect::route('index');
	}

}