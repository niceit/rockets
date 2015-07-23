<?php  

/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'ava_custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function ava_custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'General',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>',
    ),
    'sections'        => array(
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'header',
        'title'       => 'Header'
      ),
      array(
        'id'          => 'slider',
        'title'       => 'Slider'
      ),
      array(
        'id'          => 'team',
        'title'       => 'Our Team'
      ),
      array(
        'id'          => 'process',
        'title'       => 'Our Process'
      ),
      array(
        'id'          => 'services',
        'title'       => 'Our Services'
      ),
      array(
        'id'          => 'contact',
        'title'       => 'Contact'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer'
      )	  
    ),
    'settings'        => array(

//--------------------------------------------
//	GENERAL OPTIONS
//--------------------------------------------

		// Site Logo
		array(
			'id'          => 'ava_site_logo',
			'label'       => 'Site Logo',
			'desc'        => 'Upload your site logo (160x30px)',
			'type'        => 'upload',
			'section'     => 'general',
			'class'       => ''
		),
		
		// Site Logo
		array(
			'id'          => 'ava_site_favicon',
			'label'       => 'Site Favicon',
			'desc'        => 'Upload your site favicon (16x16px)',
			'type'        => 'upload',
			'section'     => 'general',
			'class'       => ''
		),

		array(
			'id'          => 'ava_color_scheme',
			'label'       => 'Color Scheme',
			'desc'        => 'Choose color scheme',
			'type'        => 'radio-image',
			'section'     => 'general',
			'class'       => '',
			'std'         => 'warm',
			'choices'     => array(
			  array(
				'value'   => 'warm',
				'label'   => 'Warm',
				'src'     => OT_URL . '/assets/images/colors/color_01.png'
			  ),			  
			  array(
				'value'   => 'cold',
				'label'   => 'Cold',
				'src'     => OT_URL . '/assets/images/colors/color_02.png'
			  ),
			  array(
				'value'   => 'blue',
				'label'   => 'Blue',
				'src'     => OT_URL . '/assets/images/colors/color_03.png'
			  ),
			  array(
				'value'   => 'red',
				'label'   => 'Red',
				'src'     => OT_URL . '/assets/images/colors/color_04.png'
			  ),
			  array(
				'value'   => 'green',
				'label'   => 'Green',
				'src'     => OT_URL . '/assets/images/colors/color_05.png'
			  )			  
			)
		),		
		
		
		// 404 Text
		array(
			'id'          => 'ava_fourohfour_text',
			'label'       => '404 Text',
			'desc'        => 'Type text to show up on 404 (Page not found) page',
			'type'        => 'text',
			'section'     => 'general',
			'class'       => '',
			'std'         => "Sorry, the page are you looking for doesn't exist. Go around the block, or just tap the button below to get to the home page."
		),		
	
//--------------------------------------------
//	HEADER OPTIONS
//--------------------------------------------
	
		// Header Logo
		array(
			'id'          => 'ava_header_logo',
			'label'       => 'Header Logo',
			'desc'        => 'Upload your header logo',
			'type'        => 'upload',
			'section'     => 'header',
			'class'       => ''
		),

		// Header Animated Title 1
		array(
			'id'          => 'ava_header_animated_title_first',
			'label'       => 'Header Animated Titles',
			'desc'        => 'Type first line of your animated title',
			'type'        => 'text',
			'section'     => 'header',
			'class'       => ''
		),
		
		// Header Animated Title 2
		array(
			'id'          => 'ava_header_animated_title_second',
			'label'       => '',
			'desc'        => 'Type second line of your animated title (leave blank if not needed)',
			'type'        => 'text',
			'section'     => 'header',
			'class'       => ''
		),
		
		// Header Title Effect
		array(
			'id'          => 'ava_header_animated_title_effect_in',
			'label'       => 'Header Animate In Title Effect',
			'desc'        => 'Set the animate in effect for header title',
			'type'        => 'select',
			'section'     => 'header',
			'choices'     => array(
				array('value'   => 'flash',     	    'label' => 'flash'),
				array('value'   => 'bounce',     	    'label' => 'bounce'), 
				array('value'   => 'shake',     	    'label' => 'shake'),
				array('value'   => 'tada',      		'label' => 'tada'),
				array('value'   => 'swing',             'label' => 'swing'), 
				array('value'   => 'wobble',    	    'label' => 'wobble'), 
				array('value'   => 'pulse',             'label' => 'pulse'), 
				array('value'   => 'flip',              'label' => 'flip'), 
				array('value'   => 'flipInX',           'label' => 'flipInX'), 
				array('value'   => 'flipInY',           'label' => 'flipInY'), 
				array('value'   => 'fadeIn',            'label' => 'fadeIn'), 
				array('value'   => 'fadeInUp',          'label' => 'fadeInUp'), 
				array('value'   => 'fadeInDown',        'label' => 'fadeInDown'), 
				array('value'   => 'fadeInLeft',        'label' => 'fadeInLeft'), 
				array('value'   => 'fadeInRight',       'label' => 'fadeInRight'), 
				array('value'   => 'fadeInUpBig',       'label' => 'fadeInUpBig'), 
				array('value'   => 'fadeInDownBig',     'label' => 'fadeInDownBig'), 
				array('value'   => 'fadeInLeftBig',     'label' => 'fadeInLeftBig'), 
				array('value'   => 'fadeInRightBig',    'label' => 'fadeInRightBig'), 
				array('value'   => 'bounceIn',          'label' => 'bounceIn'), 
				array('value'   => 'bounceInDown',      'label' => 'bounceInDown'), 
				array('value'   => 'bounceInUp',        'label' => 'bounceInUp'), 
				array('value'   => 'bounceInLeft',      'label' => 'bounceInLeft'), 
				array('value'   => 'bounceInRight',     'label' => 'bounceInRight'), 
				array('value'   => 'rotateIn',          'label' => 'rotateIn'), 
				array('value'   => 'rotateInDownLeft',  'label' => 'rotateInDownLeft'), 
				array('value'   => 'rotateInDownRight', 'label' => 'rotateInDownRight'), 
				array('value'   => 'rotateInUpLeft',    'label' => 'rotateInUpLeft'), 
				array('value'   => 'rotateInUpRight',   'label' => 'rotateInUpRight'), 
				array('value'   => 'rollIn',            'label' => 'rollIn') 	
			)
		),
		
		// Header Title Effect
		array(
			'id'          => 'ava_header_animated_title_effect_out',
			'label'       => 'Header Animate Out Title Effect',
			'desc'        => 'Set the animate out effect for header title',
			'type'        => 'select',
			'section'     => 'header',
			'choices'     => array(
				array('value'   => 'flash',     	     'label' => 'flash'),
				array('value'   => 'bounce',     	     'label' => 'bounce'),
				array('value'   => 'shake',     	     'label' => 'shake'),
				array('value'   => 'tada',     	         'label' => 'tada'),
				array('value'   => 'swing',     	     'label' => 'swing'),
				array('value'   => 'wobble',     	     'label' => 'wobble'),
				array('value'   => 'pulse',     	     'label' => 'pulse'),
				array('value'   => 'flip',     	         'label' => 'flip'),
				array('value'   => 'flipOutX',     	     'label' => 'flipOutX'),
				array('value'   => 'flipOutY',     	     'label' => 'flipOutY'),
				array('value'   => 'fadeOut',     	     'label' => 'fadeOut'),
				array('value'   => 'fadeOutUp',     	 'label' => 'fadeOutUp'),
				array('value'   => 'fadeOutDown',     	 'label' => 'fadeOutDown'),
				array('value'   => 'fadeOutLeft',     	 'label' => 'fadeOutLeft'),
				array('value'   => 'fadeOutRight',     	 'label' => 'fadeOutRight'),
				array('value'   => 'fadeOutUpBig',     	 'label' => 'fadeOutUpBig'),
				array('value'   => 'fadeOutDownBig',     'label' => 'fadeOutDownBig'),
				array('value'   => 'fadeOutLeftBig',     'label' => 'fadeOutLeftBig'),
				array('value'   => 'fadeOutRightBig',    'label' => 'fadeOutRightBig'),
				array('value'   => 'bounceOut',     	 'label' => 'bounceOut'),
				array('value'   => 'bounceOutDown',      'label' => 'bounceOutDown'),
				array('value'   => 'bounceOutUp',     	 'label' => 'bounceOutUp'),
				array('value'   => 'bounceOutLeft',      'label' => 'bounceOutLeft'),
				array('value'   => 'bounceOutRight',     'label' => 'bounceOutRight'),
				array('value'   => 'rotateOut',     	 'label' => 'rotateOut'),
				array('value'   => 'rotateOutDownLeft',  'label' => 'rotateOutDownLeft'),
				array('value'   => 'rotateOutDownRight', 'label' => 'rotateOutDownRight'),
				array('value'   => 'rotateOutUpLeft',    'label' => 'rotateOutUpLeft'),
				array('value'   => 'rotateOutUpRight',   'label' => 'rotateOutUpRight'),
				array('value'   => 'hinge',     	     'label' => 'hinge'),
				array('value'   => 'rollOut',     	     'label' => 'rollOut')	
			)
		),
		
		// Header Animated Title Loop
		array(
			'id'          => 'ava_header_animated_title_loop',
			'label'       => 'Header Animated Title Loop',
			'desc'        => 'Loop the animated title to so play it forever',
			'type'        => 'radio',
			'std' 		  => 'true',
			'section'     => 'header',
			'class'       => '',
			'choices'     => array(
				array(
				'label'   => 'yes',
				'value'   => 'true'				
				),
				array(
				'label'   => 'no',
				'value'   => 'false'				
				)
			)
		),		
		
		// Header Intro Text
		array(
			'id'          => 'ava_header_intro_text',
			'label'       => 'Header Intro Text',
			'desc'        => 'Type your small intro text for header (leave blank if not needed)',
			'type'        => 'text',
			'section'     => 'header',
			'class'       => ''
		),
			
//--------------------------------------------
//	SLIDER OPTIONS
//--------------------------------------------

		// Display Slider
		array(
			'id'          => 'ava_slider_display',
			'label'       => 'Display',
			'desc'        => '',
			'std'         => 'checked',
			'type'        => 'checkbox',
			'section'     => 'slider',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'choices'     => array( 
			  array(
				'value'       => 'checked',
				'label'       => 'Display Slider',
				'src'         => ''
			  )
			),
		),
		  
		// Pattern Overlay
		array(
			'id'          => 'ava_pattern_overlay',
			'label'       => 'Pattern Overlay',
			'desc'        => 'Choose pattern overlay for the slider',
			'type'        => 'radio-image',
			'section'     => 'slider',
			'class'       => '',
			'choices'     => array(
			  array(
				'value'   => '',
				'label'   => 'None',
				'src'     => OT_URL . '/assets/images/patterns/pattern_00.png'
			  ),
			  array(
				'value'   => 'pattern-01',
				'label'   => 'Pattern 1',
				'src'     => OT_URL . '/assets/images/patterns/pattern_01.png'
			  ),			  
			  array(
				'value'   => 'pattern-02',
				'label'   => 'Pattern 2',
				'src'     => OT_URL . '/assets/images/patterns/pattern_02.png'
			  ),
			  array(
				'value'   => 'pattern-03',
				'label'   => 'Pattern 3',
				'src'     => OT_URL . '/assets/images/patterns/pattern_03.png'
			  ),
			  array(
				'value'   => 'pattern-04',
				'label'   => 'Pattern 4',
				'src'     => OT_URL . '/assets/images/patterns/pattern_04.png'
			  )			  
			)
		),
		
	  // Slider Options
      array(
        'id'          => 'ava_slides',
        'label'       => 'Slides',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'slider',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(		
          array(
            'id'      => 'ava_slider_image',
            'label'   => 'Slide',
            'desc'    => 'Upload image for this slide (2000x800px)',
            'type'    => 'upload',
          )		  
        )
      ),		

//--------------------------------------------
//	OUR TEAM OPTIONS
//--------------------------------------------

	  // Team Members
      array(
        'id'          => 'ava_team_members',
        'label'       => 'Team Members',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'team',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'ava_team_member_name',
            'label'   => 'Name',
            'desc'    => 'Name of team member',
            'type'    => 'text',
          ),		
          array(
            'id'      => 'ava_team_member_thumb',
            'label'   => 'Thumbnail',
            'desc'    => 'Upload thumbnail image for team member',
            'type'    => 'upload',
          ),
          array(
            'id'      => 'ava_team_member_image',
            'label'   => 'Large Image',
            'desc'    => 'Upload large image for team member',
            'type'    => 'upload',
          ),
          array(
            'id'      => 'ava_team_member_job',
            'label'   => 'Applied Job',
            'desc'    => 'Job of team member',
            'type'    => 'text',
          ),
          array(
            'id'      => 'ava_team_member_info',
            'label'   => 'Information',
            'desc'    => 'Team member information',
            'type'    => 'text',
          ),
          array(
            'id'      => 'ava_team_member_exp',
            'label'   => 'Experiences',
            'desc'    => 'Team member experiences',
            'type'    => 'text',
          ),
          array(
            'id'      => 'ava_team_member_twitter',
            'label'   => 'Twitter URL',
            'desc'    => 'Team member twitter profile',
            'type'    => 'text',
          ),
          array(
            'id'      => 'ava_team_member_facebook',
            'label'   => 'Facebook URL',
            'desc'    => 'Team member facebook profile',
            'type'    => 'text',
          ),		  
        )
      ),
	  
