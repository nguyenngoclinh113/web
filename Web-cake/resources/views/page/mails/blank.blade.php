<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-sm-12 badge badge-secondary" style="font-size: 17px; color:red">Thông tin đặt hàng của bạn</div>
		<div class="col-sm-6">Tên người nhận:</div> <div class="col-sm-6" style="color:#15c;"> {{$bill->name}}</div>
		<div class="col-sm-6">Địa chỉ:</div> <div class="col-sm-6" style="color:#15c;"">{{$bill->address}}</div>
		<div class="col-sm-6">Số điện thoại:</div> <div class="col-sm-6" style="color:#15c;">{{$bill->phone}}</div>
		<div class="col-sm-6">Hình thức thanh toán:</div> <div class="col-sm-6" style="color:#15c;">{{$bill->payment}}</div>
		<div class="col-sm-6">Thời gian nhận:</div> <div class="col-sm-6" style="color:#15c;">{{$bill->note}}</div>
		<table width="500" border="1">
			<tr style="text-align: center">
				<th>Tên bánh</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th>Thành tiền</th>
			</tr>		
		@foreach($bill->bill_details as $details)
			<tr style="text-align: center">
				<td >{{$details->product->name }}</td>
				<td >{{$details->quantity }}</td>
				<td >{{$details->unit_price }}</td>
				<td >{{$details->unit_price*$details->quantity }}</td>
			</tr>	
		@endforeach
			<tr>
			<td colspan="4" style="text-align: center">Tổng tiền: {{$bill->total}}</td>
			</tr>
		</table>
	</div>
</body>
</html>

