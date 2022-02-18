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
                <li>Đổi Password</li>
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
        <h1 class="entry-title2"><span>Đổi mật khẩu</span> </h1>
        <hr>
       
            <form action="{{url('user/changePassword/update/'.Auth::user()->id)}}" class="form-horizontal" method="post" name="signup" id="signup" enctype="multipart/form-data" > 
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">      

              <div class="form-group">
                <label class="control-label col-sm-4">Mật khẩu mới<span class="text-danger">*</span></label>
                <div class="col-md-5 col-sm-8">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control password" name="password" id="password" placeholder="Choose password (5-15 chars)" value="">
                 </div>   
                </div>
              </div>
             
              <div class="form-group">  
                <label class="control-label col-sm-4">Nhập lại mật khẩu mới<span class="text-danger">*</span></label>
                <div class="col-md-5 col-sm-8">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control password" name="cpassword" id="cpassword" placeholder="Confirm your password" value="">
                  </div>  
                </div>
              </div>
          
              <div class="form-group">
                <div class="col-xs-offset-4 col-xs-10">
                  <input name="Submit" type="submit" value="Cập nhật" class="btn btn-warning">
                </div>
              </div>  
      </form>
    </div>
    <div class="clearfix"></div>
</div>
<br>
@endsection
@section('script')
  
@endsection
  
