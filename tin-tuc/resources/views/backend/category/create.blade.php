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
						<input type="text" name="title" class='col-xs-12 form-control'>
						<br>
						<label for="">Description</label>
						<input type="text" name="title" class='col-xs-12 form-control'><br>
							<?php 
						// echo "<pre>";
						// var_dump($datas['category']);
						// $key=0;
						// foreach($datas['category'] as $key => $value){
						// 	echo $datas['category'][$key]->title."<br>";
						// 	$key++;
						// }
						?>
						 <label for="sel1">Chuyên Mục Cha:</label>
						<select name="parent" class="form-control" id='sel1'>
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
			?>

</div>
</section>
@endsection