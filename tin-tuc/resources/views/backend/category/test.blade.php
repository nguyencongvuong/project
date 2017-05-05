
@component('backend.category.panel')
	@slot('heading')
  
    <?php
    // $link=request()->url();
    $link="http://vinnews.dev/admin/category/jav/sex/truongbienthai/MinhBeoAu Dam";
    function current_link($link){
    $str=str_replace(url('').'/','',$link);
    $ex=explode('/',$str);
    $string=implode('/',$ex);
   	foreach($ex as $key=>$value){
   		if($key<(sizeof($ex)-2)){
   			echo ucfirst($value.'/');
   		}else if($key <(sizeof($ex)-1)){
   			echo ucfirst($value);
   		}

   	}
   }
	
	
	?>
    @endslot
    @slot('content')
    Anh vuong dep trai huyen thoai

    @endslot
@endcomponent

