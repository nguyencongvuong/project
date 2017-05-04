<?php 
/*
|--------------------------------------------------------------------------
| ModuleOne Module Routes
|--------------------------------------------------------------------------
|
| All the routes related to the ModuleOne module have to go in here. Make sure
| to change the namespace in case you decide to change the 
| namespace/structure of controllers.
|
*/
Route::group(['prefix' => 'admin', 'namespace' => 'App\Modules\SideBar\Controllers'], function () {
	// Route::get('/category/create', ['as' => 'sidebar.index', 'uses' => 'IndexController@index']);
	
});