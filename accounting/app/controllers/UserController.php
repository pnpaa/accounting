<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $committee;
	protected $user;
	protected $role;
	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->committee=new Committee();
        $this->user=new User();
        $this->role=new Role();
    }

	public function index()
	{
		return View::make('users.index')->with('users',$this->user->whereIs_archived(0)->whereActivated(1)->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	   return View::make('users.create')->with('committee',$this->committee->whereIs_archived(0)->get())->with('roles', $this->role->all());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
      $input=Input::only('batch','committee','username','password','role','email','first_name','last_name','maidden_name','gender','birth_date','work','company_working','company_working_hours','company_working_address','permanent_address','current_address','phone_contact','skype_contact','facebook_contact','linked_contact','twitter_contact','google_contact','yahoo_contact','user_about','user_photo');
      $input['password']=Hash::make($input['password']);
      $input['role']= (int)$input['role'];
      $user= $this->user->create($input);
      return Redirect::route('users.index');
	}
 public function createBulk($value='')
    {
      return View::make('users.create-bulk')->with('roles',$this->role->all())->with('committees',$this->committee->all());
    }
	public function storeBulk($value='')
	{
   return    Stack::createBulkUser(Input::only('users_num','users_role','users_committee','users_batch'))? Redirect::route('users.index') : Redirect::back();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $user=$this->user->find($id);
		return View::make('users.user-profile')->with('user',$user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id=0)
	{

		   $input=Input::all();

		   $user=$this->user->find((int) Input::get('id'));
		   if(Input::get('personal_info')){
		        Data::update($user,array(
		                'first_name'       => $input['first_name'],
																		'last_name'        => $input['last_name'],
																		'maidden_name'     => $input['maidden_name'],
																		'current_address'  => $input['current_address'],
																		'permanent_address'=> $input['permanent_address'],
																		'gender'           => $input['gender'],
																		'email'           => $input['email'],
																		'user_about'       => $input['user_about'],
																		'birth_date'       => $input['birth_date']
														             ));

		   }
		   if (Input::get('company_info')) {
		        Data::update($user,array(
														'work'=>$input['work'],
														'company_working'=>$input['company_working'],
														'company_working_address'=>$input['company_working_address'],
														'company_working_hours'=>$input['company_working_hours']
								               	   ));
		   }
		   if(Input::get('contact_info')){
	 	     Data::update($user,array(
			        'skype_contact'=>$input['skype_contact'],
											'facebook_contact'=>$input['facebook_contact'],
											'google_contact'=>$input['google_contact'],
											'yahoo_contact'=>$input['yahoo_contact'],
											'twitter_contact'=>$input['twitter_contact'],
											'linked_contact'=>$input['linked_contact'],
											'phone_contact'=>$input['phone_contact']
								     	));
		   }
		   if (Input::get('change_password')) {
              if(Hash::check( $input['current_password'] ,$user->password)){
                Data::update($user,array( 'password' => Hash::make($input['new_password']) ));
              }
		   }
		   if (Input::get('account_status')) {
		   	    Data::update($user,['activated' => $input['activated']=="true"?1:0 ]);
		   }
		   if(Input::get('un_archived')){
		   	    Data::update($user,[ 'is_archived' => 0 ]);
		   }
		        return Response::make('ok',200);
    }

    public function updatePhoto($value='')
    {
    	if (Input::hasFile('photo'))
		{
		 try{

		   Input::file('photo')->move('assets/uploads/', Input::file('photo')->getClientOriginalName());

		   $user=$this->user->find((int)Input::get('id'));
		   Data::update($user,array('user_photo'=>Input::file('photo')->getClientOriginalName()));

		 }catch(Exception $e) {
            return $e;
       }

		   return  Redirect::back();
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
		//
	}
	public function comparePassword($value='')
	{
       return (Hash::check( Input::get('password') ,$this->user->find(Auth::id())->password))?Response::make(['success'=>true],200):Response::make(['success'=>false],200);
	}


}
