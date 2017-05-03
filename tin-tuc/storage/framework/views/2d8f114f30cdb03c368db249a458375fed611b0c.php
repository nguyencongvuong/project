<?php
$backend=asset('backend');
?>

<?php $__env->startSection('main-content'); ?>

<section id="main-content">

          <section class="wrapper">
          	<h1>Categories</h1>
              <div class="row">
                  <div class="col-lg-9 main-chart">
	<form action="<?php echo e(route('category.store')); ?>" method="post" accept-charset="utf-8">
	<?php echo e(csrf_field()); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>