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
                <li>Đơn hàng</li>
              </ul>
             </div>

        </div>
     <!--//w3_short-->
  </div>
</div>
<br>
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
    <div class="container col-md-8 tablecart">
       <h1 class="entry-title2"><span>Danh sách đơn hàng</span> </h1>
       <hr>
      <table class="table table-bordered ">
        <tr> 
          <th>Mã</th>
          <th>Ngày đặt</th>
          <th>Địa chỉ nhận </th>
          <th>Trạng thái</th>
          <th>Chi tiết</th>
          <th>Delete</th>
          <th>Excel</th>
        </tr>
        @foreach ($bills as $bill)
        <tr class="content table-hover">
          <td>{{$bill->id}}</td>
          <td>{{ date('d.m.Y H:i:s', strtotime($bill->created_at)) }}</td>
          <td>{{$bill->address}}</td>
          <td>@if($bill->deleted_at != "") Đã hủy @elseif($bill->status == 0) Đang xử lí @else Thành công @endif</td>
          <td><a href="" class="btn btn-primary" role="dialog" data-toggle="modal" data-target="#myModal{{$bill->id}}"><i class="fa fa-star-o" style="color:white;"></i>&nbsp;View</a> </td>
          <td >@if($bill->status == 1) 
                <i class="fa fa-check" style="color:blue; margin-top: 10px"></i>
            @elseif ($bill->deleted_at != "")
               <i class="fa fa-close" style="color:red; margin-top: 10px"></i>
              @else
                <a class="btn btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o" style="color:white;"></i> &nbsp;Delete</a>
              @endif
          </td>
          <td><a href="{{url('bills/'.$bill->id.'/export')}}" class="btn btn-warning">Export </a></td>
        </tr>
        @endforeach
        @if(!$bills->isEmpty())
        <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form action="{{url('user/deleteBill/'.$bill->id)}}" method="get">
                {{method_field('delete')}}
                {{csrf_field()}}
              <div class="modal-body">
              <p class="text-center">
                Bạn có chắc là muốn xóa đơn hàng này không
              </p>
                  <input type="hidden" name="id" id="id" value="{{$bill->id}}">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
              </div>
            </form>
          </div>
        </div>
        </div>
        @endif
      </table>
       <div class="row">{{$bills->links()}}</div>
    </div>
    <div class="clearfix"></div>
</div>
@foreach ($bills as $bill)

<div class="modal fade" id="myModal{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$bill->id}}"
  aria-hidden="true">
  <div class="container">
    <div id="content">
      <div id="update">
        <div class="container">
          
          <div class="table-responsive">
            <div class="modal-preview">
            <!-- Shop Products Table -->

            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
              <br>
              <span style="text-align: center; margin-left: 450px; font-size: 30px; color:#FF6C6C;">CHI TIẾT ĐƠN HÀNG</span>
              <hr>
              <thead>
                <tr>
                  <th class="product-quantity">STT</th>
                  <th class="product-name">Tên bánh</th>
                  <th class="product-quantity">Số lượng</th>
                  <th class="product-price">Thành Tiền</th>
                </tr>
              </thead>
              <?php $count=1;?>
              @foreach($billdetails as $billdetail)
              @if (($billdetail->bill_id) == ($bill->id))
              <tbody style="background-color: #ffffff!important">
              
                <tr class="cart_item">
                  <td class="product-quantity">
                    <span class="amount">{{$count}}</span>
                  </td>
                  <td class="product-name">
                    <div class="media">
                      <img class="pull-left" src="source/image/product/{{$billdetail->product->image}}" width="100px" alt="">
                      <div class="media-body">
                        <p class="font-large table-title">{{$billdetail->product->name}}</p>
                        <p class="font-large table-title">{{number_format($billdetail->unit_price)}}</p>
                      </div>
                    </div>
                  </td>

                  <td class="product-quantity">
                    <span class="amount">{{$billdetail->quantity}}</span>
                  </td>
                  
                  <td class="product-price">
                    <span class="amount">{{number_format($billdetail->unit_price*$billdetail->quantity)}}</span>
                  </td>
                
                </tr>
              </tbody>
              <?php $count++; ?>
              @endif
              @endforeach
              <tfoot>
                <tr>
                  <td colspan="6" class="actions" style="text-align: right;">
                    <label>Total: </label>
                    <a type="submit" class="btn btn-warning" name="proceed" id="footersum">{{number_format($bill->total)}} </a>

                </tr>
              </tfoot>
            </table>
            <!-- End of Shop Table Products -->
          </div>
        </div>
        </div>
    </div>

    </div> <!-- #content -->
    </div> <!-- .container -->

</div>
@endforeach
<br>
<br>
<br>
<br>
@endsection