<?php

class DashController extends BaseController {

  protected $transaction;

  public function __construct( )
	 {
      $this->transaction=new Transactions();
	 }
  public function getIndex($value='')
	{
		return View::make('page');
	}
	public function index($value='')
	{
		return View::make('page');

	}
	public function analysis(){
	  return View::make('analysis.index');
	}
	public function lock(){
	  return View::make('sessions.lock-screen');
	}
	public function frontPage($value='')
	{
     return View::make('front-page');
	}

	public function timeline(){
	  return View::make('overview.timeline')->with('transactions', $this->transaction->orderBy ('id','desc')->belongsToUser(Auth::id())->get());
	}
	public function forum($value='')
	{
		 return Redirect::to('http://forum.pnpaa.com/');
	}
    public function data($value='')
    {
       return Response::json(['tasks'=>Stack::tasks(),
        	                   'updates'=>Stack::updates(),
        	                   'counter'=>Stack::counter(),
        	                   'batches' => Stack::batches(),
        	                   'committees'=>Stack::committees(),
        	                   'user_role'=>(Auth::user()->role == 1 )?true:false,
        	                   'batch_percentage'=>Stack::batchPercentage()
        	                   ],200);
    }
	 public function transactions($value='')
	 {
	 	 return Response::json( $this->transaction->whereIs_archived(0)->whereType(1)->get(),200);
	 }
  public function contactUs($value='')
	 {
       $input=Input::only('name','email','subject','message');
       $exist=Inquiry::whereEmail(Input::get('email'))->count();
        $input['type']=0;
        if ($exist > 0) {
          $input['type']=1;
        }
       Inquiry::create($input);
       return Response::make(['success'=>'ok'],200);
	 }
	 public function forgotPassword($value='')
	 {
	 	 /*   $input=array('name'=>'user',
	 	    	            'email'=>Input::get('email') ,
	 	    	            'subject'=>' Requesting for password change',
	 	    	            'message'=>' Requesting for password change');
	 	    $valid=Validator::make($input,['email' =>'required|email']);
	 	    if($valid->fails())return Redirect::back()->with('message','Incorrect Email');
       Inquiry::create($input);
       return Redirect::back()->with('request_message','Thank you! A reset password link has been successfully sent into your account. Please check your email address to reset your password.');
*/
        $user=User::whereEmail(Input::get('email'))->first();
       if($user == null)return Redirect::back()->with('no-data',"No account associated with this email '".Input::get('email') ."'");
         // return URL::to('dashboard/check-question',$user->id);
        return Redirect::to('check-question' )->with('user',$user);

      // Data::mailChangePassRequest(Input::get('email'));
     //  return Redirect::back();
 }
    public function checkQuestion($id=0)
    {
      $user=Session::get('user');
         Session::set('cuser',$user);
      if($user == null) Redirect::to('/login');
      return View::make('sessions.questions')->with('user',$user);
   }
   public function verifyQuestion($value='')
   {
      $input= Input::only('question_1','question_2','email');
      $user=User::whereEmail($input['email'])->whereQuestion_1_key($input['question_1'])->whereQuestion_2_key($input['question_2'])->first();
      if ( $user <> null ) return View::make('sessions.new-pass')->with('id',$user->id);
      return Redirect::back()->with('user',Session::get('cuser'))->with('message','Mismatch Data');
   }
   public function newPass($value='')
   {
     $input=Input::only('password','id');
     $user= User::find( (int) $input['id']);
     $user->password=Hash::make($input['password']);
     $user->save();
     //email to user the new login details
     return Redirect::to('/login');

    }
	 public function getUsersNotPaid($value='')
	 {
	 	 return View::make('users.users-not-paid')->with('unpaid_users',Stack::usersNotPaid());
	 }

  public function getAsasClear($id)
  {
  	  Data::clear($id);
			return Redirect::route('dashboard');
  }
 public function getUserFields($value='')
 {
    return User::all();
 }


}