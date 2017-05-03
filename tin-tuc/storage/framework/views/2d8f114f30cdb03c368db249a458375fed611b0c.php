<?php
$backend=asset('backend');
?>

<?php $__env->startSection('main-content'); ?>
<section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
	<form action="route('category.create')" method="post" accept-charset="utf-8">
		<input type="text" name="title">
		<input type="text" name="noidung">
		<input type="submit" name="sb" value="Thêm Mới">
	</form>
	<?php
	$string='Ở đây có vấn đề nhỏ là Ad đang hơi đặt GAM vs TSM ngang cơ nhau quá đây. Tui cx hi vọng vào kì tích lắm nhưng k nên để 2 đội gần nhau nhiều để mọi người lại cảm thấy là team Việt ngang vs team Bắc Mỹ mà chỉ xem nếu win đc thì là điều kì diệu thôi, vì cứ mấy thời điểm quan trọng là các đội Việt ta lại thường gây thất vọng mak. Nói chung là vẫn ủng hộ GAM.';
      
        function convert($string){
            $a=['Á','Ả','À','Ã','Ạ','Ă','Ắ','Ằ','Ẳ','Ặ','Ẵ','Â','Ấ','Ầ','Ẩ','Ậ','Ẫ','á','à','ả','ã','ạ','ă','ằ','ẳ','ắ','ẵ','ặ','â','ầ','ẩ','ậ','ẩ','ấ','ẫ'];
            $d=['Đ','đ'];
            $u=['Ú','Ủ','Ù','Ũ','Ụ','Ư','Ứ','Ừ','Ự','Ữ','Ử','ú','ủ','ù','ụ','ũ','ư','ứ','ừ','ử','ự','ữ'];
            $o=['Ơ','Ớ','Ở','Ờ','Ỡ','Ợ','ơ','ớ','ở','ờ','ỡ','ợ','Ó','Ỏ','Ò','Ọ','Õ','ó','ò','ỏ','ọ','õ','Ô','Ố','Ổ','Ồ','Ộ','ô','ộ','ồ','ố','ổ','ỗ'];
            $e=['É','Ẻ','È','Ẹ','Ẽ','é','ẻ','è','ẹ','ẽ','Ê','Ế','Ể','Ề','Ệ','Ễ','ê','ế','ể','ề','ệ','ễ'];
            $y=['Ý','Ỷ','Ỳ','Ỹ','Ỵ','ý','ỷ','ỳ','ỵ','ỹ'];
            $i=['Í','Ỉ','Ì','Ị','Ĩ','í','ì','ỉ','ĩ','ị'];
            $s=['%','"',"'",'--','---','- ',' -',' - ','/',',','%20'];
            $space=['  ','   ',''];
            $convert=str_replace($a,'a',$string);
            $convert=str_replace($d,'d',$convert);
            $convert=str_replace($o,'o',$convert);
            $convert=str_replace($e,'e',$convert);
            $convert=str_replace($u,'u',$convert);
            $convert=str_replace($i,'i',$convert);
            $convert=str_replace($y,'y',$convert);
            $convert=str_replace($s,'-',$convert);
            $convert=str_replace($space,' ',$convert);
            return strtolower($convert);
        }
        $con=convert($string);
        $slug=str_slug($con,'-');
        echo $slug;
	?>
</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>