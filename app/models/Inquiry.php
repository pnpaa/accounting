<?php


	class Inquiry extends Eloquent
	{
	      public $timestamps=false;
       protected $fillable=['is_archived','name','email','subject','message','type'];
       protected $table = 'pna_inquiry';



 }