//--------------------------------------------
//	PROCESS OPTIONS
//--------------------------------------------

		// Header Intro Text
	   array(
		'id'          => 'ava_processes_bg',
		'label'       => 'Background Image',
		'desc'        => 'Upload background image for the processes section (2000x1300px)',
		'type'        => 'upload',
		'section'     => 'process',
		'class'       => ''
	   ),

	  // Work Processes
      array(
        'id'          => 'ava_processes',
        'label'       => 'Work Process Parts',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'process',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(		
          array(
            'id'      => 'ava_process_thumb',
            'label'   => 'Process Thumbnail',
            'desc'    => 'Upload thumbnail image for process part',
            'type'    => 'upload',
          ),
          array(
            'id'      => 'ava_process_large_image',
            'label'   => 'Description Image',
            'desc'    => 'Upload image for process description',
            'type'    => 'upload',
          ),
          array(
            'id'      => 'ava_process_desc',
            'label'   => 'Description',
            'desc'    => 'Type description for process part',
            'type'    => 'textarea',
          ),		  
        )
      ),
	  
//--------------------------------------------
//	SERVICES OPTIONS
//--------------------------------------------

	  // Service Boxes
      array(
        'id'          => 'ava_services',
        'label'       => 'Service Boxes',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'services',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(		
          array(
            'id'      => 'ava_service_icon',
            'label'   => 'Icon',
            'desc'    => 'Add icon name for service. Choose the <a href="http://fortawesome.github.io/Font-Awesome/">icon references</a> ',
            'type'    => 'text',
          ),
          array(
            'id'      => 'ava_service_link',
            'label'   => 'Link',
            'desc'    => 'Type URL if you want to link the service (leave blank if not needed)',
            'type'    => 'text',
          )		  
        )
      ),
	  
	  // Testimonials
      array(
        'id'          => 'ava_testimonials',
        'label'       => 'Testimonials',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'services',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(		
          array(
            'id'      => 'ava_testimonial_desc',
            'label'   => 'Testimonial Description',
            'desc'    => 'Add the testimonial text',
            'type'    => 'text',
          ),
          array(
            'id'      => 'ava_testimonial_thumb',
            'label'   => 'Client Avatar',
            'desc'    => 'Upload client avatar for testimonial',
            'type'    => 'upload',
          )		  
        )
      ),

