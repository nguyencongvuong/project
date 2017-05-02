<?php
$backend=asset('backend');
?>
@extends('backend.layouts.master')
@section('main-content')
<section id="main-content">
          <section class="wrapper">

              	<div class="row">
                  <div class="col-lg-9 main-chart">
					<form action="/admin/category" method="post" accept-charset="utf-8">
					{{csrf_field()}}
						<label>Title</label>
						<input type="text" name="title" class='col-xs-12'><br>
						<label>Description</label>
						<input type="text" name="description" class='col-xs-12'><br>
						<input type="submit" name="sb" value="Thêm Mới">
						<?php
						// var_dump($datas);
						?>
						<select name='parent'>

							<option value="0">Parents</option>
							@foreach($datas as $value)
								<option value="{{$value['id']}}">{{$value['slug']}}</option>
							@endforeach
						</select>

					</form>
				<?php

				?>
					
					
				</div>
				<div class='col-lg-3 right-sidebar'>

				</div>
</div>
</section>
@endsection