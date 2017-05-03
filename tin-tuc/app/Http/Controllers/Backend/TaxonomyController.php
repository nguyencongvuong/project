<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaxonomyNews;
use App\News;
class TaxonomyController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datas(){
        $datas['category']=TaxonomyNews::where('parent',0)->orderby('id','desc')->get(
            );
        foreach ($datas['category'] as $key => $value) {
            $datas['category'][$key]=$this->getdata($value);
            $datas['category'][$key]['children']=$this->getchildren($datas['category'][$key]->id);
        }
        return $datas;

    }
      public function getchildren($children){
        $children=TaxonomyNews::where('parent',$children)->get();
        return $children;
    }
    public function getdata($catagories){
        $catagories=TaxonomyNews::select()->find($catagories->id);
        return $catagories;
    }
    public function index()
    {
        //
        $datas=$this->datas();
        return view('backend.category.create',['datas'=>$datas]);
    }
  
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $string=$request->title;
        function convert($string){
        $a=['Á','Ả','À','Ã','Ạ','Ă','Ắ','Ằ','Ẳ','Ặ','Ẵ','Â','Ấ','Ầ','Ẩ','Ậ','Ẫ','á','à','ả','ã','ạ','ă','ằ','ẳ','ắ','ẵ','ặ','â','ầ','ẩ','ậ','ẩ','ấ','ẫ'];
        $d=['Đ','đ'];
        $u=['Ú','Ủ','Ù','Ũ','Ụ','Ư','Ứ','Ừ','Ự','Ữ','Ử','ú','ủ','ù','ụ','ũ','ư','ứ','ừ','ử','ự','ữ'];
        $o=['Ơ','Ớ','Ở','Ờ','Ỡ','Ợ','ơ','ớ','ở','ờ','ỡ','ợ','Ó','Ỏ','Ò','Ọ','Õ','ó','ò','ỏ','ọ','õ','Ô','Ố','Ổ','Ồ','Ộ','ô','ộ','ồ','ố','ổ','ỗ'];
        $e=['É','Ẻ','È','Ẹ','Ẽ','é','ẻ','è','ẹ','ẽ','Ê','Ế','Ể','Ề','Ệ','Ễ','ê','ế','ể','ề','ệ','ễ'];
        $y=['Ý','Ỷ','Ỳ','Ỹ','Ỵ','ý','ỷ','ỳ','ỵ','ỹ'];
        $i=['Í','Ỉ','Ì','Ị','Ĩ','í','ì','ỉ','ĩ','ị'];
        $s=['%','"',"'",'--','---','- ',' -',' - ','/',',','%20'];
        $space=['  ','   ',''];
        $convert=str_replace($a,'a',$string);
        $convert=str_replace($d,'d',$convert);
        $convert=str_replace($o,'o',$convert);
        $convert=str_replace($e,'e',$convert);
        $convert=str_replace($u,'u',$convert);
        $convert=str_replace($i,'i',$convert);
        $convert=str_replace($y,'y',$convert);
        $convert=str_replace($s,'-',$convert);
        $convert=str_replace($space,' ',$convert);
        return strtolower($convert);
        }
        $con=convert($string);
        $slug=str_slug($con,'-');
        $taxonomy=new TaxonomyNews();
        $taxonomy->title=$request->title;
        $taxonomy->slug=$slug;
        $taxonomy->description=$request->description;
        $taxonomy->parent=$request->parent;
        $taxonomy->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas=$this->datas();
        $category=TaxonomyNews::where('id',$id)->first();
        return view('backend.category.edit')->with(['datas'=>$datas,'category'=>$category]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaxonomyNews::where('id',$id)->delete();
        return redirect()->back();

        //
    }
}
