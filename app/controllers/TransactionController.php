<?php

class TransactionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $transaction;
	protected $user;


	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->transaction=new Transactions();
        $this->user=new User();

     //   Data::update($this->user->find(1),['user_photo'=>null]);

    }
	public function index()
	{
		return View::make('transactions.index')->with('transactions',  $this->transaction->whereIs_archived(0)->whereType(0)->belongsToUser(Auth::id())->get()) ;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
     //return dd(  $this->transaction->whereType(1));
 		return View::make('transactions.create')->with('transactions',  $this->transaction->whereIs_archived(0)->whereType(1)->get())->with('users',  $this->user->whereIs_archived(0)->belongsToUser()->get());
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
		  return  Redirect::route('transaction.create')->with(['error'=>'Captcha Mismatched']);
		  }
		//return dd(Auth::user()->id);
		$input=Input::only('transaction_date','transaction_amount','transaction_purpose','user_id');
        $input['type']=0;
        if ($input['transaction_date'] != ' ')$input['transaction_date']=date_format(date_create($input['transaction_date']),'Y-m-d H:i:s');

        $input['transaction_setter']=Auth::id();
        $input['uniq_id']=$this->transaction->find($input['transaction_purpose'])->uniq_id;
        $input['transaction_purpose']=  $this->transaction->find($input['transaction_purpose'])->transaction_purpose;
       // $this->transaction->create($input);
        Data::mail($this->transaction->create($input));
		    return  Redirect::route('transaction.create')->with(['info'=>'Successfully Paid','data'=>$input]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
  public function show($id=0)
  {
       return View::make('transactions.show')->with('transactions',  $this->transaction->userReceipts()->orderBy('transaction_date','desc')->get());
  }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
 public function postFilter()
	{
		    $filters=Input::only('batch_filter','committee_filter','start_date','end_date');

        $data='';
   if (Auth::user()->role <> 1 AND Auth::user()->role <> 3) {
    $data= $this->transaction->userReceipts()->whereBetween('transaction_date',[ date('Y-m-d',strtotime($filters['start_date'])),date('Y-m-d',strtotime($filters['end_date'])) ])->get();
   }else{
   	$data=  $this->transaction->userReceipts()->withFilter($filters);
   }

	     return View::make('transactions.show')->with('transactions', 	$data );

	}
	public function export($value='')
	{
			$data=$this->transaction->whereIs_archived(0)->whereType(0)->select('id as ID','user_id as User-ID','transaction_setter as Cashier-ID','transaction_amount as Transaction-Amount','transaction_purpose as Transaction-Purpose','transaction_date as Transaction-Date')->get();
		 Excel::create('Transactions', function($excel) use ($data) {

    $excel->sheet('First sheet', function($sheet) use ($data) {
       $sheet->fromArray( $data );
       $sheet->appendRow(array(
						    'appended', 'appended'
						));
    });


			})->export('csv');

			}


}
