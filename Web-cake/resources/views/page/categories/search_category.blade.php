@extends('master')
@section('content')
<div >
					
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<div class="col-md-6 slider_left" style="color:white;">
							<h2 style="color:white;" >CUPCAKE, <span>for any occassion</span></h2>
							<p>SweetBakery với danh sách rất nhiều các loại bánh khác nhau , bánh có sẵn hoặc sẽ được làm ngay trong ngày và giao tận nơi theo yêu cầu.</p>
							<a href="#about" class="hvr-bounce-to-right read scroll"><span class="fa fa-birthday-cake" aria-hidden="true"></span>Read More</a>
						</div>
						<div class="col-md-6 slider_right">
							<img src="source/image/slide_new/cake.png" alt="cake1" />
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<div class="col-md-6 slider_left">
							<h3 style="color:white;">CUPCAKE, <span>for any occassion</span></h3>
							<p>SweetBakery với danh sách rất nhiều các loại bánh khác nhau , bánh có sẵn hoặc sẽ được làm ngay trong ngày và giao tận nơi theo yêu cầu.</p>
							<a href="#about" class="hvr-bounce-to-right read scroll"><span class="fa fa-birthday-cake" aria-hidden="true"></span>Read More</a>
						</div>
						<div class="col-md-6 slider_right">
							<img src="source/image/slide_new/cake1.png" alt="cake1" />
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<div class="col-md-6 slider_left">
							<h3 style="color:white;">CUPCAKE, <span>for any occassion.</span></h3>
							<p>SweetBakery với danh sách rất nhiều các loại bánh khác nhau , bánh có sẵn hoặc sẽ được làm ngay trong ngày và giao tận nơi theo yêu cầu.</p>
							<a href="#about" class="hvr-bounce-to-right read scroll"><span class="fa fa-birthday-cake" aria-hidden="true"></span>Read More</a>
						</div>
						<div class="col-md-6 slider_right">
							<img src="source/image/slide_new/cake2.png" alt="cake1" />
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<div class="col-md-6 slider_left">
							<h3 style="color:white;">CUPCAKE, <span>for any occassion.</span></h3>
							<p>SweetBakery với danh sách rất nhiều các loại bánh khác nhau , bánh có sẵn hoặc sẽ được làm ngay trong ngày và giao tận nơi theo yêu cầu.</p>
							<a href="#about" class="hvr-bounce-to-right read scroll"><span class="fa fa-birthday-cake" aria-hidden="true"></span>Read More</a>
						</div>
						<div class="col-md-6 slider_right">
							<img src="source/image/slide_new/cake3.png" alt="cake1" />
						</div>
						<div class="clearfix"></div>
					</div>
					</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>						
</div> 
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h3 class="wthree_text_info">Loại: <span>{{$categorySearch->name}}</span>
			    			<div class="line-text"></div>
			    			</h3>		
							<div class="beta-products-details">
								
								<div class="clearfix"></div>
							</div>
							@if($products->isEmpty())
								<div style="padding-bottom: 100px;">* Rất tiếc không có kết quả nào phù hợp với từ khóa : <span style="color:#FFA803; font-size:20px; font-style: italic;">{{$productKey}}</span></div>
							@else
							<div class="row">
								@foreach($products as $product)
								<div class="col-sm-3">
									<div class="single-item">
										@if($product->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{url('categories/product/'.$product->id)}}"><img src="source/image/product/{{$product->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product->name}}</p>
											<p class="single-item-price">
												@if($product->promotion_price != 0)
												<span class="flash-del">{{number_format($product->unit_price)}}</span>
												<span class="flash-sale">{{number_format($product->promotion_price)}}</span>
												@else
												<span class="flash-sale">{{number_format($product->unit_price)}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<input type="hidden" value="{{$product->id}}" name="ProductId">
											<a class="add-to-cart pull-left submit-cart"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{url('categories/product/'.$product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row"> {{$products->appends($_GET)->links()}}</div>
							@endif
						</div> <!-- .beta-products-list -->
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
@endsection