<div class="beta-products-list">
							<h3 class="wthree_text_info">Loại: <span>{{$category->name}}</span>
			    			<div class="line-text"></div>
			    			</h3>		
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
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
											<a class="add-to-cart pull-left submit-cart" "><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{url('categories/product/'.$product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
							<input type="hidden" value="{{$category->id}}" id="categoryId-paginate">
							<div class="row paginate-product">{{$products->links()}}</div>
						</div> <!-- .beta-products-list -->