//--------------------------------------------
//	CONTACT OPTIONS
//--------------------------------------------

		// Contact Details
		array(
			'id'          => 'ava_contact_details',
			'label'       => 'Contact Details',
			'type'        => 'list-item',
			'section'     => 'contact',
			'choices'     => array(),
			'settings'    => array(		
			  array(
				'id'      => 'ava_contact_detail_email',
				'label'   => 'Email Address',
				'desc'    => 'Type email address for this contact detail',
				'type'    => 'text',
			  ),
			  array(
				'id'      => 'ava_contact_detail_phone',
				'label'   => 'Phone Number',
				'desc'    => 'Type phone number for this contact detail',
				'type'    => 'text',
			  )		  
			)
		),

	    // Office 1
		array(
			'id'          => 'ava_office_one_image',
			'label'       => 'Office 1',
			'desc'        => 'Upload map image of first office',
			'type'        => 'upload',
			'section'     => 'contact',
		),
		
		array(
			'id'          => 'ava_office_one_title',
			'label'       => '',
			'desc'        => 'Type title or city for first office',
			'type'        => 'text',
			'section'     => 'contact',
		),		

		array(
			'id'          => 'ava_office_one_address',
			'label'       => '',			
			'desc'        => 'Type address of first office',
			'type'        => 'text',
			'section'     => 'contact',
		),

		array(
			'id'          => 'ava_office_one_phone',
			'label'       => '',			
			'desc'        => 'Type phone number of first office',
			'type'        => 'text',
			'section'     => 'contact',
		),

		array(
			'id'          => 'ava_office_one_email',
			'label'       => '',			
			'desc'        => 'Type email address of first office',
			'type'        => 'text',
			'section'     => 'contact',
		),

	    // Office 2
		array(
			'id'          => 'ava_office_two_image',
			'label'       => 'Office 2',
			'desc'        => 'Upload map image of second office',
			'type'        => 'upload',
			'section'     => 'contact',
		),
		
		array(
			'id'          => 'ava_office_two_title',
			'label'       => '',			
			'desc'        => 'Type title or city for second office',
			'type'        => 'text',
			'section'     => 'contact',
		),		

		array(
			'id'          => 'ava_office_two_address',
			'label'       => '',			
			'desc'        => 'Type address of second office',
			'type'        => 'text',
			'section'     => 'contact',
		),

		array(
			'id'          => 'ava_office_two_phone',
			'label'       => '',			
			'desc'        => 'Type phone number of second office',
			'type'        => 'text',
			'section'     => 'contact',
		),

		array(
			'id'          => 'ava_office_two_email',
			'label'       => '',			
			'desc'        => 'Type email address of second office',
			'type'        => 'text',
			'section'     => 'contact',
		),		
		
