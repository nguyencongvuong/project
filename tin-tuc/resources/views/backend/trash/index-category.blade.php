@extends('backend.layouts.master')
@section('main-content')
<section id="main-content">
        <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Danh Sách Bài Viết</h3>
          <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <a href="{{route('news.create')}}"><button type="button" class="btn btn-primary active">Thêm Bài Mới</button></a>
	                  	  	  @if(session('news'))
                            <div class='btn alert-success'><i class="fa fa-angle-right"></i> {{session('news')}} 
                            </div>
                            @endif
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th class='col-md-4'><i class="fa fa-bullhorn"></i> Tiêu Đề</th>
                                  <th class="hidden-phone col-md-4"><i class="fa fa-question-circle"></i> Mô Tả</th>
                                  <th><i class="fa fa-bookmark"></i> Chuyên Mục</th>
                                  <th><i class=" fa fa-edit"></i> Ngày Xóa</th>
                                  <th>
                                   <form id='delete' name="category_delete" action='' method='post'>
                                      {{csrf_field()}}
                                      <input type='hidden' name="_method" value="delete"/>
                                      <input type='hidden' name="url_old" value="category"/>
                                  </form>
                                  <button class="btn btn-danger btn-md" formaction='{{url("")}}/admin/trash/all' form='delete' 
                                      onclick="return(confirm('Bạn có chắc chắn muốn làm rỗng thùng rác không? Bạn sẽ không thể lấy lại dữ liệu khi thực hiện thao tác này'));"><i class="fa fa-trash-o "></i></button>
                                  </th> 
                              </tr>

                              </thead>
                              <tbody>
                              <?php
                              // echo "<pre>";
                              // var_dump($datas);
                              // die();
                              $datas= json_decode($datas,true);
                              // ;
                              ?>
                              @if($datas)
                              @foreach($datas as $key=>$value)
                              <?php 
                              ?>
                              <tr>
                                 <td><a href="basic_table.html#">{{$value['title']}}</a></td>
                                 <td class="hidden-phone">{{$value['description']}}</td>
                                 <td><?php echo ($value['parent_name']['title'])?> </td>
                                 <td><?php echo date("H:i:s d:m:Y",strtotime($value['deleted_at']));?></td>
                                 <td>
                                 <form id='edit' action='' method='get'>
                                  {{csrf_field()}}
                                  	
                                  </form>
                                  <form id='delete' action='' method='post'>
                                  {{csrf_field()}}
                                  		<input type='hidden' name="_method" value="delete"/>
                                  		<input type='hidden' name="url_old" value="{{request()->path()}}">
                                  </form>
                                 
                                      <button class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs" formaction='{{url("")}}/admin/news/<?php echo $value["id"];?>/edit' form='edit'><i class="fa fa-retweet" aria-hidden="true"></i></button>
                                      <button class="btn btn-danger btn-xs" form='delete' formaction='{{url("")}}/admin/trash/<?php echo $value["id"];?>' form='delete' 
                                      onclick="return(confirm('Bạn có chắc chắn xóa bài viết này không?'));"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                              @endforeach
                              @else
                             <td colspan="5">Thùng Rác Trống</td>
                              @endif
                              
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
    	</section>
</section>
@endsection
