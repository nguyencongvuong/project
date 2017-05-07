@extends('backend.layouts.master')
@section('main-content')
<section id="main-content">
        <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Danh Sách Bài Viết</h3>
          <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <a href="{{route('news.index')}}"><button type="button" class="btn btn-primary active">Danh Sách Bài Viết</button></a>
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
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th> 
                                  <form id='delete' action='' method='post'>
                                  		{{csrf_field()}}
                                  		<input type='hidden' name="_method" value="delete"/>
                                  		<input type='hidden' name="url_old" value="news"/>
                                  </form>
                                  <button class="btn btn-danger btn-md" formaction='{{url("")}}/admin/trash/all' form='delete' 
                                      onclick="return(confirm('Bạn có chắc chắn muốn làm rỗng thùng rác không? Bạn sẽ không thể lấy lại dữ liệu khi thực hiện thao tác này'));"><i class="fa fa-trash-o "></i></button>
                                  </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $datas= json_decode($datas,true);
                              // var_dump($datas);
                              // die();
                              ?>
                              @if($datas)
                              @foreach($datas as $key=>$value)
                              <tr>
                                  <td><a href="basic_table.html#">{{$value['tieude']}}</a></td>
                                  <td class="hidden-phone">{{$value['mota']}}</td>
                                  <td>@if($value['category'])<?php echo ($value['category'][0]['title'])?>@endif </td>
                                  <td>@if($value['status']==1)<span class="label label-info label-mini">publish</span>
                                  @elseif($value['status']==2)
                                  	<span class="label label-danger">Draft</span>
									@else
									<span class="label label-warning ">waiting</span>
                                  @endif</td>
                                  <td>
                                  <form id='edit' action='' method='post'>
                                  {{csrf_field()}}
                                  	<input type="hidden" name="_method" value="PUT">
                                  </form>
                                  <form id='delete' action='' method='post'>
                                  {{csrf_field()}}
                                  		<input type='hidden' name="_method" value="delete"/>
                                  		<input type='hidden' name="url_old" value="news"/>
                                  </form>
                                 
                                      <button class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs" formaction='{{url("")}}/admin/trash/<?php echo $value["id"];?>' form='edit'><i class="fa fa-retweet"></i></button>
                                      <button class="btn btn-danger btn-xs" formaction='{{url("")}}/admin/trash/<?php echo $value["id"];?>' form='delete' 
                                      onclick="return(confirm('Bạn có chắc chắn xóa bài viết này không?'));"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                              @endforeach
                              @else
                              <tr><th colspan="5">Thùng Rác Trống</th></tr>
                              @endif

                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
    	</section>
</section>
@endsection
