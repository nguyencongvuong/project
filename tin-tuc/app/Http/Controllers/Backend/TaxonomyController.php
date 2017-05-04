<?php

namespace App\Http\Controllers\Backend;
use Validator;
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
        
    }
  
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas=$this->datas();
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
        $rules= [
        'title' => 'required|max:255',
        ];
        $messages = [
        'title.required'=> 'Bạn Không Được Để Trống',
        'size'    => 'The :attribute must be exactly :size.',
        'between' => 'The :attribute must be between :min - :max.',
        'in'      => 'The :attribute must be one of the following types: :values',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $string=$request->title;
        $con=\func::ConvertString($string);
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
        return view('backend.category.edit')->with(['id'=>$id,'datas'=>$datas,'category'=>$category]);
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
        $string=$request->input('title');
        $con=\func::ConvertString($string);
        $slug=str_slug($con,'-');
        $update=TaxonomyNews::find($id);
        $update->parent=$request->parent;
        $update->title=$request->input('title');
        $update->slug=$slug;
        $update->description=$request->input('description');
        $update->save();
        return redirect()->route('category.create');
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
