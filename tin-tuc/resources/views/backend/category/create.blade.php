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
		<select name="parent">
			<option value="0">Parent</option>
			@foreach($datas as $value)
			<option value="{{$value['id']}}">{{$value['title']}}</option>
			@endforeach
		</select><br>
		<input type="submit" name="sb" value="Thêm Mới">
	</form>
		
</div>
</div>
</section>
@endsection