<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $task;
	protected $user;
	public function __construct()
 {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->task=new Tasks();
        $this->user=new User();

 }

	public function index()
	{

    	 return View::make('tasks.index')->with('users',$this->user->get())->with('tasks',$this->task->belongsToUser()->whereIs_archived(0)->get() )->with('my_tasks',$this->task->myTask()->whereIs_archived(0)->get());

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
         $input=Input::only('task_title','task_content','task_assign','task_due','task_group');
         $input['task_setter']=Auth::id();
         $input['task_assign'] =(int)$input['task_assign'];
         $input['task_due']=new DateTime( join(' ',explode('-',$input['task_due'])) );
         $task=$this->task->create($input);
         $task->task_assign=getuserName( (int)$input['task_assign'],true);
		 return Response::make(array('data'=> $task),200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

         $input=Input::only('archived','un_archived','seenzone_update','status_update','status','id','task_title','task_content','task_assign','task_due','task_group');
         $task=$this->task->find((int)$input['id']);
         if($input['archived']){
             $task->is_archived=1;
         }
         else if($input['un_archived']){
             $task->is_archived=0;
         }else if($input['seenzone_update']){
             $task->seenzone=$task->seenzone.Auth::id().'-';
         }else if($input['status_update']){
             $task->task_status=(int)$input['status'];
         }else{
	         $task->task_title=$input['task_title'];
	         $task->task_content=$input['task_content'];
	         $task->task_assign=(int)$input['task_assign'];
	         $task->task_group=$input['task_group'];
	         $task->task_due= (  date_create($input['task_due']) );
           //$task->task_due=dateTime( join(' ',explode('-',$input['task_due'])) ,true);
         }
           $task->save();
	         $task->task_assign=getUserName($task->task_assign,true);
       return Response::make(array('data'=>$task),200);

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
    return Response::make($this->task->find(Input::get('id'))->delete()?'success':'fail',200);
	}


}
