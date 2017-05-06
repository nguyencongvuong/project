<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\TaxonomyNews;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $allhistory=TaxonomyNews::parents();
        // echo "<pre>";
        // var_dump(TaxonomyNews::withTrashed()
        // ->get());
        // TaxonomyNews::withTrashed()->where('id',4)
        // ->restore();
        // $news=News::all();
        $datas=News::GetCategoryName(10);
        return view('backend.news.index',['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $news=new News();
        $news->tieude=$request->input('title');
        $news->mota=$request->input('description');
        $news->noidung=$request->input('content');
        $news->chuyenmuc=$request->category;
        $news->status=$request->submit;
        $save=$news->save();
        $last_id=$news->id;
        if($save){
       $stt=$this->AfterSave($last_id,$request->input('title'),$request->input('description'),$request->input('content'),$request->category,$request->submit);
           
        }
        return redirect()->back()->with('thongbao','Bạn đã thêm thành công một bài viết: '.$request->input('title'));
            }
        public function AfterSave($last_id,$title,$description,$content,$category,$status){
            $news=News::find($last_id);
            $slug=str_slug(\func::ConvertString($title))."-".$last_id;
            $news->tieude=$title;
            $news->slug=$slug;
            $news->mota=$description;
            $news->noidung=$content;
            $news->chuyenmuc=$category;
            $news->status=$status;
            $news->save();
                       
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas=News::where('id',$id)->get();
        return view('backend.news.create',['datas'=>$datas,'id'=>$id]);
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
        $news=News::find($id);
        $news->tieude=$request->input('title');
        $news->noidung=$request->input('content');
        $news->mota=$request->input('description');
        $news->chuyenmuc=$request->category;
        $news->save();
        return redirect()->back()->with('Bạn vừa chỉnh sửa bài viết');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=news::find($id);
        $news->delete();
        return redirect()->back()->with('news','Bạn vừa xóa bài viết'.$news);
    }
}