//--------------------------------------------
//	FOOTER OPTIONS
//--------------------------------------------

		// Copyright Text
		array(
			'id'          => 'ava_copyright_text',
			'label'       => 'Copyright Text',
			'desc'        => 'Type your copyright text',
			'type'        => 'text',
			'section'     => 'footer',
			'class'       => ''
		),
		
		// Social Links
		array(
			'id'          => 'ava_facebook_link',
			'label'       => 'Social Network Links',
			'desc'        => 'Your Facebook URL (leave blank if not needed)',
			'type'        => 'text',
			'section'     => 'footer',
			'class'       => ''
		),

		array(
			'id'          => 'ava_twitter_link',
			'label'       => '',
			'desc'        => 'Your Twitter URL (leave blank if not needed)',
			'type'        => 'text',
			'section'     => 'footer',
			'class'       => ''
		),		

		array(
			'id'          => 'ava_googleplus_link',
			'label'       => '',
			'desc'        => 'Your Google+ URL (leave blank if not needed)',
			'type'        => 'text',
			'section'     => 'footer',
			'class'       => ''
		),	

		array(
			'id'          => 'ava_linkedin_link',
			'label'       => '',
			'desc'        => 'Your LinkedIn URL (leave blank if not needed)',
			'type'        => 'text',
			'section'     => 'footer',
			'class'       => ''
		),

		array(
			'id'          => 'ava_dribbble_link',
			'label'       => '',
			'desc'        => 'Your Dribbble URL (leave blank if not needed)',
			'type'        => 'text',
			'section'     => 'footer',
			'class'       => ''
		),		

    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}




