<?php

include_once('option.php');
if ( ! function_exists( 'demo_setup' ) ) :
/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	 function demo_setup() {
	     add_theme_support( 'automatic-feed-links' );
	     add_theme_support( 'title-tag' );
	     add_theme_support( 'post-thumbnails' );
	     register_nav_menus( array(
			'primary-menu' => 'Primary',
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat',
    ));
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	 }
endif;
add_action( 'after_setup_theme', 'demo_setup' );
add_post_type_support( 'page', 'excerpt' );

//Enqueue scripts and styles. START
 function demo_scripts() {    
    wp_enqueue_style('demo-style', get_stylesheet_uri());
    wp_enqueue_style('select2', get_template_directory_uri() . '/css/select2.min.css');
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('font_awesome', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('rangeslider', get_template_directory_uri() . '/css/rangeslider.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');

    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');  
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js',array(),true);   
    wp_enqueue_script('rangesliders','https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.js',array(),'',true);
    wp_enqueue_script('rangeslider','https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.min.js',array(),'',true);
    wp_enqueue_script('select2', get_template_directory_uri() . '/js/select2.min.js',array(),'',true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.js', array(), true );
    wp_enqueue_script('slick-min-js', get_template_directory_uri() . '/js/slick.min.js', array(), true );
    wp_register_script('jquery_custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), true);
        $localize = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        // Securing your WordPress plugin AJAX calls using nonces
        'ajax_nonce' => wp_create_nonce('_check__ajax_100')
    );
    wp_localize_script('jquery_custom', 'js_config', $localize);
    wp_enqueue_script('jquery_custom');   
 }
 add_action( 'wp_enqueue_scripts', 'demo_scripts' );
 
//Enqueue scripts and styles. END
 



// custom_post_type
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => ( 'Property'),
            'singular_name'       => ( 'Property'),
            'menu_name'           => __( 'Property'),
            'parent_item_colon'   => __( 'Parent Property'),
            'all_items'           => __( 'All Property'),
            'view_item'           => __( 'View Property'),
            'add_new_item'        => __( 'Add New Property'),
            'add_new'             => __( 'Add New'),
            'edit_item'           => __( 'Edit Property'),
            'update_item'         => __( 'Update Property'),
            'search_items'        => __( 'Search Property'),
            'not_found'           => __( 'Not Found'),
            'not_found_in_trash'  => __( 'Not found in Trash'),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Property'),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'property', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );


    function wporg_register_taxonomy_property() {
        $labels = array(
            'name'              => ( 'Property Type'),
            'singular_name'     => ( 'Property Type'),
            'menu_name'         => __( 'Property Type' ),
        );
        $args   = array(
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'property-types' ],
        );
        register_taxonomy( 'property-type','property', $args );
   }
   add_action( 'init', 'wporg_register_taxonomy_property' );

function property_type_locations() {
    $labels = array(
        'name'              => ( 'Location'),
        'singular_name'     => ( 'Location'),
        'menu_name'         => __( 'Location' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'locations' ],
    );
    register_taxonomy( 'location','property', $args );
}
add_action( 'init', 'property_type_locations' );

   // register sidebar  
function custom_sidebar() {

    register_sidebar(array(
        'name' => __('Footer logo'),
        'id' => 'footer-logo',
        'description' => __('Footer logo widget area'),
        'before_widget' => '<div class="widget-top-1">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Footer Address'),
        'id' => 'footer-address',
        'description' => __('Footer Address'),
        'before_widget' => '<div class="widget-top-2 footer-address">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer2 top-line">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Property'),
        'id' => 'footer-property',
        'description' => __('Footer  Property'),
        'before_widget' => '<div class="widget-top-3 footer-property">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Phone'),
        'id' => 'footer-phone',
        'description' => __('Footer Phone'),
        'before_widget' => '<div class="widget-top-3 footer-phone">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    ));  
    register_sidebar(array(
        'name' => __('Footer demo One Stop Homes'),
        'id' => 'footer-demo-one',
        'description' => __('Footer demo One Stop Homes'),
        'before_widget' => '<div class="widget-top-3 footer-demo">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    )); 
    register_sidebar(array(
        'name' => __('Footer C.E.T.'),
        'id' => 'footer-cet',
        'description' => __('Footer C.E.T.'),
        'before_widget' => '<div class="widget-top-3 footer-cet">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    )); 
   
    register_sidebar(array(
        'name' => __('Footer Email'),
        'id' => 'footer-email',
        'description' => __('Footer Email'),
        'before_widget' => '<div class="widget-top-3 footer-email">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    ));  
    register_sidebar(array(
        'name' => __('Footer demo'),
        'id' => 'footer-demo-new',
        'description' => __('Footer demo'),
        'before_widget' => '<div class="widget-top-3 footer-demo">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    ));   
    register_sidebar(array(
        'name' => __('Footer Follow Us'),
        'id' => 'footer-follow-link',
        'description' => __('Footer Follow Us'),
        'before_widget' => '<div class="widget-top-3 footer-follow">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    )); 
    register_sidebar(array(
        'name' => __('Twitter Feeds'),
        'id' => 'custom-twitter-feeds',
        'description' => __('Twitter Feeds'),
        'before_widget' => '<div class="widget-top-3 custom-twitter-feeds">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="top-footer-3 top-line">',
        'after_title' => '</h3>',
    ));    
}

add_action('widgets_init', 'custom_sidebar');


//----------------------- NEWSLETTER START -Y -------------------------------------------//
function jnz_tnp_ajax_subscribe_footer() {
    // check_ajax_referer( 'ajax-nonce', 'nonce' );
     $data = urldecode( $_POST['data'] );
     if ( !empty( $data ) ) :
         $data_array = explode( "&", $data );
         $fields = [];
         foreach ( $data_array as $array ) :
             $array = explode( "=", $array );
             $fields[ $array[0] ] = $array[1];
         endforeach;
     endif;
 
     if ( !empty( $fields ) ) :
          if ( filter_var( $fields['ne'], FILTER_VALIDATE_EMAIL ) ) :
             global $wpdb;
 
              //check if the email is already in the database
              $exists = $wpdb->get_var(
                  $wpdb->prepare(
                      "SELECT email FROM " . $wpdb->prefix . "newsletter
                     WHERE email = %s",
                      $fields['ne']
                  )
              );
 
              if ( ! $exists ) {
                  NewsletterSubscription::instance()->subscribe();
                  $output = array(
                      'status'    => 'success',
                      'msg'       => __( '<div style="color:#fd751f;">Thank you for your Email. Please check your inbox to confirm your subscription.</div>', 'theme_text_domain' )
                  );
              } else {
                  //email is already in the database
                  $output = array(
                      'status'    => 'error',
                      'msg'       => __( '<div style="color:red;">Your Email is already in our system. Please check your inbox, to confirm your subscription.</div>', 'theme_text_domain' )
                  );
              }
 
          else :
              $output = array(
                  'status'    => 'error',
                  'msg'       => __( '<div style="color:red;">Please enter your valid email.</div>', 'theme_text_domain' )
              );
          endif;
     else :
         $output = array(
             'status'    => 'error',
             'msg'       => __( '<div style="color:red;">An Error occurred. Please try again later.</div>', 'theme_text_domain' )
         );
     endif;
     wp_send_json( $output );
 }
 add_action( 'wp_ajax_nopriv_ajax_subscribe_footer', 'jnz_tnp_ajax_subscribe_footer' );
 add_action( 'wp_ajax_ajax_subscribe_footer', 'jnz_tnp_ajax_subscribe_footer' );
 
 //----------------------- NEWSLETTER END -Y -------------------------------------------//

// Add Images Size

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'featured-property', 1490, 610, true );
    add_image_size( 'quintessential-property', 476, 613, true );
    add_image_size( 'home-property-listing', 640, 512, true );
    add_image_size( 'property-listing', 730, 525, true );
    add_image_size( 'property-detail-main', 1920, 668, true );
    add_image_size( 'property-detail-small',153 , 96, true );
    add_image_size( 'blog-listing',350 , 384, true );
    add_image_size( 'blog-details',1920 , 840, true );
    add_image_size( 'property-blog-listing',669 , 473, true );   
    add_image_size( 'location-img',350 , 350, true );
}

