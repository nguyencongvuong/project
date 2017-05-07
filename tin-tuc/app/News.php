<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TaxonomyNews;
class News extends Model
{	
	use SoftDeletes;
    protected $table='news';
    protected $primarykey='id';
    protected $dates = ['deleted_at'];
    public static function GetCategoryName($limit){
    	$datas=News::orderby('created_at','desc')->where('deleted_at',null)->get();
    	foreach($datas as $key=> $value){
    	$datas[$key]['category']=TaxonomyNews::where('id',$value['chuyenmuc'])->where('deleted_at',null)->get();
    	}
    	return $datas;
    }
    public static function TrashCategoryName($limit){
    	$datas=News::withTrashed()->orderby('created_at','desc')->whereNotNull('deleted_at',null)->get();
    	foreach($datas as $key=> $value){
    	$datas[$key]['category']=TaxonomyNews::where('id',$value['chuyenmuc'])->where('deleted_at',null)->get();
    	}
    	return $datas;
    }
}
