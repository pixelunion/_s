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

  // ORG only customization options

  if ( ! _s_is_wpcom() ) {

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

  }

}
add_action( 'customize_register', '_s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _s_customize_preview_js() {
  wp_enqueue_script( '_s_customizer', get_template_directory_uri() . '/javascripts/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', '_s_customize_preview_js' );
