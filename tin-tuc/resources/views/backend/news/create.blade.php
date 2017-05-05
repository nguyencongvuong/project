
@extends('backend.layouts.master')
@section('main-content')
<section id="main-content">

          <section class="wrapper">
          	<h1>Categories</h1>
              <div class="row">
                  <div class="col-lg-9 main-chart">
                  	<?php 
                  	// echo '<pre>';
                  	// var_dump($errors->get('title'));
                  	?>     	
					<form action="create_submit" method="POST" accept-charset="utf-8">
						<label>Title</label>
						<input type="text" name="title" class='col-xs-12'><br>
						<label>Content</label>
						<textarea id="addnew"></textarea>

					@ckeditor('addnew')
					</form>
					<?php
				// echo "<pre>";
				// var_dump($datas['category']);
			?>

			</div>
			
			<div class='col-lg-3'>
			
				<ul class='category'>
				<h3>Danh Mục</h3>
				<?php $i=0;

				?>
				{!!\Modules::SideBar()!!}
			</div>
			

</div>
</section>
@endsection
