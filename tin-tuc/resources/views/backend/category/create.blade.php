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
					<form action="{{route('category.store')}}" method="post" accept-charset="utf-8">
					{{csrf_field()}}
						<label for="">Title</label>
						<input type="text" name="title" class='col-xs-12'><br>
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
</div>
</section>
@endsection