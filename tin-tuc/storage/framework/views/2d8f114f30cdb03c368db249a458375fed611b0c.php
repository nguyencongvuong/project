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
		<select name="parent">
			<option value="0">Parent</option>
			<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($value['id']); ?>"><?php echo e($value['title']); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select><br>
		<input type="submit" name="sb" value="Thêm Mới">
	</form>
		
</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>