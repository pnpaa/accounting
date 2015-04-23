<?php


	class Folder extends Eloquent
	{
	      public $timestamps=false;
       protected $fillable=['folder_name','folder_desc'];
       protected $table = 'pna_folders';

  public function scopeBelongsToUser($query)
  {
  	  return $query->whereFolder_owner(Auth::id());
  }

 }