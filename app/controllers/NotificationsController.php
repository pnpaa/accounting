<?php

class NotificationsController extends \BaseController {

	protected $inquires;
	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->inquires=new Inquiry();

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	   return View::make('inquiry.index')->with('inquiries',Stack::inquires());
	}

	public function reply()
	{
			$input=Input::only('_token','name','email','subject','message');
  $input['type']=1;
  // $input['email']='asasdev@pnpaa.com';

		$this->inquires->create($input);

         $to      = $input['email'];
         $subject = $input['subject'];
         $message = $input['message'];
         $headers = 'From: asasdev@pnpaa.com' . "\r\n" .
         'Reply-To: asasdev@pnpaa.com' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();

          mail($to, $subject, $message, $headers);
   	 return Response::json('ok',200);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		  return Response::make(Inquiry::find(Input::get('id'))->delete()?'success':'fail', 200);
	}
	public function update($id=0)
	{
		 $input=Input::only('un_archived','id','archived');

		 $inquiry=$this->inquires->find( (int) $input['id'] );
		 if($input['un_archived']){
       Data::update($inquiry,['is_archived'=>0]);
		 }else if($input['archived']){
       Data::update($inquiry,['is_archived'=>1]);
		 }
       return Response::make('ok',200);
	}



}
