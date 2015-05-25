<?php

class MusicController extends \BaseController {


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $list=Music::all();
 $list=json_encode($list);
		return View::make("Admin.index");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getStore()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow()
	{
        $list=Music::all();
       return  $list=json_encode($list);	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDestroy($id)
	{
		//
	}

public function getOrderbytime()
{
    $time = Input::get("time");//未设置=36500
   $way = Input::get("way");//未设置=0
   $status = Input::get("type");//未设置=0  播出为1 未播出为2
if($way!=0){
if($status!=0){
    $now = time();
        $range = $now - ($time - 2) * 24 * 60 * 60;
        $range = strtotime(date('Y-m-d', $range));
        if($way==1){
            $way="goods";

        }else if($way==2){
            $way="time";

        }
    $list = DB::table("music")->where("time", ">=", $range)->where("status","=",$status)->orderby($way,"desc")->get();
     }else{
        $now = time();
        $range = $now - ($time - 2) * 24 * 60 * 60;
        $range = strtotime(date('Y-m-d', $range));
        if($way==1){
            $way="goods";

        }else if($way==2){
            $way="time";

        }
        $list = DB::table("music")->where("time", ">=", $range)->orderby($way,"desc")->get();

    }
}
    else{
        if($status!=0){
            $now = time();
            $range = $now - ($time - 2) * 24 * 60 * 60;
            $range = strtotime(date('Y-m-d', $range));
            $list = DB::table("music")->where("time", ">=", $range)->where("status","=",$status)->get();

        }else{
            $now = time();
            $range = $now - ($time - 2) * 24 * 60 * 60;
            $range = strtotime(date('Y-m-d', $range));
            $list = DB::table("music")->where("time", ">=", $range)->get();
        }
    }
//    if($way!=0&&$status!==0&&$time!==0) {
//        $now = time();
//        $range = $now - ($time - 2) * 24 * 60 * 60;
//        $range = strtotime(date('Y-m-d', $range));
//        if($way==1){
//            $way="goods";
//
//        }else if($way==2){
//            $way="time";
//
//        }
//        $list = DB::table("music")->where("time", ">=", $range)->where("status","=",$status)->orderby($way,"desc")->get();
//
//        $s=strtotime('2015-05-22 00:05:24');
//         var_dump($s);
//
//    }
//    else if($way==0&&$status!=0&&$time=0){
//        $now = time();
//        $range = $now - ($time - 2) * 24 * 60 * 60;
//        $range = strtotime(date('Y-m-d', $range));
//
//        $list = DB::table("music")->where("time", ">=", $range)->where("status","=",$status)->get();
//
//    }    else if($way!=0&&$status==0&&$time!=0){
//        $now = time();
//        $range = $now - ($time - 2) * 24 * 60 * 60;
//        $range = strtotime(date('Y-m-d', $range));
//        if($way==1){
//            $way="goods";
//
//        }else if($way==2){
//            $way="time";
//
//        }
//        $list = DB::table("music")->where("time", ">=", $range)->orderby($way,"desc")->get();
//
//    }else if($way==0&&$status==0&&$time!=0){
//        $now = time();
//        $range = $now - ($time - 2) * 24 * 60 * 60;
//        $range = strtotime(date('Y-m-d', $range));
//
//        $list = DB::table("music")->where("time", ">=", $range)->get();
//
//    }
//    else if($time==0&&$status==0&&$way!=0){
//        if($way==1){
//            $way="goods";
//
//        }else if($way==2){
//            $way="time";
//
//        }
//        $list = DB::table("music")->orderby($way,"desc")->get();
//
//    }
//    else if($way==0&&$status!=0&&$time==0){
//        $list = DB::table("music")->where("status","=",$status)->get();
//
//    }else{
//        $list=Music::all();
//    }
        return View::make('admin.index')->with('list', $list);


}

//统计页面
public function getStatistics(){
    //该歌曲点击次数
 $list1=DB::table('music')->select("music",DB::raw('count(*) ' ))->orderby(DB::raw('count(*) ' ), 'DESC')->groupby('music')->get();
//该歌曲累计点赞数
    $list2=DB::table('music')->select("music","goods" )->orderby("goods", "DESC")->get();
//该歌曲综合热门度
    $list3=DB::table('music')->select("music",DB::raw('count(*) ' ))->orderby(DB::raw('count(*) ' ) , 'DESC')->groupby('music')->get();

//    $list=DB::table('music')->groupby('music')->orderby(DB::raw('count(*) ' , 'DESC'))->get();

    var_dump($list3);
//return View::make('admin.statistics')->with('list',$list);
}


}


