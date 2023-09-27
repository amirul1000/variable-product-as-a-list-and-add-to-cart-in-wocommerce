<?php
/**
  Plugin Name: WooCommerce Product Info
  Plugin URI: 
  Description: 
  Author: Amirul
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
		echo"<label class='form-control-label'' for='pubgplayerid''>Player ID :<span class='show_required'> *</span></label><input class='input-field' placeholder='এখানে আপনার গেমের Player ID বসান'  data-errormsg='দয়া করে নিচের বক্সে আপনার গেমের Player ID বসান' type='text'>";
						
		
		echo '<form method="POST" action="">';
		echo "<input type='number' style='width: 11%; margin-top: 21px;' class='input-text qty text' name='quantity' 
		id='quantity' value='1' aria-label='Product quantity' size='4' min='1' max='' step='1' placeholder='' inputmode='numeric' autocomplete='off'>";
		echo '<input type="hidden" name="variation_id" id="variation_id">';
		//echo '<input type="hidden" id="product_id">';
		$product = get_product($product_id);
echo '<input type="Submit" value=" ...add to cart ">';
		echo '</form>';
		
		    if($_POST){				
		        WC()->cart->add_to_cart( $product_id, $_POST['quantity'], $_POST['variation_id'], $attributes, array() );	
				
				
			   if ( wp_redirect( '') ) {
					exit;
				}	
				 echo  '<meta http-equiv="refresh" content="0; url = https://bbc.bornoshopbd.com/cart/" />';
				
			}

			   
		}


		?>


<style>

	

	
	@media only screen and (max-width: 600px) {
  button.tbclass {
    width: 46%!important;
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
    width: 48%;
    margin-right: 10px;
    margin-top: 10px;
}

button.tbclass {
    background: white;
    color: black;
   border: 2px solid #ddd;
    border-radius: 10px;
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
 </script>

<?php
	
}
 ob_get_clean();
 ?>