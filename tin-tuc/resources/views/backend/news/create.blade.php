
@extends('backend.layouts.master')
@section('main-content')
<section id="main-content">
          <section class="wrapper">
    		<div class="page-header">
          	<h1>Tin Tức</h1>
			<div>
              <div class="row">
                  <div class="col-lg-9 main-chart">
	                 @if(session('thongbao'))
	                 <div class="alert alert-success">{{session('thongbao')}}</div>
	                 @endif
                  	<?php 
                  	// echo '<pre>';
                  	// var_dump($errors->get('title'));
                  	?>     	
					<form action="{{route('news.store')}}" id="form_create" method="POST" accept-charset="utf-8">
					{{csrf_field()}}	
						<h3>Title</h3>
						<input type="text" name="title" class='col-xs-12 form-control'><br>
						<h3>Description</h3>
						<input type="text" name="description" class='col-xs-12 form-control'><br>
						<h3>Content</h3>
						<textarea id="content" name='content'></textarea>
						
					@ckeditor('content')
			<?php	
				// echo "<pre>";
				// var_dump($datas['category']);
			?>
			</div>
			<div class="col-lg-3">
			<h1>Chuyên Mục</h1>
			<?php
				$categories=App\TaxonomyNews::OrderBy('created_at','desc')->get();
			function dequy($array,$parent=0){
		$child=[];
		foreach($array as $key=>$item){
			if($item['parent']==$parent){
				$child[]=$item;
				unset($array[$key]);
			}
			?>
		
			<?php
			foreach($child as $key=>$c){
				echo "<ul><li>";
				echo '<input type="checkbox" name="category" value="'.$c['id'].'">'.$c['title']."</li>";
				dequy($array,$c['id']);
				echo "</ul>";
				unset($child[$key]);
			}	
		}
	}
			dequy($categories);
			?>
			</div>
			
	</div>
	<button type='submit' class="btn btn-default">Post & Publish</button>
	</form>
</section>
@endsection
