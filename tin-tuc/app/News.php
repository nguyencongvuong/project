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
    public static function GetCategoryName($limit){
    	$datas=News::orderby('created_at','desc')->where('deleted_at',null)->get();
    	foreach($datas as $key=> $value){
    	$datas[$key]['category']=TaxonomyNews::where('id',$value['chuyenmuc'])->where('deleted_at',null)->get();
    	}
    	return $datas;
    }
}
