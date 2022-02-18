<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
	<title>Admin</title>
=======
	<title>Sweet Bakery</title>
>>>>>>> f8bbae8ecd7cdaf945b1334a0b20bed9a7af1df4
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
	<link rel="stylesheet" href="source/assets/dest/css/special.css">
	<!-- <link rel="stylesheet" href="css/jquery-ui.css"> -->
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   

   
</head>
<body>
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

	<!-- include js files -->
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
	<!-- <script src="source/assets/dest/vendors/animo/Animo.js"></script> -->
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<!-- <script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> -->
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>

	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
	<script src="source/assets/dest/js/password.js"></script>



	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}
		})
		<?php for($i=1;$i<100;$i++) {?>
		$('#newQty<?php echo $i; ?>').on('change keyup',function(){
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
			
		})
		// $('div').on('focusout', function () {
  // 			$('div#back_result').css({'display':'none'});
		// });
		$("div.alert").delay(2000).slideUp();

		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
		
	})
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
	<script>
    $( "#qtyform" ).submit(function( event )
				 	{
		 	$("#valtg").val( $("#value2" ).text());
		 	//alert($("#value2" ).text());
  			//event.preventDefault();
	});  	
</script>
</body>
</html>
