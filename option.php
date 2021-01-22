<?php
// Add theme option
function add_custom_option($wp_customize){
 // header option add
    $wp_customize->add_section('header_option', array(
        'title'    =>'Header Option'       
    ));

    $wp_customize->add_section('Social_media', array(
        'title'    =>'Social Media'       
    ));
    // Instagram
    $wp_customize->add_setting('Social_media_insta');

    $wp_customize->add_control('Social_media_insta',array(
        'label'      => 'Instagram',
        'type' => 'url',
        'section'    => 'Social_media',
        'settings'   => 'Social_media_insta',
    ));
    // Facebook
    $wp_customize->add_setting('Social_media_fb');

    $wp_customize->add_control('Social_media_fb',array(
        'label'      => 'Facebook',
        'type' => 'url',
        'section'    => 'Social_media',
        'settings'   => 'Social_media_fb',
    ));
     // Twitter
     $wp_customize->add_setting('Social_media_tw');

     $wp_customize->add_control('Social_media_tw',array(
         'label'      => 'Twitter',
         'type' => 'url',
         'section'    => 'Social_media',
         'settings'   => 'Social_media_tw',
     ));  
      // Twitter
      $wp_customize->add_setting('Social_media_yt');

      $wp_customize->add_control('Social_media_yt',array(
          'label'      => 'You Tube',
          'type' => 'url',
          'section'    => 'Social_media',
          'settings'   => 'Social_media_yt',
      ));    
 
    // add contact option
        $wp_customize->add_section('contact_option', array(
            'title'    =>'Contact Option'       
        ));
        // Email
        $wp_customize->add_setting('add_email');

        $wp_customize->add_control('add_email',array(
            'label'      => 'Email',
            'type' => 'url',
            'section'    => 'contact_option',
            'settings'   => 'add_email',
        ));   

        // phone
        $wp_customize->add_setting('add_phone');

        $wp_customize->add_control('add_phone',array(
            'label'      => 'Phone',
            'type' => 'url',
            'section'    => 'contact_option',
            'settings'   => 'add_phone',
        )); 
    // header footer add
        $wp_customize->add_section('footer_option', array(
            'title'    =>'Footer Option'       
        ));
        $wp_customize->add_setting('copy_right');
        $wp_customize->add_control('copy_right',array(
            'label'      => 'Copy Right Text ',
            'type' => 'textarea',
            'section'    => 'footer_option',
            'settings'   => 'copy_right',
        ));



        $wp_customize->add_section('Property_listing_option', array(
            'title'    =>'Property Listing Option'       
        ));
        $wp_customize->add_setting('Property_listing_banner');
        $wp_customize->add_control('Property_listing_banner',array(
            'label'      => 'Property Listing Banner URL',
            'type' => 'url',
            'section'    => 'Property_listing_option',
            'settings'   => 'Property_listing_banner',
        ));
        $wp_customize->add_setting('Property_listing_banner_text');
        $wp_customize->add_control('Property_listing_banner_text',array(
            'label'      => 'Property Listing Text ',
            'type' => 'url',
            'section'    => 'Property_listing_option',
            'settings'   => 'Property_listing_banner_text',
        ));


    
 }
 add_action('customize_register', 'add_custom_option');





?>