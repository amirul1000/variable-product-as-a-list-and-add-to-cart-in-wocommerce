<?php

session_start();
require_once(  dirname(__FILE__)  .'/../../../wp-load.php' );
$id = "";

WC()->session->set_customer_session_cookie( true );
$id = WC()->cart->add_to_cart( $_REQUEST['product_id'], $_REQUEST['quantity'], $_REQUEST['variation_id'], $attributes, 
						array('player_id'=> $_REQUEST['player_id']) );
						
			echo json_encode(array('status'=>'success','id'=>$id));		
?>
