<?php
/*
Plugin Name: Funciones Personalizadas
Plugin URI: http://ricardorosendo.com
Description: Plugin para liberar de funciones el fichero <code>functions.php</code> y demas.
Version: 0.2
Author: Ricardo Rosendo
Author URI: http://ricardorosendo.com
License: GPLv2 o posterior
*/

//personalizar el tipo de archivo a subir en multimedia
add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
function my_myme_types( $mime_types ) {  	  	
	$mime_types['csv'] = '	text/csv'; // Adding .csv extension  
	//$mime_types['json'] = 'application/json'; // Adding .json extension  
	//unset( $mime_types['docx'] ); // Remove .xlsx extension  
	//unset( $mime_types['doc'] ); // Remove .xlsx extension  
	//unset( $mime_types['csv'] ); // Remove .xlsx extension  				
  return $mime_types;
}
// fin personalizar el tipo de archivo 

// Quitar intervalo de precios en productos variables de WooCommerce
function martin_quitar_intervalo( $price, $product ) {
    // Precio normal
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( 'Desde: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
    // Precio rebajado
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'Desde: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
    if ( $price !== $saleprice ) {
        $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
    }     
    return $price;
} 
add_filter( 'woocommerce_variable_sale_price_html', 'martin_quitar_intervalo', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'martin_quitar_intervalo', 10, 2 );
//fin Quitar intervalo

// Logo personalizado en login
add_action("login_head", "my_login_head");
function my_login_head() {
echo "
<style>
 body.login #login h1 a {
 background: url('".get_bloginfo('template_url')."/images/awloginlogo.png') no-repeat scroll center top transparent;
 height: 135px;
 width: 135px;
 }
</style>
";
}
//find Logo personalizado

// personalizar url logo acceso
add_action( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url() {
return 'http://ayudawp.com';
}
//find personalizar url
