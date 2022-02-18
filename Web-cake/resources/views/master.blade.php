<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sweet Bakery</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<base href="{{asset('')}}">
	<!-- <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'> -->
	<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="source/assets/dest/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/jquery-ui.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" href="source/assets/dest/css/style-modal.css">
	<link rel="stylesheet" href="source/assets/dest/css/single.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/slide.css">
	<!-- <link rel="stylesheet" href="source/assets/dest/css/special.css"> -->
	<!-- <link rel="stylesheet" href="css/jquery-ui.css"> -->
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css"> 
</head>
<body onload="now();">
	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
		@include('footer')
	<div class="copyright">
		<div class="container">
			<p class="pull-left"></p>
			<p class="pull-right pay-options">
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->
	
	@yield('script')
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"></span></a>
	<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
	<!-- <script src="source/assets/dest/js/myscript.js"></script> -->
	<script src="source/assets/dest/js/jquery.min.js"></script>
	<script src="source/assets/dest/js/jquery-2.1.4.min.js"></script>
	<script src="source/assets/dest/js/index.js"></script>
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/js/script-range.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<script src="source/assets/dest/js/custom2.js"></script>
	<script src="source/assets/dest/js/password.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
	<script src="source/assets/dest/js/home.js"></script> <!--scroll home -->
	<script src="source/assets/dest/js/imagezoom.js"></script> <!--image zoom detail products -->




