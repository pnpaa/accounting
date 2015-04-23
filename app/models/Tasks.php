<?php
	class Tasks extends Eloquent {

	 public $timestamps=false;
	 protected $fillable=array('is_archived','seenzone','task_title','task_content','task_due','task_setter','task_status','task_assign','task_group');
	 protected $table = 'pna_tasks';

    public function scopeBelongsToUser($query)
	 {
	          return $query->whereTask_setter(Auth::id());
	 }
   public function scopeMyTask($query)
	 {
	          return $query->whereTask_assign(Auth::id());
	 }

	}