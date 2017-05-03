<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
