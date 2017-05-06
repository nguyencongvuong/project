
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
                  	?>
                  	@if(!isset($datas))
                  	<?php  
                  	$flag=false; 
                  	$datas=[];
                  	$datas[0]['noidung']='';
                  	$datas[0]['tieude']='';
                  	$datas[0]['mota']='';
                  	$datas[0]['chuyenmuc']='';
                  	?>
                  	@endif   	
					<form @if(isset($flag)) action="{{route('news.store')}}" @else action="{{url('')}}/admin/news/{{$id}}" @endif id="form_create" method="POST" accept-charset="utf-8">
					{{csrf_field()}}	
						<h3>Title</h3>
						@foreach($datas as $value)
						<input type="text" name="title" class='col-xs-12 form-control' value="{{$value['tieude']}}"><br>
						<h3>Description</h3>
						<input type="text" name="description" value="{{$value['mota']}}" class='col-xs-12 form-control'><br>
						<h3>Content</h3>
						@if(!isset($flag))
							<input type='hidden' name="_method" value="PUT"/>
						@endif
						<textarea id="content" name='content' >{!!$value['noidung']!!}</textarea>
					@ckeditor('content')	
			<?php
			?>
			</div>
			<div class="col-lg-3">
			<h1>Chuyên Mục</h1>
			<?php
				$categories=App\TaxonomyNews::OrderBy('created_at','desc')->get();
			function dequy($array,$parent=0,$check){
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
				?>
				<input type="checkbox" name="category" <?php if($c['id']==$check){echo "checked";}?>  value="{{$c['id']}}">{{$c['title']}}</li>
				<?php
				dequy($array,$c['id'],$check);
				echo "</ul>";
				unset($child[$key]);
			}	
		}
	}
			dequy($categories,$parent=0,$check=$value['chuyenmuc']);
			?>
			@endforeach
			</div>
			
	</div>

	<button type='submit' name='submit' value='1' class="btn btn-default">Post & Publish</button>

	<button type='submit' name='submit' value="2" class="btn btn-default">Post & Draft</button>

	</form>
	
</section>
@endsection
