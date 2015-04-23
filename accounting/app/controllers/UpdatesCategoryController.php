<?php

class UpdatesCategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $updatesCategory;
	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->updatesCategory=new UpdatesCategory();

    }
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		  $data=Input::only('category_color','category_name');
		  $valid=Validator::make($data,['category_color' =>'required','category_name'=>'required']);
	   if($valid->fails()) return Redirect::back()->withErrors( $valid );
	   $data['category_setter']=Auth::id();
	   UpdatesCategory::create($data);
	   return Redirect::back();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	  	  $input=Input::only('id','category_name','category_color','is_archived','un_archived');

	  $updatesCategory=$this->updatesCategory->find($input['id']);
   if (Input::get('archived') == "true") {
	  	    Data::update($updatesCategory,['is_archived'=>1]);
	  		  }else if (Input::get('un_archived')) {
	  	    Data::update($updatesCategory,['is_archived'=>0]);
	  	    return Response::make('ok',200);
	  }
	  $valid=Validator::make($input,['category_color' =>'required','category_name'=>'required']);
	  if($valid->fails()) return Redirect::back()->withErrors( $valid );
	  Data::update( $updatesCategory ,$input);
	  return Redirect::back();

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    return Response::make($this->updatesCategory->find(Input::get('id'))->delete()?'success':'fail',200);

	}


}
