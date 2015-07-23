<?php
// Define Basics
define( 'TEMPPATH', get_stylesheet_directory_uri());
define( 'IMAGES', TEMPPATH. "/img");

//Add support for feed links
add_theme_support( 'automatic-feed-links' );

//Set maximum content width
if ( ! isset( $content_width ) ) $content_width = 577;

// Register Sideabar
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array (
		'name' => __( 'Primary Sidebar', 'primary-sidebar' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'dir' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

/*-------------------------------------------------*/
/*	OPTION TREE
/*-------------------------------------------------*/

add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'includes/ava_theme_options.php' );

/*-------------------------------------------------*/
/*	JAVASCRIPT FILES
/*-------------------------------------------------*/

	function ava_register_js() {
			
			wp_register_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js',array('jquery'),'1.0', TRUE);
			wp_register_script('waypoints_sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js',array('jquery'),'1.0', TRUE);
			wp_register_script('cycle', get_template_directory_uri() . '/js/jquery.cycle2.js',array('jquery'),'1.0', TRUE);		
			wp_register_script('lettering', get_template_directory_uri().'/js/jquery.lettering.js',array('jquery'),'1.0', TRUE);
			wp_register_script('textillate', get_template_directory_uri().'/js/jquery.textillate.js',array('jquery'),'1.0', TRUE);
			wp_register_script('custom', get_template_directory_uri() . '/js/script.js',array('jquery'),'1.0', TRUE);
			wp_register_script('smoothscroll', get_template_directory_uri() . '/js/jquery.smooth-scroll.min.js',array('jquery'),'1.0', TRUE);
			wp_register_script('parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js',array('jquery'),'1.0', TRUE);	
			wp_register_script('pace', get_template_directory_uri() . '/js/pace.min.js',array('jquery'),'1.0', TRUE);		
			wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.js',array('jquery'),'1.0', TRUE);

			wp_enqueue_script('jquery',TRUE);
			wp_enqueue_script('waypoints');		
			wp_enqueue_script('pace');
			wp_enqueue_script('parallax');		
			wp_enqueue_script('waypoints_sticky');
			wp_enqueue_script('cycle');
			wp_enqueue_script('isotope');
			wp_enqueue_script('lettering');
			wp_enqueue_script('textillate');
			wp_enqueue_script('smoothscroll');		
			wp_enqueue_script('custom');
			
			wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
			wp_enqueue_style('fontawesome', get_template_directory_uri() . '/font/font-awesome.min.css');	
			wp_enqueue_style('montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');			
			wp_enqueue_style('opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300');	
			
	} add_action('wp_enqueue_scripts', 'ava_register_js');


	
	
	
	
// Thumbnail Support
add_theme_support('post-thumbnails');
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Limit Post Title Length
function ava_trim_title() {
	$title = get_the_title();
	$limit = "17";
	$pad="...";

	if(strlen($title) <= $limit) {
	echo $title;
		} else {
		$title = substr($title, 0, $limit) . $pad;
		echo $title;
	}
} 

// Limit Excerpt Length
function custom_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Shortcodes
require_once('includes/ava_shortcodes.php');

/*-------------------------------------------------*/
/*	NAVIGATION SETTINGS
/*-------------------------------------------------*/	
	
	// Register menu
	function ava_register_menus() {
		register_nav_menus( array( 'top-menu' => 'Top primary menu') );
	} add_action('init', 'ava_register_menus');

	// Custom walker
	class description_walker extends Walker_Nav_Menu{
		  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
			   //global $wp_query;
			   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			   $class_names = $value = '';
			   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
			   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			   $class_names = ' class="'. esc_attr( $class_names ) . '"';
			   $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			   $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			   $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			   if($item->object == 'page'){
					$varpost = get_post($item->object_id);
					$attributes .= ' href="' . get_site_url() . '#' . $varpost->post_name . '"';
			   } else 
				$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
				$args = (object) $args;
				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		        
		 }
	}


/*-------------------------------------------------*/
/*	COMMENTS STRUCTURE
/*-------------------------------------------------*/	
	
	// Comments
	function ava_custom_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) :
		case '' : ?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<div class="comments">
				<div class="avatar"><?php  echo get_avatar($comment, 50); ?></div>
				<div class="comment-desc">
					<div class="comment-by">
						<strong><?php printf(__('%s ', 'boilerplate'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?></strong>
						<span class="reply"><span style="color: #ccc">/ </span>
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span> 
						<span class="date"> <?php printf(__('%1$s at %2$s', 'boilerplate'), get_comment_date(), get_comment_time());?> </span>
					</div>

						<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Your comment is awaiting moderation.', 'avalance'); ?></em>
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>

			<?php
			break;
			case 'pingback' :
			case 'trackback' :
			?>
			<li class="post pingback">
				<p><?php _e('Pingback:', 'boilerplate'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'boilerplate'), ' '); ?></p>
				<?php
				break;
				endswitch;
	}	
	
/*-------------------------------------------------*/
/*	TGM
/*-------------------------------------------------*/

	require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'ava_required_plugins' );

	function ava_required_plugins() {

		$plugins = array(
			array(
				'name'     				=> 'AvaLance Portfolio Post Type',
				'slug'     				=> 'portfolio-post-type', 
				'source'   				=> get_stylesheet_directory() . '/plugins/portfolio-post-type.zip', 
				'required' 				=> true,
				'force_deactivation' 	=> true,
			),
		);

		$theme_text_domain = 'tgmpa';

		$config = array(
			'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );

	}












?>