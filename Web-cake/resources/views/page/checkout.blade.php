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
								<li>Đặt hàng</li>
							</ul>
						 </div>

				</div>
	   <!--//w3_short-->
	</div>
</div>
	<div class="container">
		<div id="content">
			
			<form action="{{url('user/checkout')}}" method="post" class="beta-form-checkout" id="formCheckout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<div><h3 class="wthree_text_info">Xác nhận<span> đặt hàng</span>
			    			<div class="line-text"></div>
			    			</h3>	</div>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên <span class="text-danger">*</span></label>
							<input type="text" id="name" placeholder="Họ tên" value="{{Auth::user()->name}}" name="name" class="form-control">
						</div>
						<div class="form-block">
							<label>Giới tính <span class="text-danger">*</span></label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="1"  style="width: 10%" @if(Auth::user()->gender ==1) {{ "checked" }}
            				@endif><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="0" style="width: 10%" @if(Auth::user()->gender ==0) {{ "checked" }}
            				@endif><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email <span class="text-danger">*</span></label>
							<input type="email" id="email" required placeholder="" value="{{Auth::user()->email}}" name="email" disabled="">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
							<input type="text" id="adress" placeholder="" value="{{Auth::user()->address}}"  name="address" class="form-control">
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại <span class="text-danger">*</span></label>
							<input type="text" id="phone" value="{{Auth::user()->phone}}"  name="phone" class="form-control">
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú <span class="text-danger">*</span></label>
							<textarea id="notes"  placeholder="Nhập thời gian giao nhận ở đây" name="note" class="form-control"></textarea>
							
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										@foreach($content as $item)
										<div class="media">
											<img width="25%" src="source/image/product/{{$item->options->has('img')?$item->options->img:''}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$item->name}}</p>
												<span class="color-gray your-order-info">Số lượng: {{$item->qty}}</span>
												<span class="color-gray your-order-info">Đơn giá: {{number_format($item->price)}}</span>
												<span class="color-gray your-order-info">Thành tiền: {{number_format($item->subtotal)}}</span>
												
											</div>
										</div>
										@endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Cart::subtotal(0,'.',',')}}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123456789908
											<br>- Chủ TK: Phan Thanh Hùng
											<br>- Ngân hàng VietComBank, Chi nhánh Đà Nẵng
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button type="submit "class="beta-btn primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection