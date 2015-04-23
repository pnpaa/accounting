<?php

class MailController extends \BaseController {


  protected $mail;

  public function __construct( )
	 {
	 	   $this->beforeFilter('csrf', ['on' => 'post']);
      $this->mail=new Mailler();
	 }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 return View::make('mail.index')->with('mails',$this->mail->inboxMail()->paginate(25));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 return View::make('mail.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		  return View::make('mail.show')->with('mails',$this->mail->replies($id)->get());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
 		$input=Input::only('id','delete','spam','read');
 		$mail=$this->mail->find($input['id']);
   $status=$mail->status;
 		if($input['delete']){
     $status=2;
   }
   if($input['spam']){
     $status=3;
   }
   if($input['read']){
     $status=4;
   }
    Data::update($mail,['status'=>$status]);
		 return Response::make('ok',200);
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
	public function getReply($id=0)
	{
		 return View::make('mail.reply')->with('mail',$this->mail->find($id));
	}
	public function postReply($value='')
	{
		 $input=Input::only('thread','recepient','subject','message');
		 $input['sender']=Auth::id();
		 $input['type']=1;
		 $this->mail->create($input);
		 return Redirect::route('mail.index');
	}
	public function postCompose($value='')
	{
		 $input=Input::only('recepient','subject','message');
   $input['sender']=Auth::id();
   $input['thread']=uniqid();

		 $this->mail->create($input);
		 return Redirect::route('mail.index');
	}
	public function getAll($value='')
	{
	 return View::make('mail.index')->with('mails',$this->mail->allMail()->paginate(25));
	}
	public function getSent($value='')
	{
	 return View::make('mail.index')->with('mails',$this->mail->sentMail()->paginate(25));
	}
		public function getDraft($value='')
	{
	 return View::make('mail.index')->with('mails',$this->mail->draftMail()->paginate(25));
	}
		public function getTrash($value='')
	{
	 return View::make('mail.index')->with('mails',$this->mail->trashMail()->paginate(25));
	}
			public function getSpam($value='')
	{
	 return View::make('mail.index')->with('mails',$this->mail->spamMail()->paginate(25));
	}



}
