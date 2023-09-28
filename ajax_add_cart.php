<?php
session_start();
require_once(  dirname(__FILE__)  .'/../../../../../../wp-load.php' );

WC()->session->set_customer_session_cookie( true );
$id = WC()->cart->add_to_cart( $_POST['product_id'], $_POST['quantity'], $_POST['variation_id'], $attributes, 
						array('player_id'=> $_POST['player_id']) );
						
			echo json_encode(array('status'=>'success','id'=>$id));			
?>