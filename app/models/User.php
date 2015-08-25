<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
 	protected $table = 'pna_users';
    protected $fillable =['is_archived', 'activated','batch','committee','role','updated_at','created_at','username','password','email','first_name','last_name','maidden_name','gender','birth_date','work','company_working','company_working_hours','company_working_address','permanent_address','current_address','phone_contact','skype_contact','facebook_contact','linked_contact','twitter_contact','google_contact','yahoo_contact','user_about','user_photo'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	 protected $hidden = array('password', 'remember_token');

	 public function role(){
	 	return $this->hasOne('Role','id','role_id');
	 }
	 public function committee($value='')
	 {
	 	 return $this->belongsTo('Committee');
	 }
	 public function scopeFilterByCommitte($query,$committtee)
	 {
    return  $committtee <> "*" ? $query->whereCommittee($committtee) : $query->where('committee' ,'<>' , 0 );
	 }
	  public function scopeFilterByBatch($query,$batch)
	 {
    return  $batch <> "*" ? $query->whereBatch($batch) : $query->where('batch' ,'<>' , 0 );
	 }
 	    public function scopeBelongsToUser($query)
		{
			return  Auth::user()->role <>  1?$query->whereBatch(Auth::user()->batch): $query;

    }

}
