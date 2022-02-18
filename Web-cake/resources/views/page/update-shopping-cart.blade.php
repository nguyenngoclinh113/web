
<div class="container">
			<div class="table-responsive">
				<!-- Shop Products Table -->
				
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Product</th>
							<th class="product-price">Price</th>
							<th class="product-status">Status</th>
							<th class="product-quantity">Qty.</th>
							<th class="product-subtotal">Total</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					@if(Cart::count()>0)
					<?php $count=1;?>
						@foreach($content as $item)
					<tbody>
					
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="source/image/product/{{$item->options->has('img')?$item->options->img:''}}" width="100px" alt="">
									<div class="media-body">
										<p class="font-large table-title">{{$item->name}}</p>
										<!-- <p class="table-option">Color: Red</p>
										<p class="table-option">Size: M</p> -->
										<a class="table-edit" href="#">Edit</a>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">{{number_format($item->price)}}</span>
							</td>

							<td class="product-status">
								Bánh có sẵn
							</td>

							<td class="product-quantity">
								<!-- <select name="product-qty" id="product-qty">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select> -->

						

								<input type="hidden" value="{{$item->rowId}}" id="rowID<?php echo $count;?>"> 
								<input type="hidden" value="{{$item->id}}" id="proID<?php echo $count;?>">
								<input type="number" size="2" value="{{$item->qty}}" name="product_qty" id="newQty<?php echo $count; ?>"
								autocomplete="off" style="text-align:center; max-width: 100px; " min="1" max="1000" >
							</td>

							<td class="product-subtotal">
								<span class="amount">{{number_format($item->subtotal)}}</span>
							</td>

							<td class="product-remove">
								<a href="{{url('deleteitemcart/'.$item->rowId)}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						
					</tbody>
					<?php $count++; ?>
						@endforeach
					@endif

					<tfoot>
						<tr>
							<td colspan="6" class="actions">
								
								<a type="submit" href="{{url('checkout')}}" class="beta-btn primary" name="proceed">Proceed to Checkout <i class="fa fa-chevron-right"></i></a>

							</td>
							</td>
						</tr>
					</tfoot>
				</table>
				<!-- End of Shop Table Products -->
				</div>
</div>

	<script>
		$(document).ready(function($) { 
			<?php for($i=1;$i<100;$i++) {?>
		$('#newQty<?php echo $i;?>').on('change keyup',function(){
			// alert('i am here');
			var newQty = $('#newQty<?php echo $i; ?>').val();
			var rowID = $('#rowID<?php echo $i; ?>').val();
			var proID = $('#proID<?php echo $i; ?>').val();

			if(newQty<=0){
				alert('Vui lòng xem lại số lượng')
			}
			else {

				$.ajax({
        		type: 'get',
        		dataType: 'html',
       			url: '<?php echo url('/cart/update');?>/'+proID,
        		data: "newQty=" + newQty + "& rowID=" + rowID + "& proID=" + proID,
        		 success: function (response) {
             	console.log(response);
             	$('#update').html(response);
        		 }
        		// success: function (data)
        		// {
        		// 	if(data == "Ok")
        		// 	{
        		// 		window.location = "cart";
        		// 	}
        		// }
    			});
				}
		});
		<?php } ?>	
		});
	</script>
