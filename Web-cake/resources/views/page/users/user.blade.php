@extends('master')
@section('content')

<div class="page-head_agile_info_w3l">
    <div class="container">
      <h3>Sweet<span> Bakery</span></h3>
      <!--/w3_short-->
         <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

               <ul class="w3_short">
                <li><a href="{{url('index')}}">Trang chủ</a><i>|</i></li>
                <li>Profile </li>
              </ul>
             </div>

        </div>
     <!--//w3_short-->
  </div>
</div>
<div class="container mixcontainer">
    <div class="col-sm-4">
	 <div class="css-treeview">
                <h4>Profile</h4>
                <ul class="tree-list-pad">
                    <li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="{{url('user/'.Auth::user()->id)}}">Cập nhật thông tin</a></label>
                    </li>
                    <li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="{{url('user/changePassword/'.Auth::user()->id)}}">Đổi password</a></label>
                    </li>
                    <li><input type="checkbox" id="item-1" checked="checked" /><label for="item-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="{{url('user/previewCart')}}">Xem lại đơn hàng</a></label>
                    </li>
                   
                </ul>
            </div>
    </div>
    <div class="col-md-8">
      <section>      
        <h1 class="entry-title2"><span>Thông tin cá nhân</span> </h1>
        <hr>
       
            <form action="{{url('user/update/'.Auth::user()->id)}}" class="form-horizontal" method="post" name="signup" id="signup" enctype="multipart/form-data" > 
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
             <div class="form-group">
              <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
              <div class="col-md-8 col-sm-9">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                  <input type="email" class="form-control" name="email"  placeholder="Enter your Email ID" value="{{Auth::user()->email}}" disabled="">
                </div>
               </div>
            </div>          
              <div class="form-group">
                <label class="control-label col-sm-3">Họ tên<span class="text-danger">*</span></label>
                <div class="col-md-8 col-sm-9">
                  <input type="text" class="form-control" name="name" id="mem_name" placeholder="Enter your Name here" value="{{Auth::user()->name}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Địa chỉ<span class="text-danger">*</span></label>
                <div class="col-md-8 col-sm-9">
                  <input type="text" class="form-control" name="address" id="mem_name" placeholder="Vui lòng nhập địa chỉ" value="{{Auth::user()->address}}">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-3">Giới tính<span class="text-danger">*</span></label>
                <div class="col-md-8 col-sm-9">
                  <label>
                  <input name="gender" type="radio" value="1"
                  @if(Auth::user()->gender ==1)
                  {{ "checked" }}
                  @endif>
                  Male </label>
                     
                  <label>
                  <input name="gender" type="radio" value="0"
                  @if(Auth::user()->gender ==0)
                  {{ "checked" }}
                  @endif
                  >
                  Female </label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Điện thoại<span class="text-danger">*</span></label>
                <div class="col-md-5 col-sm-8">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control" name="phone" id="contactnum" placeholder="Vui lòng nhập số điện thoại" value="{{Auth::user()->phone}}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-offset-3 col-xs-10">
                  <input name="Submit" type="submit" value="Cập nhật thông tin" class="btn btn-warning">
                </div>
              </div>  
      </form>
    </div>
    <div class="clearfix"></div>
</div>
<br>
@endsection

