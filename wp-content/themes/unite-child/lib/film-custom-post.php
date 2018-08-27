<?php
/**
* Register Film Type
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
   // i removed comments to disable comments.
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

add_action( 'init', 'rv_create_film_taxonomies' );
function rv_create_film_taxonomies() {

   // Add new taxonomy, make it non-hierarchical (like tags)
   $labels = array(
      'name' => _x( 'Year Made', 'taxonomy general name' ),
      'singular_name' => _x( 'Year', 'taxonomy singular name' ),
      'search_items' => __( 'Search Years' ),
      'all_items' => __( 'All Years' ),
      'parent_item' => __( 'Parent Year' ),
      'parent_item_colon' => __( 'Parent Year:' ),
      'edit_item' => __( 'Edit Year' ),
      'update_item' => __( 'Update Year' ),
      'add_new_item' => __( 'Add New Year' ),
      'new_item_name' => __( 'New Year Name' ),
      'separate_items_with_commas' => __( 'Separate Years with commas' ),
      'add_or_remove_items' => __( 'Add or remove Years' ),
      'choose_from_most_used' => __( 'Choose from the most used Years' ),
      'not_found' => __( 'No Years found.' ),
      'menu_name' => __( 'Year Made' ),
  );

  $args = array(
      'hierarchical' => false,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'update_count_callback' => '_update_post_term_count',
   // 'query_var' => true,
   // 'show_in_nav_menus' => false,
      'public' => true,
      'publicly_queryable' => true,
      'has_archive' => true,
  );

  $years = array( 'rewrite' => array( 'slug' => 'film-year' ) );
  $film_args = array_merge( $args, $years );

  register_taxonomy( 'film_years', 'film', $film_args );

}


//* Create Film Type custom taxonomy (category)
add_action( 'init', 'custom_type_taxonomy' );
function custom_type_taxonomy() {

   register_taxonomy( 'film-type', 'film',
     array(
        'labels' => array(
        'name' => _x( 'Film Category', 'taxonomy general name', 'text_domain' ),
        'add_new_item' => __( 'Add New Film Category', 'text_domain' ),
        'new_item_name' => __( 'New Film Type', 'text_domain' ),
     ),
       'exclude_from_search' => true,
       'has_archive' => true,
       'hierarchical' => true,
       'rewrite' => array( 'slug' => 'film-type', 'with_front' => false ),
       'show_ui' => true,
       'show_tagcloud' => false,
   )
);

}