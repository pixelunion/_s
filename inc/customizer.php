<?php
/**
 * _s Theme Customizer
 *
 * @package _s
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _s_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  /**
  * Theme-Specific Customize Settings
  */

  // Accent Color

  $wp_customize->add_setting( '_s_accent_color', array(
    'default'   => '#000000',
    'transport' => 'postMessage'
    ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_s_accent_color', array(
    'label'    => __( 'Accent Color', '_s' ),
    'section'  => 'colors',
    'settings' => '_s_accent_color'
  ) ) );

  // Custom Logo

  $wp_customize->add_section( '_s_custom_logo', array(
    'title'       => __( 'Custom Logo', '_s' ),
    'description' => ( 'Upload an image for your logo. This will replace the site title and tagline in the header.' ),
    'priority'    => 30
  ) );

  $wp_customize->add_setting( '_s_upload_logo', array(
    'default' => ''
  ) );

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
    'label'    => __( 'Upload a logo', '_s' ),
    'section'  => '_s_custom_logo',
    'settings' => '_s_upload_logo'
  ) ) );

  // Social Icons

  $wp_customize->add_section( '_s_social_icons', array(
    'title'       => __( 'Social Icons', '_s' ),
    'description' => ( 'Link to your social media.' ),
    'priority'    => 30
  ) );

  $wp_customize->add_setting( 'Bandcamp', array(
    'default' => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'Bandcamp', array(
    'label'    => __( 'Bandcamp URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'Bandcamp'
  ) ) );

  $wp_customize->add_setting( 'behance', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'behance', array(
    'label'    => __( 'Behance URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'behance'
  ) ) );

  $wp_customize->add_setting( 'delicious', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'delicious', array(
    'label'    => __( 'Delicious URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'delicious'
  ) ) );

  $wp_customize->add_setting( 'deviantart', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'deviantart', array(
    'label'    => __( 'Deviantart URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'deviantart'
  ) ) );

  $wp_customize->add_setting( 'digg', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'digg', array(
    'label'    => __( 'Digg URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'digg'
  ) ) );

  $wp_customize->add_setting( 'dribbble', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'dribbble', array(
    'label'    => __( 'Dribbble URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'dribbble'
  ) ) );

  $wp_customize->add_setting( 'etsy', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'etsy', array(
    'label'    => __( 'Etsy URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'etsy'
  ) ) );

  $wp_customize->add_setting( 'facebook', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'facebook', array(
    'label'    => __( 'Facebook URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'facebook'
  ) ) );

  $wp_customize->add_setting( 'flickr', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'flickr', array(
    'label'    => __( 'Flickr URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'flickr'
  ) ) );

  $wp_customize->add_setting( 'foursquare', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'foursquare', array(
    'label'    => __( 'Foursquare URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'foursquare'
  ) ) );

  $wp_customize->add_setting( 'github', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'github', array(
    'label'    => __( 'Github URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'github'
  ) ) );

  $wp_customize->add_setting( 'google-plus', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'google-plus', array(
    'label'    => __( 'Google Plus URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'google-plus'
  ) ) );

  $wp_customize->add_setting( 'instagram', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'instagram', array(
    'label'    => __( 'Instagram URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'instagram'
  ) ) );

  $wp_customize->add_setting( 'lastfm', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'lastfm', array(
    'label'    => __( 'Lastfm URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'lastfm'
  ) ) );

  $wp_customize->add_setting( 'linkedin', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'linkedin', array(
    'label'    => __( 'Linkedin URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'linkedin'
  ) ) );

  $wp_customize->add_setting( 'myspace', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'myspace', array(
    'label'    => __( 'Myspace URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'myspace'
  ) ) );

  $wp_customize->add_setting( 'pinboard', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'pinboard', array(
    'label'    => __( 'Pinboard URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'pinboard'
  ) ) );

  $wp_customize->add_setting( 'pinterest', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'pinterest', array(
    'label'    => __( 'Pinterest URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'pinterest'
  ) ) );

  $wp_customize->add_setting( 'rdio', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'rdio', array(
    'label'    => __( 'Rdio URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'rdio'
  ) ) );

  $wp_customize->add_setting( 'skype', array(
    'default'           => '',
    'sanitize_callback' => 'esc_attr',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'skype', array(
    'label'    => __( 'Skype Username', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'skype'
  ) ) );

  $wp_customize->add_setting( 'soundcloud', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'soundcloud', array(
    'label'    => __( 'Soundcloud URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'soundcloud'
  ) ) );

  $wp_customize->add_setting( 'spotify', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'spotify', array(
    'label'    => __( 'Spotify URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'spotify'
  ) ) );

  $wp_customize->add_setting( 'stumbleupon', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'stumbleupon', array(
    'label'    => __( 'Stumbleupon URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'stumbleupon'
  ) ) );

  $wp_customize->add_setting( 'svpply', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'svpply', array(
    'label'    => __( 'Svpply URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'svpply'
  ) ) );

  $wp_customize->add_setting( 'twitter', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'twitter', array(
    'label'    => __( 'Twitter URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'twitter'
  ) ) );

  $wp_customize->add_setting( 'vimeo', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'vimeo', array(
    'label'    => __( 'Vimeo URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'vimeo'
  ) ) );

  $wp_customize->add_setting( 'youtube', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url',
  ) );
  $wp_customize->add_control( new wp_customize_control( $wp_customize, 'youtube', array(
    'label'    => __( 'Youtube URL', '_s' ),
    'section'  => '_s_social_icons',
    'settings' => 'youtube'
  ) ) );  

}
add_action( 'customize_register', '_s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _s_customize_preview_js() {
	wp_enqueue_script( '_s_customizer', get_template_directory_uri() . '/javascripts/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', '_s_customize_preview_js' );
