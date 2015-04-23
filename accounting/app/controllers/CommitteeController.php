<?php

class CommitteeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
  protected $committee;

	public function __construct()
 {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->committee=new Committee();

 }
	public function index()
	{
		 return View::make('committee.index')->with('committee',   $this->committee->whereIs_archived(0)->get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 $input=Input::only('committee_title','committee_content','_token');
         return Response::make(['data'=>    $this->committee->create($input) ],200);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		        $input=Input::only('id','committee_title','committee_content','un_archived');
		        $committee = $this->committee->find((int)$input['id']);

          if ($input['un_archived']) {
             Data::update($committee,['is_archived'=>0]);
             return Response::make('ok',200);
           }else{
           	    return Response::make(['data' =>  Data::update( $committee  ,array(
		         	        'committee_title'   => $input['committee_title'],
		                    'committee_content' => $input['committee_content']
	                      ))
           	      ],200);
           }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    return Response::make($this->committee->find(Input::get('id'))->delete()?'success':'fail',200);

	}


}
