<?php namespace Acme\Repositories;

 class Data{
	public function __construct()
	{
         //  echo 'called Test class Initialize';
	}
	public function update($entity,$input=array())
	{
		 foreach ($input as $key => $value) {
		 	 $entity->$key=$value;
		 }
		 $entity->save();
   return $entity;
	}
 	public function mail($data)
	{
 		 // \Mail::send('emails.welcome', array('data'=>$entity), function($message)
			 //  {
			 //     $message->to('tangposma@gmail.com', 'dumo dev')->subject('Pnpaa Receipt');
		  // });
		  //
		   $user=\User::find($data->user_id);

       $to=$user->email <> null ?$user->email:'tangposma@gmail.com';

      // $to  = 'tangposmarvin@gmail.com,tangposma@gmail.com,sheenamaecabadon@gmail.com,lera22roxanne@gmail.com' ;
      // $to .= 'guiarose.d.penafiel@accenture.com' . ', ' ;
      // $to .= 'sheenamaecabadon@gmail.com' . ', ' ;
      // $to .= 'MaryLaurice.Sanchez@ncr.com' . ', ' ;
      // $to .= 'lera22roxanne@gmail.com' . ', ' ;
      // $to = 'tangposma@gmail.com';

			// subject
			$subject = 'PNPAA Receipt';

			// message
			$message = '
	<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
  .receipt{padding: 20px;border: 10px solid rgb(51,204,204); margin: 5px;}
</style>
</head>
<body>
<div class="col-md-4 receipt" style="padding: 20px;border: 10px solid rgb(51,204,204); margin: 5px;">
  <div class="row">
     <div class="col-md-6">
      <img src="'.   asset("assets/front-page/images/pnpaa-logo-small.png").'" alt="logo">
    </div>
    <div class="col-md-6">
      <p>Date : '.  dateMonth($data->transaction_date) .'  </p>
    </div>
    <div class="col-md-12">
      <p>Payee : '. getUserName($data->user_id,true) .' </p>
      <p>Received From :'.  getUserName($data->transaction_setter,true) .' </p>
      <p>On :  '. dateMonth($data->transaction_date) .'  </p>
    </div>
    <div class="col-md-12">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td> '. $data->transaction_purpose .'</td>
            <td>Php '.  $data->transaction_amount .' </td>
          </tr>
          <tr>
            <td colspan="2">TOTAL</td>
            <td>Php '. $data->transaction_amount.' </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6 col-md-offset-6">
      <p>Recorded by :  '.  getUserName($data->transaction_setter,true).' </p>
    </div>
  </div>
</div>
</body>
</html>
			';

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Additional headers

			$headers .= 'From: Pnpaa <asasdev@pnpaa.com>' . "\r\n";


			// Mail it
			mail($to, $subject, $message, $headers);


	}
	public function clear($id)
	{
		 if ($id=25) {
     // \DB::table('pna_transactions')->truncate();
      //\DB::table('pna_roles')->truncate();
  	 	//\DB::table('pna_users')->truncate();
      \DB::table('pna_inquiry')->truncate();
  	 }
	}
  public function seed($id)
  {
 if ($id=25) {
/*---------------------------------*/
    //  \Role::create([
    //   'role_id' => 1,
    //   'role_name' => 'admin'
    //  ]);
    //  \Role::create([
    //   'role_id' => 2,
    //   'role_name' => 'alumni'
    // ]);
    //  \Role::create([
    //   'role_id' => 3,
    //   'role_name' => 'cashier'
    //  ]);

   \DB::table('pna_users')->insert(['role_id'=>1,'role_name'=>'admin']);

    /*-------------------------------*/
    //   \User::create([
    //   'role' => 1,
    //   'username' => 'asasdev',
    //   'password'=>Hash::make('asasdev'),
    //   'first_name'=>'asas',
    //   'last_name'=>'dev',
    //   'work'=>'dev'
    //  ]);
    //  \User::create([
    //   'role' => 2,
    //   'username' => 'dumodev',
    //   'password'=>Hash::make('dumodev'),
    //   'first_name'=>'dumo',
    //   'last_name'=>'dev',
    //   'work'=>'dev'
    // ]);
    //   \User::create([
    //   'role' => 3,
    //   'username' => 'wewedev',
    //   'password'=>Hash::make('wewedev'),
    //   'first_name'=>'wewe',
    //   'last_name'=>'dev',
    //   'work'=>'dev'
    // ]);

  }
}
public function migrate($id)
{
   if ($id ==25) {
    \Schema::create('pna_roles', function(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('role_id');
        $table->string('role_name');
        $table->timestamps();

    });
   }
}
public function mailChangePassRequest($email='')
{
     // $user=\User::find($data->user_id);

       $to=$email <> null ?$email:'tangposma@gmail.com';

      // $to  = 'tangposmarvin@gmail.com,tangposma@gmail.com,sheenamaecabadon@gmail.com,lera22roxanne@gmail.com' ;
      // $to .= 'guiarose.d.penafiel@accenture.com' . ', ' ;
      // $to .= 'sheenamaecabadon@gmail.com' . ', ' ;
      // $to .= 'MaryLaurice.Sanchez@ncr.com' . ', ' ;
      // $to .= 'lera22roxanne@gmail.com' . ', ' ;
      // $to = 'tangposma@gmail.com';

      // subject
      $subject = 'PNPAA Change Password Request';

      // message
      $message = ' Click the link to change your password
 '.\URL::to('');

      // To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      // Additional headers

      $headers .= 'From: Pnpaa <asasdev@pnpaa.com>' . "\r\n";


      // Mail it
      mail($to, $subject, $message, $headers);
}

}


