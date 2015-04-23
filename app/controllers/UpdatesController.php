<?php

class UpdatesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
 protected $updates;
 protected $updatesCategory;
 protected $user;

	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'store']);
        $this->updates = new Updates();
        $this->updatesCategory = new UpdatesCategory();
        $this->user = new User();
    }
	public function index()
	{
		 return View::make('updates.index')->with('updatesCategory',$this->updatesCategory->whereIs_archived(0)->belongsToUser()->get());
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
      $input=Input::only('_token','update_category','update_allday','update_classname','update_content','update_end','update_start','update_title');
				  $input['update_end']=DateTime::createFromFormat('D M d Y H:i:s e+',$input['update_end']);
				  $input['update_start']=DateTime::createFromFormat('D M d Y H:i:s e+',$input['update_start']);
				  $input['update_setter']=Auth::id();
      $update=$this->updates->create($input);
	  return Response::make(array('data'=> $update ),200);

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
	public function update($id=0)
	{


     $data=Input::only('archived','un_archived','_token','id','seenzone_update', 'update_category','update_allday','update_classname','update_content','update_end','update_start','update_title');

		   $update=$this->updates->find((int)$data['id']);
    if($data['archived']){
    	// return dd($update);
            Data::update($update,array( 'is_archived' => 1 ));
	  return Response::make( 'asasasas',200);

     }else if($data['un_archived']){
            Data::update($update,array( 'is_archived' => 0 ));
     }else if($data['seenzone_update']){
            Data::update($update,array( 'seenzone' => $update->seenzone.Auth::id().'-' ));
    	 }else{
             $old=DB::select(DB::raw("SELECT id FROM `pna_updates` LIMIT ".Input::get('id').", 1"));
	            Data::update($this->updates->find($old[0]->id),array(
                    'update_category'=>$data['update_category'],
																				'update_allday'=>$data['update_allday']==0?false:true,
																				'update_classname'=>$data['update_classname'],
																				'update_content'=>$data['update_content'],
																				'update_end'=>DateTime::createFromFormat('D M d Y H:i:s e+',$data['update_end']),
																				'update_start'=>DateTime::createFromFormat('D M d Y H:i:s e+',$data['update_start']),
																				'update_title'=>$data['update_title']
																      	    ));
	     }
	  return Response::make(array('data'=> 'ok'),200);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
	 // $old=DB::select(DB::raw("SELECT id FROM `pna_updates` LIMIT ".Input::get('id').", 1"));
	   $old=$this->updates->skip( ( (int)Input::get('id') )-1 )->take(1)->get();
    return Response::make($this->updates->find($old[0]->id)->delete()?'success':'fail',200);
	}

    public function getUpdates($value='')
    {
    	 return Response::json(Stack::calendarEvents(),200);
    }


}
