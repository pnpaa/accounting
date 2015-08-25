<?php
	class Transactions extends Eloquent {

	 public $timestamps=false;
	 protected $fillable=array('or_number','transaction_number','uniq_id','is_archived','transaction_date','transaction_amount','transaction_purpose','type','user_id','transaction_setter');
	 protected $table = 'pna_transactions';

	    public function scopeBelongsToUser($query)
		{
			    if (Auth::user()->role ==  1) {
			    	  return  $query;
			    }else if(Auth::user()->role ==  3){
              $users=[];
			        foreach (User::whereBatch(Auth::user()->batch)->get() as $key => $value) {
			        	 array_push($users,$value->id);
			        }

			        return $query->whereIn('user_id',$users);
			    }else{
              return $query->whereUser_id(Auth::id());
			    }
    }
		public function scopeUserReceipts($query)
		{
			if (Auth::user()->role == 1) {
          return $query->whereType(0);
			}else if( Auth::user()->role == 3){

        $users=[];
        foreach (User::whereBatch(Auth::user()->batch)->get() as $key => $value) {
        	 array_push($users,$value->id);
        }

        return $query->whereIn('user_id',$users);

			}else{
				return  $query->whereUser_id(Auth::id());
			}

		}
  	public function scopeWithFilter($query,$filters=array())
		{
     return (Auth::user()->role <> 1)?$query:Stack::filterTransactions($filters);
    }

	}