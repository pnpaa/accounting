<?php


	class Committee extends Eloquent
	{
	   public $timestamps=false;
	   protected $fillable=array('is_archived', 'committee_title','committee_content');
       protected $table = 'pna_committee';


    }