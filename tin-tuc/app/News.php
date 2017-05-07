<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TaxonomyNews;
use Carbon\Carbon;
class News extends Model
{	
	use SoftDeletes;
    protected $table='news';
    protected $primarykey='id';
    protected $dates = ['deleted_at'];
   public function __construct(){
    parent::__construct();
    $tg=strtotime(carbon::now());
    $time_empty=config("app.time_empty");
    $time=$tg-$time_empty;
    $date=date('Y-m-d H-i-s',$time);
    $this->withTrashed()->whereNotNull('deleted_at')->where('deleted_at','<',$date)->forceDelete();
    }
    public static function GetCategoryName($limit){
    	$datas=News::orderby('created_at','desc')->where('deleted_at',null)->get();
    	foreach($datas as $key=> $value){
    	$datas[$key]['category']=TaxonomyNews::where('id',$value['chuyenmuc'])->where('deleted_at',null)->get();
    	}
    	return $datas;
    }
    public static function TrashCategoryName($limit){
    	$datas=News::withTrashed()->orderby('created_at','desc')->whereNotNull('deleted_at')->get();
    	foreach($datas as $key=> $value){
    	$datas[$key]['category']=TaxonomyNews::where('id',$value['chuyenmuc'])->where('deleted_at',null)->get();
    	}
    	return $datas;
    }

}
