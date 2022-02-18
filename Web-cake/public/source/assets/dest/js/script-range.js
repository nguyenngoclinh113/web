$(document).ready(function() 
{
	$( "#slider_price" ).slider({
				range: true,
				min: 0,
				max: 500000,
				step:5000,
				values: [ 0, 500000 ],
				slide: function( event, ui ) {
					$( "#app_min_price" ).text(ui.values[0] + "VND");
					$( "#app_max_price" ).text(ui.values[1] + "VND");
				},
				 stop: function( event, ui ) {
				 	// var nr_total = getEstatesNumber(ui.values[0], ui.values[1]);
				 	// $("#number_results").text(nr_total);
				 	$( "#target" ).submit(function( event )
				 	{

				 		$("#min_slider").val( $("#app_min_price" ).text());
				 		$("#max_slider").val( $("#app_max_price" ).text());

				 	});
				 },
	});
	$("#app_min_price").text( $("#slider_price").slider("values", 0) + "VND");
	$("#app_max_price").text( $("#slider_price").slider("values", 1) + "VND");

	$("#min_slider").val( $("#slider_price").slider("values", 0));
	$("#max_slider").val( $("#slider_price").slider("values", 1));	

	// $( "#target" ).submit(function( event ) {
	//   var action = $( '#target' ).attr( 'action' );
	//   var search_key = $( "#target input[name$='search_key']" ).val();
	//   var url = action + "?search_key" + search_key;
	//   window.location = url; 
	//   event.preventDefault();
	// });

	  
});
// function getEstatesNumber(min_price, max_price)
//  {
//  	var number_of_estates = 0;
//      $.ajax(
//      {
//         type: "GET",
//  		url: "{{ route('search_products'}}",
//         dataType: 'json',
//  		data: {'minprice': min_price, 'maxprice':max_price},
//          async: false,
//          success: function(data)
//          {
//  			number_of_estates = data;
//          }
//      });
//      return number_of_estates;
//  }
