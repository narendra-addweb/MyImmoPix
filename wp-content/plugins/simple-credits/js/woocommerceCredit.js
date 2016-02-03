function creditdeduct(productid, price, variation) {
	var r = confirm("This product will cost you " + price + " credits. Are you sure to buy this product?");
	var emptyText = '<p style="margin:5px;display:inline-block;height:20px;">'+params.error+'</p>';
	
	if (r == true) {
		jQuery.ajax({
			type: "post",
			url: params.homeurl+'/wp-content/plugins/simple-credits/ajax.php',
			data: 'action=buy_product&productid=' + productid + '&variationid=' + variation,
			success: function(response) {
				if (response == "error") {
					jQuery.blockUI({ 
						message: emptyText,
						fadeIn: 700, 
			            fadeOut: 700, 
			            timeout: 2000, 
			            css: {
			                top: '100px',
			                right: '15px', 
			                border: 'none', 
			                padding: '5px', 
			                backgroundColor: '#A80000', 
			                '-webkit-border-radius': '5px', 
			                '-moz-border-radius': '5px', 
			                opacity: .7, 
			                color: '#fff' 
			            } 
			        });  
				} else {
					location.href = response;
				}
			}
		})
	}
}