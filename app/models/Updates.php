<?php


	class Updates extends Eloquent
	{
	      public $timestamps=false;
       protected $fillable=array('is_archived','seenzone_update','update_category','update_allday','update_classname','update_content','update_end','update_start','update_title','update_setter');
       protected $table = 'pna_updates';

        public function scopeBelongsToUser($query)
       {
       	    $role=User::whereRole(1)->get();
								    $update_setter=array(Auth::id());
								    foreach ($role as $r) {
								      array_push($update_setter,$r->id);
								    }
								   return $query->whereIn('update_setter',$update_setter);

       }
    }