/**
 * IMPORT EXPORT THEME OPTIONS
 */
add_action( 'init', 'register_options_pages' );

/**
 * Registers all the required admin pages.
 */
function register_options_pages() {

  // Only execute in admin & if OT is installed
  if ( is_admin() && function_exists( 'ot_register_settings' ) ) {
    // Register the pages
    ot_register_settings( 
      array(
        array( 
          'id'              => 'import_export',
          'pages'           => array(
            array(
              'id'              => 'import_export',
              'parent_slug'     => 'themes.php',
              'page_title'      => 'Theme Options Backup/Restore',
              'menu_title'      => 'Options Backup',
              'capability'      => 'edit_theme_options',
              'menu_slug'       => 'tmq-theme-backup',
              'icon_url'        => null,
              'position'        => null,
              'updated_message' => 'Options updated.',
              'reset_message'   => 'Options reset.',
              'button_text'     => 'Save Changes',
              'show_buttons'    => false,
              'screen_icon'     => 'themes',
              'contextual_help' => null,
              'sections'        => array(
                array(
                  'id'          => 'tmq_import_export',
                  'title'       => __( 'Import/Export', 'yourtextdomain' )
                )
              ),
              'settings'        => array(
                array(
                    'id'          => 'import_data_text',
                    'label'       => 'Import Theme Options',
                    'desc'        => __( 'Theme Options', 'yourtextdomain' ),
                    'std'         => '',
                    'type'        => 'import-data',
                    'section'     => 'tmq_import_export',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'class'       => ''
                  ),
                  array(
                    'id'          => 'export_data_text',
                    'label'       => 'Export Theme Options',
                    'desc'        => __( 'Theme Options', 'yourtextdomain' ),
                    'std'         => '',
                    'type'        => 'export-data',
                    'section'     => 'tmq_import_export',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'class'       => ''
                  )
              )
            )
          )
        )
      )
    );
  }
}

