<?php

class AnnouncementController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $all=DB::table('announcement')->orderby('time','desc')->get();
       return $all=json_encode($all);

  //    $all=json_decode($all);
    //    return var_dump($all);
      //  var_dump($all);
        //return View::make('admin.announcement')->with('list',$all);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        $title=$_POST['title'];
        $content=$_POST['control'];

      //  return Response::json(array('msg' => 'test'));
        //$data=json_decode($data);
//var_dump($data);
		$addnews=new Announcement;
   //     $writer=DB::table('admin')->select('username')->where('id','=',$id);
//var_dump($writer);
        $addnews->title=$title;
        $addnews->content=$content;
        $addnews->time=time();
        $addnews->save();
     //   return Response::json(array('msg' => 'test'));
        return Response::json(array('msg' => 'test'));

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
