<?php
/*
Plugin Name: Funciones
Plugin URI: http://ricardorosendo.com
Description: Plugin para liberar de funciones el fichero <code>functions.php</code> y activarlo a placer (o no) .
Version: 0.1
Author: Ricardo Rosendo
Author URI: http://ricardorosendo.com
License: GPLv2 o posterior
*/

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

//Cambiar texto alt del logo de login
add_action("login_headertitle","my_custom_login_title");
function my_custom_login_title()
{
return 'Otro sitio creado por Fernando Tellado';
}
