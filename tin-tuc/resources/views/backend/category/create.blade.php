<?php
$backend=asset('backend');
?>
@extends('backend.layouts.master')
@section('main-content')
<section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
	<form action="route('category.create')" method="post" accept-charset="utf-8">
		<input type="text" name="title">
		<input type="text" name="noidung">
		<input type="submit" name="sb" value="Thêm Mới">
	</form>
</div>
</div>
</section>
@endsection