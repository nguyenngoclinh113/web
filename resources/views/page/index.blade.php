@extends('master')
@section('content')
<div>
					
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
<div class="inner-header ">
		<div class="container ">
			<div class="pull-left">
			<!-- 	<h6 class="inner-title">Sản phẩm</h6> -->
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<!-- <a href="index.html">Home</a> / <span>Sản phẩm</span> -->
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container editcontainer">
				<div class="col-sm-3">
			<div class="left-sidebar">
				<h2 class="text-center"><span>Loại</span> Bánh
					<div class="line-text"></div>
				</h2>
					<div class="panel-group category-products" id="accordian">
						@foreach($categories as $category)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#{{$category->id}}">
										<span class="span-heart"><i class="fa fa-caret-square-o-down"></i></span>
											<p class="category-label-sportswear">{{$category->name}}</p>
									</a>
								</h4>
								<div class="line"></div>
							</div>
								
								<div id="{{$category->id}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@foreach($category->products as $products)
											<li><a href="{{url('categories/product/'.$products->id)}}">{{$products->name}}</a></li>
											@endforeach
										</ul>
									</div>
								</div>
								
					</div>
					@endforeach
			</div>
			<!--</div>-->
			<!--/category-products-->
			<div class="left-sidebar">
				<h2 class="text-center"><span>Tìm</span> Kiếm
					<div class="line-text"></div>
				</h2>
				<div class="category-products2 side-bar">
					
					<div class="search-hotel">
						<h3 class="agileits-sear-head">Tìm với tên</h3>
							<form id="target" action="{{url('products/search')}}" method="get">
								<input type="hidden" value="min_slide" id="min_slider" name ="min_slider">
								<input type="hidden" value="max_slide" id="max_slider" name ="max_slider">
								<input type="search" placeholder="Product name..." name="search_key">
								<input type="submit" value=" " class="bstn btn-info" id="submit">
								<br> <br>
								<h3 class="agileits-sear-head">  Giá từ:</h3>
									<span id="app_min_price" ></span>
									<span id="app_max_price" style="float: right"></span>
									<br /><br />
									<div id="slider_price"></div>
							</form>
					</div>
					<div class="clearfix"></div>
				</div>
				 	<div class="banner-left"><a href="#"><img src="source/image/product/banh-bong-lan-cuon-cam-6-80462.jpg" alt=""></a>
                        <div class="banner-content">
                                <h1>sale up to</h1>
                                <h2>20% off</h2>
                                <p>selected products</p>
                                <a href="#">buy now</a>
                        </div>
                    </div>
					<div class="clearfix"></div>
					 
			</div>
</div>
						</div>

			<!--</div>-->
					<div class="col-sm-9">
						<div class="beta-products-list">
							<!-- <h4>New Products</h4> -->
							<h3 class="wthree_text_info">Bánh<span> mới</span>
			    			<div class="line-text"></div>
			    			</h3>		
							<div class="beta-products-details">
								<div class="pull-left"><!-- <i class="fa fa-spinner fa-spin"> </i> --> <img src="source/image/qua.svg" width="80px"></div>
								&nbsp;
								<p class="pull-left-new">Có <span style="color:#fe4c50">{{$newProducts->total()." "}}</span>  Bánh mới</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@foreach($newProducts as $newProduct)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{url('categories/product/'.$newProduct->id)}}"><img src=" source\image\product\{{$newProduct->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$newProduct->name}}</p>
											<p class="single-item-price">
												@if($newProduct->promotion_price != 0) 
													<span class="flash-sale">{{number_format($newProduct->promotion_price)}}</span>
												@else 
													<span class="flash-sale">{{number_format($newProduct->unit_price)}}</span>
												@endif
												
											</p>
										</div>
										<div class="single-item-caption">
											 <input type="hidden" value="{{$newProduct->id}}" name="ProductId">
											<a  class="add-to-cart pull-left submit-cart"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{url('categories/product/'.$newProduct->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row"> {{$newProducts->appends(['promotionProducts' => $promotionProducts->currentPage()])->links()}}</div>
						</div> <!-- .beta-products-list -->


						<div class="space50">&nbsp;</div>
						<div class="agile_last_double_sectionw3ls">
           					 <div class="col-md-6 multi-gd-img multi-gd-text">
								<a href="#"><img src="source/image/product/cupcake.jpg" alt=" " height="300px"><h4>Hello <span></span> New Day</h4></a>
								</div>
								<div class="col-md-6 multi-gd-img multi-gd-text ">
										<a href="#"><img src="source/image/product/Maccaron-am-thuc-chau-au-mixtourist.jpg" alt=" "><h4>Welcome <span></span> you</h4></a>
								</div>
								<div class="space50">&nbsp;</div>
	   					</div>	

						<div class="beta-products-list">
							<h3 class="wthree_text_info">Bánh<span> Khuyến Mãi</span>
			    			<div class="line-text"></div>
			    			</h3>		
							<div class="beta-products-details">
								<div class="pull-left"><!-- <i class="fa fa-spinner fa-spin"> </i> --> <img src="source/image/qua.svg" width="80px"></div>
								&nbsp;
								<p class="pull-left-new">Có <span style="color:#fe4c50">{{$promotionProducts->total()." "}}</span>  Bánh khuyến mãi</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($promotionProducts as $promotionProduct)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{url('categories/product/'.$promotionProduct->id)}}"><img src="source\image\product\{{$promotionProduct->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$promotionProduct->name}}</p>
											<p class="single-item-price">
												@if($promotionProduct->promotion_price != 0)
												<span class="flash-del">{{number_format($promotionProduct->unit_price)}}</span>
												<span class="flash-sale">{{number_format($promotionProduct->promotion_price)}}</span>
												@else
												<span class="flash-sale">{{number_format($promotionProduct->unit_price)}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<input type="hidden" value="{{$promotionProduct->id}}" name="ProductId">
											<a class="add-to-cart pull-left submit-cart" ><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{url('categories/product/'.$promotionProduct->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row"> 
							<div class="row"> {{$promotionProducts->appends(['newProducts' => $newProducts->currentPage()])->links()}}</div>
							<div class="space40">&nbsp;</div>

							<!-- <div class="row">
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div> -->
							
							
						</div> <!-- .beta-products-list -->
					</div>
				 <!-- end section with sidebar and main content -->
			 <!-- .main-content -->
		<!-- #content -->
	</div> <!-- .container -->
	<div class="space40">&nbsp;</div>
	
@endsection()