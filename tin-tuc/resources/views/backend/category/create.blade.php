<?php
$backend=asset('backend');
?>
@extends('backend.layouts.master')
@section('main-content')

<section id="main-content">

          <section class="wrapper">
          	<h1>Categories</h1>
              <div class="row">
                  <div class="col-lg-9 main-chart">
	<form action="{{route('category.store')}}" method="post" accept-charset="utf-8">
	{{csrf_field()}}
		<label for="">Title</label>
		<input type="text" name="title" class='col-xs-12'><br>
		<label for="">Description</label>
		<input type="text" name="description" class='col-xs-12'><br>
		<?php 
		echo "<pre>";
		// var_dump($datas['category']['0']);
		$key=0;
		foreach($datas['category'] as $key => $value){
			echo $datas['category'][$key]->title."<br>";
			$key++;
		}
		?>

		<input type="submit" name="sb" value="Thêm Mới">
	</form>
		
</div>
</div>
</section>
@endsection