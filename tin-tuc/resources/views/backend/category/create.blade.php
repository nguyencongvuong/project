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
				@foreach($datas['category'] as $value)
					<li >
					<div class='col-lg-6'>{{$value['title']}}</div>
						<span class='col-lg-3'>
								<a href="category/{{$value->id}}/edit" title="" class='edit '><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</span>
						<form class='form-del col-lg-3' action="/admin/category/{{$value->id}}" method="POST">
    						<input type="hidden" name="_method" value="DELETE">
    						<input type="hidden" name="_token" value="{{ csrf_token() }}">
    					
    						<input class='delete' type="submit" onclick="return(confirm('Bạn có chắc muốn xóa'))" value='X'>
    						
    						</form>

						<ul>
							
							@foreach($value['children'] as $children)
							
							<li class='col-lg-6'>{{$children->title}}
							
							
							<!-- <button class='btn-delete' onclick="return(confirm('Bạn có chắc muốn xóa'))" type="submit" form="delete" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button> -->
							
							</li>

							<span class='col-lg-3'>
								<a href="category/{{$children->id}}/edit" title="" class='edit '><i class="fa fa-pencil" aria-hidden="true"></i></a>
							</span>
							
							<form class='form-del' class='col-lg-3' action="/admin/category/{{$children->id}}" method="POST">
    						<input type="hidden" name="_method" value="DELETE">
    						<input type="hidden" name="_token" value="{{ csrf_token() }}">
    					
    						<input class='delete' type="submit" onclick="return(confirm('Bạn có chắc muốn xóa'))" value='X'>
    						
    						</form>
							
							
							@endforeach
						</ul>
					</li>
				@endforeach
				</ul>
			</div>
			<?php
			
			echo '<pre>';
			$categories=array(
				0=>array(
				'id'=>1,
				'title'=>'Tin-Tuc',
				'parent_id'=>0,
				),
				1=>array(
				'id'=>2,
				'title'=>'Bong-Da',
				'parent_id'=>1,
				),
				2=>array(
				'id'=>3,
				'title'=>'Bong-Da-VN',
				'parent_id'=>2,
				),
				3=>array(
				'id'=>4,
				'title'=>'JAV',
				'parent_id'=>0,
				),
				4=>array(
				'id'=>4,
				'title'=>'Điền Kinh',
				'parent_id'=>1,
				),
				);
			


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
function showCategories($categories, $parent_id = 0, $char = '', $stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        if ($stt == 0){
            // là cấp 1
        }
        else if ($stt == 1){
            // là cấp 2
        }
        else if ($stt == 2){
            // là cấp 3
        }
         
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>'.$item['title'];
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---', $stt++);
            echo '</li>';
        }
        echo '</ul>';
    }
}
		echo showCategories($categories);
	
			?>

</div>
</section>
@endsection