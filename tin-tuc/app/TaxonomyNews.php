<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TaxonomyNews extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['parent'];
    protected $table='taxonomy_news';
    protected $dates = ['deleted_at'];
    public static function parents(){
    	$flight=TaxonomyNews::all();
    	return TaxonomyNews::withTrashed()->get();;
    	// if($flight->trashed()){
    	// 	return "hello";
    	// }
    }

}
