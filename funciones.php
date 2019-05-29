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

// personalizar url logo acceso
add_action( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url() {
return 'http://ayudawp.com';
}
