<?php
/**
* Register Film Post
*
* @author Victor Sylva
* @link http://www.netorionsolutions.com
*/

add_action( 'init', 'rv_film_cpt' );
function rv_film_cpt() {

   $labels = array(
       'name' => _x( 'Film', 'post type general name', 'engwp' ),
       'singular_name' => _x( 'Film', 'post type singular name', 'engwp' ),
       'menu_name' => _x( 'Films', 'admin menu', 'engwp' ),
       'name_admin_bar' => _x( 'Film', 'add new on admin bar', 'engwp' ),
       'add_new' => _x( 'Add New', 'Film', 'engwp' ),
       'add_new_item' => __( 'Add New Film', 'engwp' ),
       'new_item' => __( 'New Film', 'engwp' ),
       'edit_item' => __( 'Edit Film', 'engwp' ),
       'view_item' => __( 'View Film', 'engwp' ),
       'all_items' => __( 'All Films', 'engwp' ),
       'search_items' => __( 'Search Films', 'engwp' ),
       'parent_item_colon' => __( 'Parent Film:', 'engwp' ),
       'not_found' => __( 'No Films found.', 'engwp' ),
       'not_found_in_trash' => __( 'No Films found in Trash.', 'engwp' )
  );

  $args = array(
      'description' => __( 'Film', 'engwp' ),
      'labels' => $labels,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions' ), 
      'hierarchical' => false,
      'public' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'films' ),
      'show_ui' => true,
      'menu_icon' => 'dashicons-format-video',
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'capability_type' => 'post',
 );

  register_post_type( 'film', $args );

}

