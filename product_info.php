<?php
session_start();
/**
  Plugin Name: WooCommerce Product Info
  Plugin URI: 
  Description: 
  Author: Amirul Momenin
  Version: 
  Author 
  License: 
 **/
 // Add Shortcode
add_shortcode( 'wooc-product-info', 'woocommerce_product_info' );



function woocommerce_product_info() {
   
	$product_id = 765;
	$product = wc_get_product( $product_id );
	$variation_id= 0;
	if($product->product_type=='variable') {
                    $available_variations = $product->get_available_variations();					
					
					
					echo "<div class='main_div'>";
					for($i=0;$i<count($available_variations);$i++){
							$variation_id=$available_variations[$i]['variation_id']; 
							$variable_product = new WC_Product_Variation( $variation_id );						
							$data[$i]['attributes'] = $variable_product ->attributes;
							$data[$i]['regular_price'] = $variable_product ->regular_price;
							$data[$i]['sales_price'] = $variable_product ->sale_price;
							$data[$i]['price'] = $variable_product ->price;
							$data[$i]['name'] = $variable_product ->name;
							$data[$i]['slug'] = $variable_product ->slug;
							
							$arr = explode(":", $variable_product ->attribute_summary);
							$data[$i]['attribute_summary'] = $arr[1];
							
							
							if($i==0){
								$checked = "checked"; 
							}
							else{
								$checked = ""; 
							}
						   echo '
						   
						   <button type="button" class="tbclass" for="price" onClick="showPrice('.$data[$i]['regular_price'].','.$data[$i]['sales_price'].','.$variation_id.');" '.$checked.'>'.$data[$i]['attribute_summary'].'
							</button>
								 '
								 ;
						     
						
						}
						echo "</div>";
						
						$str = "<s>৳".$data[0]['regular_price']."</s> ৳".$data[0]['price'];
						echo ' <div id="price">'.$str.'</div>';
		echo"<label class='form-control-label'' for='pubgplayerid''><b>Player ID :</b><span class='show_required'> *</span></label><input class='input-field' name='player_id' placeholder='এখানে আপনার গেমের Player ID বসান'  data-errormsg='দয়া করে নিচের বক্সে আপনার গেমের Player ID বসান' type='text'>";
						
		
		//echo '<form method="POST" action="">';
		
		//echo  '<input type="text" name="player_id" id="player_id" placeholder="Player ID">';
		
		echo "";
		echo '<input type="hidden" name="product_id" id="product_id" value="'.$product_id.'">';
		echo '<input type="hidden" name="variation_id" id="variation_id">';
		//echo '<input type="hidden" id="product_id">';
		$product = get_product($product_id);
echo '




<div class="main_11" style="display:flex;">

<div class="cll1" style="width:10%"></div>
		  <div class="cll3" style="display:flex; margin-top:10px;width:80%;justify-content: center;">
		<div class="input-group">
			<input type="button" value="-" class="button-minus" data-field="quantity">
			<input type="number" step="1" max="" value="1"name="quantity" id="quantity" class="quantity-field">
			<input type="button" value="+" class="button-plus" data-field="quantity">

	<input type="Submit" class="main_sub" style="background:#fb711d; color:white;" value="GO PAYMENT" onClick="add_to_cart();">

  </div>

  </div> 
  <div  class="cll1" style="width:10%"></div>
  
  </div>



';
		//echo '</form>';
		}


		?>





 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>








<style>
	
	
	label.form-control-label {
    margin-top: 40px;
}

input#quantity {
    position: relative;
    top: -1px;
}
		input.main_sub {
	    font-size: 13px;
    padding: 11px 20px;
    border-radius: 2px;
 margin: 1px 16px 0px 0px;
    font-weight: 600;
}

    
input,
textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #ffffff;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
	border: 2px solid #e6e6e6;
}
	
	
	.input-group input[type='button']:hover{
		background:#fb711d;
	}
	
	
	
	
	
	

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 45px;
  padding: 0;
  width: 38px;
  position: relative;
}

.input-group .quantity-field {
	border: 2px solid #e6e6e6;
  position: relative;
  height: 45px;
  left: -6px;
  text-align: center;
  width: 50px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

.button-plus {
  left: -13px;
}

input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}

</style>

<script>
function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});
</script>

<style>

	

	
	@media only screen and (max-width: 600px) {
  button.tbclass {
    width: 46%!important;
}
		
		button.tbclass {
    font-size: 12px;
}
		
		
		.cll3{
			width:100%!important;
		}
		.cll1{
			display:none!important;
		}
		
		.display_b{
			display:block !important;
		}
		
		button.tbclass {
    font-size: 11px;
}
}
	
	
	
	
input.input-field {
    margin-top: 10px;
    border-radius: 10px;
	    text-align: center;
}
label.form-control-label {
    text-align: center;
    /* margin: auto; */
    display: block;
}

button.tbclass:hover{
	border:2px solid #fb711d;
}

button.tbclass {
	    font-size: 15px;
	    font-family: lato !important;
    width: 48%;
    margin-right: 10px;
    margin-top: 10px;
}

button.tbclass {
    background: white;
    color: black;
   border: 2px solid #ddd;
    border-radius: 5px;
}
	
		button.tbclass:hover{
		background:white;
			color:black;
	}
	
	
	button.tbclass:focus{
		background:#ffdfdf;
		color:black;
		border: 2px solid #fb711d
	}


</style>

<script>
 function showPrice(regular_price,sales_price,variation_id){
	  document.getElementById("price").innerHTML = "<s>৳"+regular_price+"</s> ৳"+sales_price;
	  document.getElementById("variation_id").value = variation_id;
	 
 }
 
 	//var jq = jQuery.noConflict();
 function add_to_cart(){	
	 
	 $.ajax({
						type: "POST", 
						url: "<?=plugin_dir_url( __FILE__ ) . 'ajax_add_cart.php'?>",
						data: { 								
									product_id   : $('#product_id').val(),
									quantity   : $('#quantity').val(),
									variation_id   : $('#variation_id').val(),
									player_id   : $('#player_id').val(),
							  },
					success: function (data, text) {				
						    
							var obj = JSON.parse(data);
						
						  if(obj.status=='success'){
							  window.location = 'https://bbc.bornoshopbd.com/cart';
							  
						  }
					  },
					  error: function (xhr, ajaxOptions, thrownError) {
							alert(xhr.status);
							alert(thrownError);
						  }
					});
	 
 }
 </script>

<?php
	
}
 ob_get_clean();
 ?>
