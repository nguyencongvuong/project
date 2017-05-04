<?php
			$result=DB::table('taxonomy_news')->get();
			$categories=json_decode(json_encode($result), true);

	function showCategories($categories, $parent_id = 0, $char = '', $stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);

        }
        
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        if ($stt == 0){
            // là cấp 1
        }
        else if ($stt == 1){
            // là cấp 2
        }
        else if ($stt == 2){
            // là cấp 3
        }
         
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li class="col-lg-12">'.'<a href="'.url('').'/admin/category/'.$item['id'].'/edit">'.$item['title']."</a>";?> 
            <form class='form-del' style="float: right;" class='col-lg-2' action="/admin/category/{{$item['id']}}" method="POST">
    						<input type="hidden" name="_method" value="DELETE">
     						<input type="hidden" name="_token" value="{{ csrf_token() }}">
    					
    						<input class='delete' type="submit" onclick="return(confirm('Bạn có chắc muốn xóa'))" value='X'>
 						</form>
            <?php
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---', $stt++);
            echo '</li>';?>
            
            <?php
        }
        echo '</ul>';
    }
}
		echo showCategories($categories);
?>
<!--  -->