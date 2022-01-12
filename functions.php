<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [] );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

function update_menu_links($items){
  if( !is_front_page() ) {
    foreach($items as $item){
      if( in_array('quicklinks', $item->classes) ) {
        $item->url = 'https://everybabycountsnv.org/'.$item->url;
      }
    }
  }
  return $items;
}
add_filter('wp_nav_menu_items', 'update_menu_links', 10 );