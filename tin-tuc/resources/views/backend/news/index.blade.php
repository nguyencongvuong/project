@extends('backend.layouts.master')
@section('main-content')
<section id="main-content">
        <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Danh Sách Bài Viết</h3>
          <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
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
                              @foreach($datas as $value)
                              <tr>
                                  <td><a href="basic_table.html#">{{$value['tieude']}}</a></td>
                                  <td class="hidden-phone">{{$value['mota']}}</td>
                                  <td>{{$value['chuyenmuc']}} </td>
                                  <td><span class="label label-info label-mini">Due</span></td>
                                  <td>
                                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
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
