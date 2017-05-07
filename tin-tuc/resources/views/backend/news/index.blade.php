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
	                  	  	  @if(session('news'))<div class='btn alert-success'><i class="fa fa-angle-right"></i> {{session('news')}} </div>@endif
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th class='col-md-4'><i class="fa fa-bullhorn"></i> Tiêu Đề</th>
                                  <th class="hidden-phone col-md-4"><i class="fa fa-question-circle"></i> Mô Tả</th>
                                  <th><i class="fa fa-bookmark"></i> Chuyên Mục</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $datas= json_decode($datas,true);
                              ?>
                              @foreach($datas as $key=>$value)
                              <tr>
                                  <td><a href="basic_table.html#">{{$value['tieude']}}</a></td>
                                  <td class="hidden-phone">{{$value['mota']}}</td>
                                  <td><?php echo ($value['category'][0]['title'])?> </td>
                                  <td>@if($value['status']==1)<span class="label label-info label-mini">publish</span>
                                  @elseif($value['status']==2)
                                  	<span class="label label-danger">Draft</span>
									@else
									<span class="label label-warning ">waiting</span>
                                  @endif</td>
                                  <td>
                                  <form id='edit' action='' method='get'>
                                  {{csrf_field()}}
                                  	
                                  </form>
                                  <form id='delete' action='' method='post'>
                                  {{csrf_field()}}
                                  		<input type='hidden' name="_method" value="delete"/>
                                  </form>
                                 
                                      <button class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs" formaction='{{url("")}}/admin/news/<?php echo $value["id"];?>/edit' form='edit'><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs" formaction='{{url("")}}/admin/news/<?php echo $value["id"];?>' form='delete' 
                                      onclick="return(confirm('Bạn có chắc chắn xóa bài viết này không?'));"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
    	</section>
</section>
@endsection
