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
					<form action="{{url('')}}/admin/category/{{$id}}" method="post" accept-charset="utf-8">
					{{csrf_field()}}
					
						<label for="">Title</label>

						<input type="text" name="title" class='col-xs-12 form-control' value='{{$category['title']}}'><br>
						<label for="">Description</label>
						<input type="text" name="title" class='col-xs-12 form-control' value="{{$category['description']}}" class='col-xs-12'><br>
						<input type="hidden" name="_method" value="PUT">
    					
							<?php 
						// echo "<pre>";
						// var_dump($datas['category'][0]);
						// $key=0;
						// foreach($datas['category'] as $key => $value){
						// 	echo $datas['category'][$key]->title."<br>";
						// 	$key++;
						// }
						// var_dump($parent);
						?>
						<label for="sel1">Chuyên Mục Cha:</label>
						<select name="parent" class="form-control">
							<option value="0">Parent</option>
							@foreach($datas['category'] as $value)
								@if($value->id!=$id)
								<option style="font-weight: bold;font-size: 15px" value="{{$value->id}}" @if($value->id==$category['parent']) selected @endif >{{$value->title}}</option>
								@endif
							@endforeach
							
						</select><br>

						<input class='btn btn-default' type="submit" name="sb" value="Thêm Mới">
					</form>
					<?php
				// echo "<pre>";
				// var_dump($datas['category']);
			?>

			</div>
			
			
</div>
</section>
@endsection