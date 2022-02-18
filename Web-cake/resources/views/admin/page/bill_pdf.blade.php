<!DOCTYPE html>
<html>
<head>
	<title>Students</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf8">
	<style>
		body {
			margin:0 auto;
		}
		table {
			border-collapse: collapse;
			margin-top: 40px;
		}
		th,td {
			border: 1px solid black;
			text-align:center;
		}
		.container {
			width: 600px;
		}
		.container .col-sm-12 {
			width: 600px;
			height: 100px;
		}
		.container .col-sm-12 .col-sm-4{
			width: 200px;
			float:left;
		}
		.container .col-sm-12 .col-sm-8{
			width: 400px;
			float:left;
		}
		.container .table {
			margin:0 auto;
		}
		.container .title{
			margin:0 auto;
			text-align:center;
			font-size:24px;
			font-weight: bold;
			text-transform: uppercase;
		}

		.container .title2{
			margin:0 auto;
			text-align:center;
			font-size:18px;
			text-transform: uppercase;
			padding-top: 150px;
		}
		.container .default-table {
			margin:0 auto;
		}
		.container .table2 {
			margin-top: 180px;
			margin-left: 50px;
		}
		.container .table2 tr td {
			width: 50px;
		}
		.container .border {
			border-top: 3px solid black;
			margin-top: 210px;
		}

		.total {
			margin-top: 240px;
			margin-left: 50px;
		}


	</style>
</head>
<body>
<div class="container">
	<div class="col-sm-12">
		<div class="col-sm-4"><img src="source/image/product/logo.png" width="150px"></div>
		<div class="col-sm-8">
			<p style="font-weight: bold;">Sweet Bakery Store</p>
			<p>110 Pham Nhu Xuong - Da Nang</p>
			<p>0935.444.294</p>
		</div>
	</div>
	<div class="title">Hoa Don</div>
	<div class="table">
		<table>
			<tr>
				<th>Ten khach hang</th>
				<th>Dia chi nhan</th>
				<th>Dien thoai</th>
				<th>Ngay dat hang</th>
				<th>Payment</th>
				<th>Note</th>
			</tr>
			<tr>
				<td>{{$bill->name}}</td>
				<td>{{$bill->address}}</td>
				<td>{{$bill->phone}}</td>
				<td>{{$bill->date_order}}</td>
				<td>{{$bill->payment}}</td>
				<td>{{$bill->note}}</td>
			</tr>
		</table>
	</div>
	<div class="title2">Chi Tiet Hoa Don</div>
	<div class="default-table">
		<table class="table2">
			<tr>
				<th>Ten san pham</th>
				<th>Don vi</th>
				<th>So luong</th>
				<th>Don gia</th>
				<th>Thanh Tien</th>
			</tr>
			@foreach($bill->bill_details as $details)
			<tr>
				<td>{{$details->product->name}}</td>
				<td>{{$details->product->unit}}</td>
				<td>{{$details->quantity}}</td>
				<td>{{$details->unit_price}}</td>
				<td>{{$details->quantity*$details->unit_price}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="5"> Tong Tien: {{$bill->total}} </td>
			</tr>
		</table>
	</div>
	<!-- <table class="border">
		<tr class="total" >
			<th>Tong Tien Hoa Don: {{$bill->total}}<th></tr>
	</table> -->
	
</div>
</body>
</html>