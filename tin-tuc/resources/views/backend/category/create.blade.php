<?php
$backend=asset('backend');
?>
@extends('backend.layouts.master')
@section('main-content')
<script>
$(document).ready(function(){
    $(".delete").click(function(){
        $(".delete_form").submit();
    });
});
</script>
<section id="main-content">

          <section class="wrapper">
          	<h1>Categories</h1>
              <div class="row">
                  <div class="col-lg-7 main-chart">
                  	<?php 
                  	// echo '<pre>';
                  	// var_dump($errors->get('title'));
                  	?>     	
					<form action="{{route('category.store')}}" method="post" accept-charset="utf-8">
						{{csrf_field()}}
						<label for="">Title</label><br>
						@if($errors->get('title'))
                  		@foreach($errors->get('title') as $value)
                  		{{$value}}
                  		@endforeach
                  		@endif
						<input type="text" name="title" class='col-xs-12'>
						<br>
						<label for="">Description</label>
						<input type="text" name="description" class='col-xs-12'><br>
							<?php 
						// echo "<pre>";
						// var_dump($datas['category']);
						// $key=0;
						// foreach($datas['category'] as $key => $value){
						// 	echo $datas['category'][$key]->title."<br>";
						// 	$key++;
						// }
						?>
						<select name="parent">
							<option value="0">Parents</option>
							@foreach($datas['category'] as $value)
							<option value="{{$value->id}}">{{$value->title}}</option>
							@endforeach
						</select><br>

						<input class='btn btn-default' type="submit" name="sb" value="Thêm Mới">
					</form>
					<?php
				// echo "<pre>";
				// var_dump($datas['category']);
			?>

			</div>
			
			<div class='col-lg-5'>
			
				<ul class='category'>
				<h3>Danh Mục</h3>
				<?php $i=0;

				?>
				{!!\Modules::SideBar()!!}
			</div>
			<?php
			
			// echo '<pre>';
			// $categories=array(
			// 	0=>array(
			// 	'id'=>1,
			// 	'title'=>'Tin-Tuc',
			// 	'parent_id'=>0,
			// 	),
			// 	1=>array(
			// 	'id'=>2,
			// 	'title'=>'Bong-Da',
			// 	'parent_id'=>1,
			// 	),
			// 	2=>array(
			// 	'id'=>3,
			// 	'title'=>'Bong-Da-VN',
			// 	'parent_id'=>2,
			// 	),
			// 	3=>array(
			// 	'id'=>4,
			// 	'title'=>'JAV',
			// 	'parent_id'=>0,
			// 	),
			// 	4=>array(
			// 	'id'=>4,
			// 	'title'=>'Điền Kinh',
			// 	'parent_id'=>1,
			// 	),
			// 	);
			
			
				// foreach($array as $key=>$value){
				// 	 $value['parent'];
				// 	 if($value['parent']==0){
				// 	 	$parents[]=$value;
				// 	 	unset($array[$key]);
				// 	 	echo "<ul><li>".$value['name'].'<br>';
				// 	 }
				// 	 foreach($parents as $parent){
				// 	 	if($parent['id']==$value['parent']){
				// 	 		echo "<ul><li>".$value['name']."<li></ul></li></ul>";
				// 	 	}
				// 	 }
				// }
				// var_dump($parents);

				// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
			// <i class="fa fa-pencil " style="float:right;margin-right: 10px;" aria-hidden="true"></i>
   //          <form class='form-del' style="float: right;" class='col-lg-2' action="/admin/category/{{$item['id']}}" method="POST">
   //  						<input type="hidden" name="_method" value="DELETE">
   //  						<input type="hidden" name="_token" value="{{ csrf_token() }}">
    					
   //  						<input class='delete' type="submit" onclick="return(confirm('Bạn có chắc muốn xóa'))" value='X'>
    						
   //  						</form>

			?>

</div>
</section>
@endsection