<script>
$(document).ready(function now($) {

	$("div.alert").delay(900).slideUp();

	$(window).scroll(function(){
		if($(this).scrollTop()>150){
		$(".header-bottom").addClass('fixNav')
		}else{
			$(".header-bottom").removeClass('fixNav')
		}
	})
		
	$("#search").keyup(function(){
		var key = $(this).val();
		var categoryId = $(this).parent().parent().find("#categoryId").val();
		
		if ($(this).val() == "") {
			$('div#back_result').css({'display':'none'});
		}
		else {
			$.ajax({
			type: 'get',
			dataType: 'html',
			url: '<?php echo url('categories/products/autoget') ?>',
			data: "key=" + key + "& categoryId=" + categoryId,
			success: function (data) {
				console.log(data);
				$('div#back_result').css({'display':'block'});
				$('#back_result').html(data);
			}

			});
		}	
	});

	$( ".btncomment" ).click(function() {
		var proId = $(this).parent().find("#proId").val();
		var comment = $(this).parent().find("#comment").val();
		console.log(comment);
		$.ajax ({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: 'post',
			dataType: 'html',
			url: 'user/product/'+proId+'/comment',
			data : "id=" + proId + "& comment=" + comment,
			success:
				function (data) {
					var result ='';
					var obj = jQuery.parseJSON(data);
					console.log(obj);
					result += "<div class='media' id='before-comment'>"+
                    	"<a class='pull-left' href='#' >"+
                        "<img class='media-object' width='40px' src='source/image/product/avart.png' alt=''>"+
                    	"</a>"+
                   		 "<div class='media-body'>"+
                        	"<h4 class='media-heading'><span style=' color:#ed9c28;'>"+obj.name+"</span>"+
                            "<small>"+" "+$.datepicker.formatDate( "dd.mm.yy", new Date(obj.created_at))+"</small>"+
                            "<input type='hidden' value='"+obj.product_id+"' id='proId'>"+
                            "<input type='hidden' value='"+obj.id+"' id='commentId'>"
                    if(obj.is_admin == 1) {
                    	result += "<a class='remove remove-comment' title='Remove comment' style='float:right;'>"+
                            	"<i class='fa fa-trash-o'></i>"+
                            "</a>"
                    }        
                    result += "</h4>"+
                        	""+obj.content+""+
                    	"</div>"+
                	"</div>"; 
                    console.log(result);
                	$('#before-comment').before(result);
                	// $('#before-comment').eq(1).removeAttr('id');
                	$("#comment").val('');
				},
		});
	});

	$(document).on("click",".remove-comment",function() {	
		var commentId = $(this).parent().find("#commentId").val();
		var proId = $(this).parent().find("#proId").val();
		var checkstr =  confirm('Bạn muốn xóa comment này');
		if(checkstr == true)
		{
			$(this).parent().parent().parent().remove();
			$.ajax ({
				type: 'get',
				dataType: 'html',
				url: '/comment/delete/'+commentId+'',
				data: "proId="+proId,
				success: 
					function (data) {
						var obj = jQuery.parseJSON(data);
						console.log(obj);
				},

			});
		}
		else
			return false;		
	});

	$(document).on("click",".submit-cart",function(event) {
	//$('.submit-cart').click(function(){
		event.preventDefault();
		var productId = $(this).parent().find("input[name='ProductId']").val();
		$.ajax ({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
    		type: 'post',
    		dataType: 'html',
   			url: '<?php echo url('/cart/add');?>/'+productId, 
    		success: 
        		function (data) {
        			var result = ''; 
        			var total = 0;
        			var totalQty = 0;
        			var cart = '';
        			var obj = jQuery.parseJSON(data);
        			var strText = "";
        			$.each( obj, function( key, value ) {
        				total += (value.qty*value.price);
        				totalQty += parseInt(value.qty);
        				console.log(value); 
					   	result += "<div class='cart-item'>" +
		                		"<div class='media'>" + 
		                		"<a class='pull-left' href='#''><img src='source/image/product/"+value.options.img+"' alt='' ></a>"+			             
		                		"<div class='media-body'>"+
		                    	"<input type='hidden' value='"+value.rowId+"' id='rowId'>"+
		                    	"<a ><button type='button' class='remove-cart-item deleteCart'>×</button></a>"+
		                    	"<span class='cart-item-title'>"+ value.name + "</span>"+
		                		"<span class='cart-item-amount'>"+value.qty+"*<span>"+numeral(value.price).format('0,0')+"</span></span>"+
	                			"</div>"+
	                		"</div>"+
	                		"</div>";
					});
					result+= "<div class='cart-caption' id='updateCart' >"+
							"<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>"+numeral(total).format('0,0')+"</span></div>"+
							"<div class='clearfix'></div>"+

							"<div class='center'>"+
								"<div class='space10'>&nbsp;</div>"+
								"<a href='{{url('cart')}}' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>"+
							"</div>"+
						"</div>"
		            if(totalQty>0 ) {
		                strText = totalQty;
		                $('div#block').css({'display':'block'});
		            }
		            else {
		                strText = "Trống";
		            }
		            cart+= "<i class='fa fa-shopping-cart'></i> Giỏ hàng "+
							"( "+ strText +" )" +
							"<i class='fa fa-chevron-down'></i>"
	        		console.log(cart);
	        		$('.beta-select').html(cart);
             		$('#add-cart-item').html(result);
             	},
		});
	});

	function formatNumber (num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "0,");
	}

	$(document).on("click",".deleteCart",function(event){
		var rowId = $(this).parent().parent().find('#rowId').val();
		event.preventDefault();
		$.ajax ({
        	type: 'get',
        	dataType: 'html',
       		url: '<?php echo url('/cart/delete');?>/'+rowId,
        	success: 
    			function (data) {
    				var result = ''; 
        			var total = 0;
        			var totalQty = 0;
        			var cart ='';
        			var obj = jQuery.parseJSON(data);
        			var strText = "";
        			var pageCart ='';
        			var sum = 0;
        			$("#tableId tbody").find('#'+rowId+'').each(function(){
       				 	$(this).remove();
    				});
	        		$.each( obj, function( key, value ) {
        				total += (value.qty*value.price);
        				totalQty += parseInt(value.qty);
        				console.log(value); 
					   	result += "<div class='cart-item'>" +
		                		"<div class='media'>" + 
		                		"<a class='pull-left' href='#''><img src='source/image/product/"+value.options.img+"' alt='' ></a>"+			             
		                		"<div class='media-body'>"+
		                		"<input type='hidden' value='"+value.rowId+"' id='rowId'>"+
		                    	"<a><button type='button' class='remove-cart-item deleteCart'>×</button></a>"+
		                    	"<span class='cart-item-title'>"+ value.name + "</span>"+
		                		"<span class='cart-item-amount'>"+value.qty+"*<span>"+numeral(value.price).format('0,0')+"</span></span>"+
	                			"</div>"+
	                		"</div>"+
	                		"</div>";
	                	sum += value.subtotal;
					});
					result+= "<div class='cart-caption' id='updateCart' >"+
							"<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>"+numeral(total).format('0,0')+"</span></div>"+
							"<div class='clearfix'></div>"+

							"<div class='center'>"+
								"<div class='space10'>&nbsp;</div>"+
								"<a href='{{url('cart')}}' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>"+
							"</div>"+
						"</div>"
						
			        if(totalQty>0 ){
			            strText = totalQty;
			            $('div#block').css({'display':'block'});
			        }
			        else {
			            strText = "Trống";
			            $('div#block').css({'display':'none'});
			        }
			        cart+= "<i class='fa fa-shopping-cart'></i> Giỏ hàng "+
							"( "+ strText +" )" +
							"<i class='fa fa-chevron-down'></i>"
		        	console.log(cart);
	        		$('.beta-select').html(cart);
             		$('#add-cart-item').html(result);
             		$('#sum').html(numeral(sum).format('0,0')); 
             		if(sum == 0)
             		{
             			var urlCurrent = document.URL;
             			if(urlCurrent.indexOf('index') == -1) 
             			{
             				if(urlCurrent.indexOf('categories') == -1)
             				{
             					window.location.href ='index?flash_message';
             				}
             			} 
             		}		
	            },
	            error: function (request, status, error) {
				        // alert(request.responseText);
				}
		});
	});

	$('.newQty').on('change keyup',function(){	
		var newQty = $(this).val();
		var rowID = $(this).parent().find('#rowID').val();
		var proID = $(this).parent().find('#proID').val();
		var amount = $(this).parent().parent().find('.sub_amount').text();
		var value_amount = parseInt(amount) *1000;
		var quantity = parseInt(newQty);
		var total_amount = numeral(value_amount * quantity).format('0,0');	
		if(newQty<=0){
			alert('Vui lòng xem lại số lượng')
		}
		else {
			$(this).parent().parent().find('.total_sub_amount').text(total_amount);
			$.ajax({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
    		type: 'post',
    		dataType: 'html',
   			url: '<?php echo url('/cart/update');?>/'+proID,
    		data: "newQty=" + newQty + "& rowID=" + rowID + "& proID=" + proID,
    		success:
    			function (data) {
         		var object = jQuery.parseJSON(data);
         		var result = "";
         		var totalQty = 0;
         		var total = 0;
         		var cart = "";
         		var sum = 0;
        		$.each( object, function( key, value ) {
        			total += (value.qty*value.price);
        			totalQty = totalQty+parseInt(value.qty);
        			result += "<div class='cart-item'>" +
		                		"<div class='media'>" + 
		                		"<a class='pull-left' href='#''><img src='source/image/product/"+value.options.img+"' alt='' ></a>"+			             
		                		"<div class='media-body'>"+
		                    	"<input type='hidden' value='"+value.rowId+"' id='rowId'>"+
		                    	"<a><button type='button' class='remove-cart-item deleteCart'>×</button></a>"+
		                    	"<span class='cart-item-title'>"+ value.name + "</span>"+
		                		"<span class='cart-item-amount'>"+value.qty+"*<span>"+numeral(value.price).format('0,0')+"</span></span>"+
	                			"</div>"+
	                		"</div>"+
	                		"</div>";
	                sum += value.subtotal;
        		});
    			result += "<div class='cart-caption' id='updateCart' >"+
						"<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>"+numeral(total).format('0,0')+"</span></div>"+
						"<div class='clearfix'></div>"+

						"<div class='center'>"+
							"<div class='space10'>&nbsp;</div>"+
							"<a href='{{url('cart')}}' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>"+
						"</div>"+
						"</div>";
				if(totalQty>0 ){
	                strText = totalQty;
	                $('div#block').css({'display':'block'});
	            }
	            else {
	                strText = "Trống";
	                $('div#block').css({'display':'none'});
	            }
	            cart+= "<i class='fa fa-shopping-cart'></i> Giỏ hàng "+
						"( "+ strText +" )" +
						"<i class='fa fa-chevron-down'></i>"
				console.log(result);
        		console.log(cart);
        		$('.beta-select').html(cart);
				$('#add-cart-item').html(result);
				$('#sum').html(numeral(sum).format('0,0'));
	             		
    			},
    						
			});
		}
	});

	$(".deletePageCartUpdate").click(function() {
		var rowId = $(this).parent().parent().find('#rowID').val();
		var tr = $(this).closest('tr');
		var checkstr =  confirm('Bạn muốn xóa sản phẩm này');
		if(checkstr == true){
	        $.ajax ({
	    		type: 'get',
	    		dataType: 'html',
	   			url: '<?php echo url('/cart/delete');?>/'+rowId,
	    		success: 
	    			function (data) {
	    				tr.fadeOut(500, function(){
	       				 $(this).remove();
	    				});
	    				var result = ''; 
	        			var total = 0;
	        			var totalQty = 0;
	        			var cart = '';
	        			var obj = jQuery.parseJSON(data);
	        			var strText = "";
	        			var sum = 0;
	        			var msg = "";
	        			$.each( obj, function( key, value ) {
	        				total += (value.qty*value.price);
	        				totalQty += parseInt(value.qty);
	        				console.log(value); 
						   	result += "<div class='cart-item'>" +
			                		"<div class='media'>" + 
			                		"<a class='pull-left' href='#''><img src='source/image/product/"+value.options.img+"' alt='' ></a>"+			             
			                		"<div class='media-body'>"+
			                		"<input type='hidden' value='"+value.rowId+"' id='rowId'>"+
			                    	"<a><button type='button' class='remove-cart-item deleteCart'>×</button></a>"+
			                    	"<span class='cart-item-title'>"+ value.name + "</span>"+
			                		"<span class='cart-item-amount'>"+value.qty+"*<span>"+numeral(value.price).format('0,0')+"</span></span>"+
		                			"</div>"+
		                		"</div>"+
		                		"</div>";
		                	sum += value.subtotal;
						});
						result += "<div class='cart-caption' id='updateCart' >"+
								"<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>"+numeral(total).format('0,0')+"</span></div>"+
								"<div class='clearfix'></div>"+

								"<div class='center'>"+
									"<div class='space10'>&nbsp;</div>"+
									"<a href='{{url('cart')}}' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>"+
								"</div>"+
							"</div>"
			            if(totalQty>0 ) {
			                strText = totalQty;
			                $('div#block').css({'display':'block'});
			            }
			            else {
			                strText = "Trống";
			                $('div#block').css({'display':'none'});
			            }
			            cart += "<i class='fa fa-shopping-cart'></i> Giỏ hàng "+
								"( "+ strText +" )" +
								"<i class='fa fa-chevron-down'></i>"
		        		console.log(cart);
		        		$('.beta-select').html(cart);
	             		$('#add-cart-item').html(result);
	             		$('#sum').html(numeral(sum).format('0,0'));
	             		console.log(sum);
	             		if(sum == 0)
	             		{
	             			window.location ='index?flash_message';	
	             		}
	             	},
	             	error: function (request, status, error) {
				        // alert(request.responseText);
				    }
			});
	    	}
    	else
    		return false;
	});

	$( ".qtyAddCart" ).click(function() {
	 	$("#valtg").val( $("#value2" ).text());
	 	var qty = $(this).parent().find('#valtg').val();
	 	var proId = $(this).parent().find('#proId').val();
		$.ajax ({
				headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
        		type: 'post',
        		dataType: 'html',
       			url:  '/cart/add/'+proId+'/qty',
       			data: "qty=" + qty + "& id=" + proId ,
        		success: 
	        		function (data) {
	        			var result = ''; 
	        			var total = 0;
	        			var totalQty = 0;
	        			var cart ='';
	        			var obj = jQuery.parseJSON(data);
	        			var strText = "";
	        			$.each( obj, function( key, value ) {
	        				total += (value.qty*value.price);
	        				totalQty += parseInt(value.qty);
	        				console.log(value); 
						   	result += "<div class='cart-item'>" +
			                		"<div class='media'>" + 
			                		"<a class='pull-left' href='#''><img src='source/image/product/"+value.options.img+"' alt='' ></a>"+			             
			                		"<div class='media-body'>"+
			                    	"<input type='hidden' value='"+value.rowId+"' id='rowId'>"+
			                    	"<a ><button type='button' class='remove-cart-item deleteCart'>×</button></a>"+
			                    	"<span class='cart-item-title'>"+ value.name + "</span>"+
			                		"<span class='cart-item-amount'>"+value.qty+"*<span>"+numeral(value.price).format('0,0')+"</span></span>"+
		                			"</div>"+
		                		"</div>"+
		                		"</div>";
						});
						result += "<div class='cart-caption' id='updateCart' >"+
								"<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>"+numeral(total).format('0,0')+"</span></div>"+
								"<div class='clearfix'></div>"+

								"<div class='center'>"+
									"<div class='space10'>&nbsp;</div>"+
									"<a href='{{url('cart')}}' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>"+
								"</div>"+
								"</div>"
			            if(totalQty>0 ){
			                strText = totalQty;
			                $('div#block').css({'display':'block'});
			            }
			            else {
			                strText = "Trống";
			            }
			            cart += "<i class='fa fa-shopping-cart'></i> Giỏ hàng "+
								"( "+ strText +" )" +
								"<i class='fa fa-chevron-down'></i>"
		        		console.log(cart);
		        		$('.beta-select').html(cart);
	             		$('#add-cart-item').html(result);
	             	},
	             	error: function (request, status, error) {
				        // alert(request.responseText);
				    }
		});
	}); 

	$(document).on("click",".paginate-product .pagination a",function(e){
		e.preventDefault();
		var page = $(this).attr("href").split('page=')[1];
		//var categoryId = $(this).attr("href").split('categories/')[1][0];
		var categoryId = $('input:hidden[id=categoryId-paginate]').val();
		$.ajax({
			url: 'ajax/categories/'+categoryId+'?page='+page
		}).done(function(data) {
			console.log(data);
			$(".result-paginate-product").html(data);
			location.hash = page;
		});
	});

	$('#formCheckout').validate({
		rules :{
			name: {
				required : true,
				minlength : 3
			},
			address: {
				required : true,
				minlength: 15
			},
			phone : {
				required : true,
				minlength: 10,
				maxlength: 15,
				number: true
			},
			note : {
				required : true,
				minlength : 10
			}
		},
		messages : {
			name : {
				required : "* Bạn chưa nhập tên",
				minlength : "* Tên phải từ 3 ký tự",
			},
			address : {
				required : "* Bạn chưa nhập địa chỉ nhận hàng",
				minlength : "* Địa chỉ phải từ 15 ký tự trở lên",
			},
			phone : {
				required : "* Bạn chưa nhập số điện thoại",
				
				minlength : "* Số điện thoại phải từ 10 số trở lên",
				maxlength : "* Số điện thoại nhập tối đa 15 số ",
				number : "* Số điện thoại bạn nhập không đúng",
			},
			note : {
				required : "* Bạn chưa nhập ghi chú",
				minlength : "* Ghi chú phải từ 10 ký tự",
			},
		},
		
	});
		
});
</script>
<script>
	$('.value-plus').on('click', function(){
    	var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
    	divUpd.text(newVal); 
    });
    $('.value-minus').on('click', function(){
    	var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
    	if(newVal>=1) divUpd.text(newVal);	
    });
</script>
</body>
</html>
