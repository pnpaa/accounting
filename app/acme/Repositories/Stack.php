<?php namespace Acme\Repositories;

 class Stack{


  protected $transaction;
  protected $user;
  protected $updates;
  protected $task;
  protected $committee;
  protected $inquiry;
  protected $updateCategory;

  public function __construct( )
	 {
      $this->transaction=new \Transactions();
      $this->user=new \User();
      $this->updates=new \Updates();
      $this->task=new \Tasks();
      $this->committee=new \Committee();
      $this->inquiry=new \Inquiry();
      $this->updateCategory=new \UpdatesCategory();
	 }

		public function batchPercentage($value='')
		{
			       return $this->transaction->selectRaw(\DB::raw(' Month(pna_transactions.transaction_date) as tran_date,pna_users.batch'))
			                     ->join('pna_users','pna_transactions.user_id', '=', 'pna_users.id')
			                     ->whereType(0)
			                     ->get();
		}
		public function committees($value='')
		{
		         $committees=$this->user->selectRaw(\DB::raw('count(*) as committee_count, committee'))
			                     ->where('committee', '<>', 0)
			                     ->groupBy('committee')
			                     ->get();
	                      	foreach ($committees as $committee) {
			                     $committee->committee=getCommitteeName($committee->committee);
			                     }
			        return $committees;

		}
		public function batches($value='')
		{
		   return    $this->user->selectRaw(\DB::raw('count(*) as batch_count, batch'))
			                     ->where('batch', '<>', 0)
			                     ->groupBy('batch')
			                     ->get();
		}
		public function updates($value='')
		{
		   $updates= $this->updates->whereIs_archived(0)->belongsToUser()->limit(5)->get();
        foreach ($updates as $update) {
           $update->update_setter=getUserName($update->update_setter,true);
        }
      return $updates;
		}
		public function tasks($value='')
		{
		  $tasks=$this->task->belongsToUser(\Auth::id())->limit(5)->get();
        foreach ($tasks as $task) {
           $task->task_setter=getUserName($task->task_setter,true);
        }
       return $tasks;

		}
		public function counter($value='')
		{
		         return ['users'=>$this->user->all()->count(),
        	          'amount'=>$this->userTotalAmount(),
        	          'committees'=>$this->committee->all()->count(),
        	          'batches'=> count($this->batches()),
        	          'receive'=>$this->receiveAmount(),
			                'user_pay'=>$this->userPay(),
        	          ];

		}
		public function userPay($value='')
		{
			  return $this->transaction->selectRaw(\DB::raw(' MONTH(transaction_date) as tran_date , count(user_id) as user_count'))
			                     ->whereType(0)
			                     ->groupBy('tran_date')
			                     ->get();
		}
		public function receiveAmount($value='')
		{
			  return $this->transaction->selectRaw(\DB::raw(' MONTH(transaction_date) as tran_date , sum(transaction_amount) as receive_count'))
			                     ->whereType(0)
			                     ->belongsToUser(\Auth::id())
			                     ->groupBy('tran_date')
			                     ->get();
		}
		public function userTotalAmount($value='')
		{
			 return $this->transaction->whereType(0)->belongsToUser(\Auth::id())->sum('transaction_amount');
		}
 public function inquires($value='')
 {
    return  $this->inquiry->whereIs_archived(0)->orderBy('created_at','DESC')->get();
 }
	public function calendarEvents($value='')
	{
	    	 $data=$this->updates->whereIs_archived(0)->belongsToUser()->get();
	      foreach ($data as $value) {
	      	   $value->update_classname=$this->updateCategory->whereId($value->update_category)->select('category_color')->get();
	      	  ( $value->update_setter == \Auth::id() )? $value->update_setter=1:$value->update_setter=0;
	      }
	   return $data;
	}

public function filterTransactions($filter=[])
{
      $filter_id=[];
      $batch_id= $this->user->filterByBatch($filter['batch_filter'])->filterByCommitte($filter['committee_filter'])->get();

      foreach ($batch_id as $key => $value) {
        array_push($filter_id, $value->id);
      }

    if( count($batch_id)< 1 ) return null;
    return $this->transaction->whereBetween('transaction_date',[ date('Y-m-d',strtotime($filter['start_date'])),date('Y-m-d',strtotime($filter['end_date'])) ])->whereIn('user_id',$filter_id)->get();
}

public function createBulkUser($users=[])
{
  $user=$this->user->select('id')->orderBy('id','DESC')->take(1)->get();
  $current_id=$user[0]->id+1;
   for ($i=$current_id; $i <  ((int) $users['users_num'] + $current_id ) ; $i++) {

            if($this->user->create([
																      'role' => $users['users_role'],
																			'username' => 'user'.$i,
																			'password'=>\Hash::make('user'.$i),
																			'first_name'=>'user',
																			'last_name'=>$i,
																			'committee'=>$users['users_committee'],
																			'batch'=>$users['users_batch']
              	])){
            	 continue;
            }else{
            	break;
            	return false;
            }
   }
   return true;

}
public function usersNotPaid()
{
 $debt=[];
 $pays=[];
 $uniq_keys=[];
 $users=$this->user->whereIs_archived(0)->get();
 $pays_raw= $this->transaction->whereIs_archived(0)->whereType(0)->select('uniq_id','user_id','id')->get();
 $uniq_id= $this->transaction->whereIs_archived(0)->whereType(1)->get();

 foreach ($pays_raw as $key => $value) {
 	 array_push($pays ,$value->user_id);
 }

 foreach ($users as  $user) {

   if (in_array( $user->id , $pays)) {
       foreach ($pays_raw as $user_pays) {
                 // dd($user_pays->uniq_id);
                 foreach ($uniq_id as   $current) {
                       if ($current->uniq_id <> $user_pays->uniq_id AND
                        $user_pays->user_id == $user->id) {
                         array_push($uniq_keys, $current->uniq_id);
                         array_push($debt,['id'=>$user_pays->user_id,'transaction_amount'=>$current->transaction_amount,'transaction_purpose'=>$current->transaction_purpose,'transaction_date'=>$current->transaction_date]);
                       }
                 }
       }

   }else{
       foreach ($uniq_id as   $current) {
           array_push($debt,['id'=>$user->id,'transaction_amount'=>$current->transaction_amount,'transaction_purpose'=>$current->transaction_purpose,'transaction_date'=>$current->transaction_date]);
       }
   }
 }
  return    array_map("unserialize", array_unique(array_map("serialize", $debt)));

}

}


