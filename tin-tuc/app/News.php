<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TaxonomyNews;
class News extends Model
{
    protected $table='news';
    protected $primarykey='id';
    public static function GetCategoryName($limit){

    	$datas=News::orderby('created_at','desc')->get();
    	foreach($datas as $key=> $value){
    	$datas[$key]['category']=TaxonomyNews::where('id',$value['chuyenmuc'])->get();
    	}
    	return $datas;
    }
}