/**
 * Import Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_import_data' ) ) {

  function ot_type_import_data() {

    echo '<form method="post" id="import-data-form">';

      /* form nonce */
      wp_nonce_field( 'import_data_form', 'import_data_nonce' );

      /* format setting outer wrapper */
      echo '<div class="format-setting type-textarea has-desc">';

        /* description */
        echo '<div class="description">';

          if ( OT_SHOW_SETTINGS_IMPORT ) echo '<p>' . __( 'Only after you\'ve imported the Settings should you try and update your Theme Options.', 'option-tree' ) . '</p>';

          echo '<p>' . __( 'To import your Theme Options copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Import Theme Options" button.', 'option-tree' ) . '</p>';
          /* button */
          echo '<button class="option-tree-ui-button blue right hug-right">' . __( 'Import Theme Options', 'option-tree' ) . '</button>';
        echo '</div>';

        /* textarea */
        echo '<div class="format-setting-inner">';
          echo '<textarea rows="10" cols="40" name="import_data" id="import_data" class="textarea"></textarea>';
        echo '</div>';
      echo '</div>';
    echo '</form>';

  }

}

/**
 * Export Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_export_data' ) ) {

  function ot_type_export_data() {

    /* format setting outer wrapper */
    echo '<div class="format-setting type-textarea simple has-desc">';

      /* description */
      echo '<div class="description">';
        echo '<p>' . __( 'Export your Theme Options data by highlighting this text and doing a copy/paste into a blank .txt file. Then save the file for importing into another install of WordPress later. Alternatively, you could just paste it into the <code>OptionTree->Settings->Import</code> <strong>Theme Options</strong> textarea on another web site.', 'option-tree' ) . '</p>';
      echo '</div>';

      /* get theme options data */
      $data = get_option( 'option_tree' );
      $data = ! empty( $data ) ? ot_encode( serialize( $data ) ) : '';

      echo '<div class="format-setting-inner">';
        echo '<textarea rows="10" cols="40" name="export_data" id="export_data" class="textarea">' . $data . '</textarea>';
      echo '</div>';
    echo '</div>';
  }
}

?>