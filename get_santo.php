<?php
/**
 * @package Get_Sant
 * @version 1.0.0
 */
/*
Plugin Name: Get Santo
Plugin URI: not published
Description: This is just a plugin
Author: Paulo Nakaima
Version: 1.0.0
Author URI: https://github.com/guimpo
*/

add_action('wp_enqueue_scripts', 'load_js');

function load_js() {
  wp_register_script('get_santo', plugins_url('get_santo.js', __FILE__), array('jquery'));
  wp_enqueue_script('get_santo');
}

function request_cancao_nova() {
  $url = 'http://santo.cancaonova.com/';
  
  $response = wp_remote_get( $url, $args );

  if ( is_array( $response ) ) {
    $header = $response['headers']; // array of http header lines
    $body = $response['body']; // use the content
    return $body;
  }
  return "página não encontrada";
}



add_action( 'wp_enqueue_scripts', 'almost_crawler' );

function almost_crawler(){
    //Registrando o script, o arquivo exemplo.js não precisa, necessariamente, ter nada dentro, mas é necessário tê-lo junto ao tema.
    wp_register_script( 'get_santo', plugins_url('get_santo.js', __FILE__) );
    //Chamo o script para estar sendo carregado junto aos demais scripts da aplicação.
    wp_enqueue_script('get_santo');

    $full_site = request_cancao_nova();
 
    $pieces = explode("<article", $full_site)[1];
    $pieces = explode("article>", $pieces)[0];

    // //Monto o array em que vou passar os dados ao Javascript, neste caso com apenas 1 posição.
    $arrayData = array('variavel_exemplo' => $pieces, 'full_site' => $full_site);
    //Realizo a chamada ao método.
    wp_localize_script('get_santo', 'objeto_javascript', $arrayData);
}