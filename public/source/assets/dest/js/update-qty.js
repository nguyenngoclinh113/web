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
