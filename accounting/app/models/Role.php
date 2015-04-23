<?php


	class Role extends Eloquent
	{
	   public $timestamps=false;
       protected $table = 'pna_roles';

       protected  $fillable=['role_id','role_name'];
        public function user(){
       	return $this->belongsTo('User','role_id','id');
       }
    }