<?php
namespace App\Modules\SideBar\Controllers;
use App\TaxonomyNews;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{
	
	public function index()
	{
		// ModuleOne is the module name and dummy is the blade file
		// you can specify ModuleOne::someFolder.file if your file exists
		// inside a folder. Also the blade will use the same syntax i.e.
		// ModuleName::viewName
		$result=DB::table('taxonomy_news')->get();
			$categories=json_decode(json_encode($result), true);

		return view('SideBar::view',['datas'=>$categories]);
	}
	
}
?>