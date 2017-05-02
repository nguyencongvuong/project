<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaxonomyNews;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas=[];
        $taxonomies=TaxonomyNews::where('parent',0)->orderby('id','desc')->get();
        foreach($taxonomies as $key=>$value){
        $data[$key]['id']=$value->id;
        $datas[$key]['parent']=$value->parent;
        }
        return view('backend.category.create',['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $datas=[];
           $taxonomies=TaxonomyNews::where('parent',0)->orderby('id','desc')->get();
        
        foreach($taxonomies as $key=>$value){
        $datas[$key]['id']=$value->id;
        $datas[$key]['parent']=$value->parent;
        $datas[$key]['slug']=$value->slug;
        }
        return view('backend.category.create',['datas'=>$datas]);
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
                   
                    
                    $Taxonomy=new TaxonomyNews();
                    $Taxonomy->title=$request->input('title');
                    $string=$Taxonomy->title;
                    echo $string."<br>";
                    function convert($string){
                    $u=['ư','ứ','ừ','ử','ự','ữ','ú','ù','ủ','ũ','ụ','Ư','Ứ','Ứ','Ừ','Ử','Ự','Ú','Ù','Ủ','Ự','Ũ',];
                    $a=['á','ắ','ả','à','ạ','ả','ã','ă','ằ','ặ','ẵ','â','ấ','ầ','ẩ','ậ','ẫ','Á','À','Ạ','Ã','Ă','Ằ','Ặ','Ẵ','Â','Ấ','Ầ','Ẩ','Ậ','Ẫ'];
                    $o=['ó','ọ','ò','õ','ỏ','ơ','ớ','ở','ờ','ợ','ỡ','ô','ố','ổ','ồ','ộ','ỗ'
                        ,'Ó','Ọ','Ò','Õ','Ỏ','Ơ','Ớ','Ở','Ờ','Ợ','Ỡ','Ô','Ố','Ồ','Ổ','Ộ','Ỗ'
                    ];
                    $d=['đ','Đ'];
                    $e=['ê','ế','ề','ể','ệ','ễ','é','è','ẻ','ẹ','ẽ'];
                    $y=['ý','ỷ','ỳ','ỵ','ỹ','Ý','Ỷ','Ỳ','Ỵ','Ỹ'];
                    $i=['í','ỉ','ì','ĩ','ị','Í','Ỉ','Ì','Ĩ','Ị'];
                    $s=['---','--','- ','- ','_','%',',','.','/','  ','%20'];
                    $space=['"',"'"];
                    $convert='';
                    $convert=str_replace($u,'u',$string);
                    $convert=str_replace($a,'a',$convert);
                    $convert=str_replace($o,'o',$convert);
                    $convert=str_replace($e,'e',$convert);
                    $convert=str_replace($d,'d',$convert);
                    $convert=str_replace($y,'y',$convert);
                    $convert=str_replace($i,'i',$convert);
                    $string =str_replace( "ß", "ss", $string);
                    $convert=str_replace($s,'-',$convert);
                    $convert=str_replace($space,' ',$convert);
                    return $convert;
                    }
                    $con= convert($string);
                    $slug=str_slug($con,'-');
                    $Taxonomy->slug=$slug;
                    $Taxonomy->title=$request->input('title');
                    $Taxonomy->description=$request->input('description');
                    if($request->parent==''){
                        $Taxonomy->parent==0;
                    }else{
                    $Taxonomy->parent=$request->parent;
                    }
                    $Taxonomy->save();
                    return redirect('/admin');
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
        //
    }
}
