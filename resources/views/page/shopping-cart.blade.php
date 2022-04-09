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
								<li>Giỏ hàng</li>
							</ul>
						 </div>

				</div>
	   <!--//w3_short-->
	</div>
</div>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left"><br>
				<h3 class="wthree_text_info">Shopping <span>Cart</span>
			    			<div class="line-text"></div>
			    			</h3>	
			</div>
			
	</div>

		<div class="container">
		<div id="content">
			<div id="update">
				<div class="container">
			<div class="table-responsive">
				<!-- Shop Products Table -->
				
				<table class="shop_table beta-shopping-cart-table" cellspacing="0" id="tableId">
					<thead>
						<tr>
							<th class="product-name">Sản phẩm</th>
							<th class="product-price">Đơn giá</th>
							<th class="product-status">Ghi chú</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Thành tiền</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					@if(Cart::count()>0)
					
						@foreach($content as $item)
					<tbody id="pageCart" >
						<div>
						<tr class="cart_item" id="{{$item->rowId}}">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="source/image/product/{{$item->options->has('img')?$item->options->img:''}}" width="100px" alt="">
									<div class="media-body">
										<p class="font-large table-title">{{$item->name}}</p>
										<!-- <p class="table-option">Color: Red</p>
										<p class="table-option">Size: M</p> -->
										<a class="table-edit" >Mã số: {{$item->id}}</a>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount sub_amount">{{number_format($item->price)}}</span>
							</td>

							<td class="product-status">
								Bánh có sẵn
							</td>

							<td class="product-quantity">
								<input type="hidden" value="{{$item->rowId}}" id="rowID" name="{{$item->rowId}}"> 
								<input type="hidden" value="{{$item->id}}" id="proID" name="proID">
								<input type="number" size="2" value="{{$item->qty}}" id="newQty" class="newQty"
								autocomplete="off" style="text-align:center; max-width: 100px; " min="1" max="1000" >
							</td>
							
							<td class="product-subtotal" >
								<span class="amount total_sub_amount">{{number_format($item->subtotal)}}</span>
							</td>
							
							<td class="product-remove">
								<a style="cursor: pointer;" class="remove deletePageCartUpdate" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						</div>
					</tbody>
					
						@endforeach
					@endif

					<tfoot>
						<tr>
							<td colspan="6" class="actions">
								<a type="submit" href="{{url('index')}}" class="beta-btn primary" name="proceed">Tiếp tục mua hàng <i class="fa fa-chevron-right"></i></a>
								<a type="submit" href="{{url('user/checkout')}}" class="beta-btn primary" name="proceed">Xác nhận thông tin đặt hàng <i class="fa fa-chevron-right"></i></a>

						</tr>
					</tfoot>
				</table>
				<!-- End of Shop Table Products -->
				</div>
			</div>
		</div>


			<div class="table-responsive">
			<!-- Cart Collaterals -->
			<div class="cart-collaterals">
				<div style="margin-left: 8px;"> <img src="source/image/product/cart.png" width="65%">
				<div class="cart-totals pull-right" style="margin-top:50px;">
					<div class="cart-totals-row"><h5 class="cart-total-title">Cart Totals</h5></div>
					<div class="cart-totals-row"><span>Shipping:</span> <span>Next Step</span></div>
					<div class="cart-totals-row"><span>Order Total:</span> <span id="sum">{{Cart::subtotal(0,'.',',')}}</span></div>
				</div></div>
				
				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>
			</div>

		</div> <!-- #content -->
		</div> <!-- .container -->

@endsection

