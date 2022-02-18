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
								<li>Chi tiết sản phẩm</li>
							</ul>
						 </div>

				</div>
	   <!--//w3_short-->
	</div>
</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$product->image}}" alt="" data-imagezoom="true">
						</div>
						<div class="col-sm-8">
							<div class="single-top-in">
							<div class="span_2_of_a1 ">
								<h3>{{$product->name}}</h3>
								<p class="in-para">Bánh có thể sử dùng liền không cần sơ chế lại</p>
			    				<div class="price_single">
				  				<span class="reducedfrom item_price">@if($product->promotion_price ==0)
				  				{{number_format($product->unit_price)}} @else {{number_format($product->promotion_price)}}@endif</span>
				 				<div class="clearfix"></div>
								</div>
								<h4 class="quick">Mô tả:</h4>
								<p class="quick_desc"> {{$product->description}}</p>
			    
								
								<div class="quantity"> 
												<div class="quantity-select">                           
													<div class="entry value-minus">&nbsp;</div>
													<input type="hidden" value="valtg" id="valtg" name ="val">
													<input type="hidden" value="{{$product->id}}" name ="id" id="proId">
													<div class="entry value" id="value2"><span>1</span></div>
													<div class="entry value-plus active">&nbsp;</div>
												</div>
								</div>
									<button type="submit" class="add-to item_add hvr-skew-backward qtyAddCart ">Add to cart</button>
									
								
				 				</div>
				 				
						</div>	
						</div>
					</div>

					<div class="space40">&nbsp;</div>


				<div class="well">
                    <h4>Viết bình luận ...<i class="fa fa-pencil"></i></h4><br>
                 
                        @if(Auth::user())
                       
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
                           	<input type="hidden" value="{{$product->id}}" id="proId">
                        </div>
                        <button type="submit" class="btn btn-warning btncomment">  &nbsp; Gửi &nbsp;  </button> 
                        @else
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment" disabled=""></textarea>
                        </div>
                        <a type="submit" class="btn btn-warning " id="comment" disabled=""> &nbsp; Gửi &nbsp;  </a>
                        <span style="color:#ed9c28; font-style: italic; font-size: 12px;">* Bạn cần đăng nhập để có thể bình luận</span>
                        @endif
                   
                </div>
				<hr>
				<?php $last_comment = true;?>
				<div id="before-comment"></div>
				@foreach($comments as $comment)	
                <div class="media">
                    <a class="pull-left" href="#" >
                        <img class="media-object" width="40px" src="source/image/product/avart.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><span style=" color:#ed9c28;">{{$comment->user->name}}</span>
                            <small>{{date('d.m.Y', strtotime($comment->created_at))}}</small>
                            <input type="hidden" value="{{$comment->product_id}}" id="proId">
                            <input type="hidden" value="{{$comment->id}}" id="commentId">
                            @if(Auth::user() && Auth::user()->isAdmin())
                            <a class="remove remove-comment" title="Remove comment" style="float:right;">
                            	<i class="fa fa-trash-o"></i>
                            </a>
                            @endif
                        </h4>
                        {{$comment->content}}
                    </div>
                </div>
                @endforeach
                
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Bánh cùng loại</h4>

						<div class="row">
							@foreach($productRelated as $productR)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{url('categories/product/'.$productR->id)}}"><img src="source/image/product/{{$productR->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$productR->name}}</p>
										<p class="single-item-price">
											@if($productR->promotion_price != 0)
												<span class="flash-del">{{number_format($productR->unit_price)}}</span>
												<span class="flash-sale">{{number_format($productR->promotion_price)}}</span>
												@else
												<span class="flash-sale">{{number_format($productR->unit_price)}}</span>
												@endif
										</p>
									</div>
									<div class="single-item-caption">
										 <input type="hidden" value="{{$productR->id}}" name="ProductId">
										<a class="add-to-cart pull-left submit-cart" ><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{url('categories/product/'.$productR->id)}}">Details<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							

						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bánh HOT </h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($productTop as $productT)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{url('categories/product/'.$productT->id)}}"><img src="source/image/product/{{$productT->image}}" alt=""></a>
									<div class="media-body">
										{{$productT->name}}
										<span class="beta-sales-price">
											@if($productT->promotion_price != 0 || $productT->promotion_price >0 )
												{{number_format($productT->promotion_price)}}
												@else
												{{number_format($productT->unit_price)}}
											@endif</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Bánh mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($productNew as $productN)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{url('categories/product/'.$productN->id)}}"><img src="source/image/product/{{$productN->image}}" alt=""></a>
									<div class="media-body">
										{{$productN->name}}
										<span class="beta-sales-price">
											@if($productN->promotion_price != 0 || $productN->promotion_price >0 )
												{{number_format($productN->promotion_price)}}
												@else
												{{number_format($productN->unit_price)}}
											@endif
										</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
