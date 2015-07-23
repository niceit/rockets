<?php 
/*
Plugin Name: AvaLance Portfolio Post Type
Plugin URI:  http://www.eriktailor.com
Description: AvaLance custom portfolio post type
Version:     1.0.0
Author:      ErikTailor
Author URI:  http://www.eriktailor.com
*/

// Portfolio CPT Register
add_action('init', 'portfolio_register_post_type');
function portfolio_register_post_type() {
    register_post_type('portfolio', array(
    'labels' => array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
    ),
    'public' => true,
	'menu_icon' => TEMPPATH. '/includes/img/ava_portfolio_icon.png', 
    'supports' => array('title', 'thumbnail', 'editor'),	
    'taxonomies' => array('post_tag','filters')
    ));
}

// Register Filter Taxonomy
add_action( 'init', 'register_taxonomy_filters' );
function register_taxonomy_filters() {

    $labels = array( 
        'name' => __( 'Filters', 'avalance' ),
        'singular_name' => __( 'Filter', 'avalance' ),
        'search_items' => __( 'Search Filters', 'avalance' ),
        'popular_items' => __( 'Popular Filters', 'avalance' ),
        'all_items' => __( 'All Filters', 'avalance' ),
        'parent_item' => __( 'Parent Filter', 'avalance' ),
        'parent_item_colon' => __( 'Parent Filter:', 'avalance' ),
        'edit_item' => __( 'Edit Filter', 'avalance' ),
        'update_item' => __( 'Update Filter', 'avalance' ),
        'add_new_item' => __( 'Add New Filter', 'avalance' ),
        'new_item_name' => __( 'New Filter', 'avalance' ),
        'separate_items_with_commas' => __( 'Separate Filters with commas', 'avalance' ),
        'add_or_remove_items' => __( 'Add or remove Filters', 'avalance' ),
        'choose_from_most_used' => __( 'Choose from the most used Filters', 'avalance' ),
        'menu_name' => __( 'Filters', 'avalance' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'filters', array('portfolio'), $args );
}

// Adds terms from a custom taxonomy to post_class
add_filter( 'post_class', 'theme_t_wp_taxonomy_post_class', 10, 3 );
 
function theme_t_wp_taxonomy_post_class( $classes, $class, $ID ) {
    $taxonomy = 'filters';
    $terms = get_the_terms( (int) $ID, $taxonomy );
    if( !empty( $terms ) ) {
        foreach( (array) $terms as $order => $term ) {
            if( !in_array( $term->slug, $classes ) ) {
                $classes[] = $term->slug;
            }
        }
    }
    return $classes;
}

// Display Post Thumbnail in Post Listing
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'avalance');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'featured-thumbnail' );
    }
}
?>