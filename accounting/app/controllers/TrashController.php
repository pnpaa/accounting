<?php

class TrashController extends \BaseController {

 protected $updates;
 protected $users;
 protected $tasks;
 protected $transactions;
 protected $inquiries;
 protected $committees;
 protected $updatesCategories;
 	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'store']);
        $this->updates = new Updates();
        $this->users = new User();
        $this->tasks=new Tasks();
        $this->transactions=new Transactions();
        $this->inquiries=new Inquiry();
        $this->committees=new Committee();
        $this->updatesCategories=new UpdatesCategory();
     }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 return View::make('trash.index')->with('updates',$this->updates->whereIs_archived(1)->get())
		                                 ->with('users',$this->users->whereIs_archived(1)->get())
		                                 ->with('transactions',$this->transactions->whereIs_archived(1)->get())
		                                 ->with('inquiries',$this->inquiries->whereIs_archived(1)->get())
		                                 ->with('committees',$this->committees->whereIs_archived(1)->get())
		                                 ->with('updatesCategories',$this->updatesCategories->whereIs_archived(1)->get())
		                                 ->with('tasks',$this->tasks->whereIs_archived(1)->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
