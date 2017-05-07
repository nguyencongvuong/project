<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaxonomyNews;
use App\News;
use DB;
class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
    	$news=new News();
        if($type=='category'){
        	$datas=TaxonomyNews::withTrashed()->where('deleted_at','<>',null)->get();
        	foreach ($datas as $key=>$value){
        		$value['parent_name']=TaxonomyNews::where('id',$value['parent'])->value('title');
        	}
        	return view('backend.trash.index-category',['datas'=>$datas]);
        }else{
        	$datas=News::TrashCategoryName(10);
        	return view('backend.trash.index-news',['datas'=>$datas]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old_link=$request->url_old;
    	$check=explode('/',$old_link);
    	if(in_array('category',$check)){
    		TaxonomyNews::withTrashed()->where('id',$id)->restore();
    		return redirect()->back()->with('news',"Bạn vừa restore 1 chuyên mục");
    	}else{
    		News::withTrashed()->where('id',$id)->restore();
    		return redirect()->back()->with('news',"Bạn vừa restore 1 bài viết");
    	}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,$id)
    {
    	$old_link=$request->url_old;
    	if($old_link=='category'){
    		if($id=='all'){
    		$delete_all=TaxonomyNews::withTrashed()->where('deleted_at','<>',null)->forceDelete();
    		}
    		else{
    		$delete=TaxonomyNews::withTrashed()->find($id)->forceDelete();
    		}
    		if(isset($delete)){
    			return redirect()->back()->with('news',"Bạn vừa xóa thành công 1 chuyên mục");
    		}elseif (isset($delete_all)) {
    			return redirect()->back()->with('news',"Bạn vừa xóa làm trống thùng rác");
    		}else{
    			return redirect()->back()->with('news',"Thùng rác không có gì");
    		}
    	}else{
    		if($id=='all'){
    		$delete_all=News::withTrashed()->where('deleted_at','<>',null)->forceDelete();
    		}else{
    		$delete=News::withTrashed()->find($id)->forceDelete();
    		}
    		if(isset($delete)){
    			return redirect()->back()->with('news',"Bạn vừa xóa thành công 1 bài viết");
    		}elseif (isset($delete_all)&&$delete_all) {
    			return redirect()->back()->with('news',"Bạn vừa xóa tất cả");
    		}else{
    			return redirect()->back()->with('news',"Thùng rác Trống không có gì để xóa");
    		}
    		return Carbon::now();
    		die();
    		
    	}
    	
        
    }
}
