<?php
 /**
  * Maghreb Theme Customizer
  *
  * @package Maghreb
  */
 
 function maghreb_customize_register($wp_customize) {
	 // Add support for selective refresh for the site title and description.
	 if ( isset( $wp_customize->selective_refresh ) ) {
		 $wp_customize->selective_refresh->add_partial(
			 'blogname',
			 array(
				 'selector'        => '.site-title a',
				 'render_callback' => 'maghreb_customize_partial_blogname',
			 )
		 );
	 
		 $wp_customize->selective_refresh->add_partial(
			 'blogdescription',
			 array(
				 'selector'        => '.site-description',
				 'render_callback' => 'maghreb_customize_partial_blogdescription',
			 )
		 );
	 }
 
	 // Section: Site Identity (already exists for logo)
	 // Ensure that 'custom_logo' is included
	 // This is handled by add_theme_support('custom-logo') in functions.php
 }
 
 add_action('customize_register', 'maghreb_customize_register');
 
 /**
  * Render the site title for the selective refresh partial.
  *
  * @return void
  */
 function maghreb_customize_partial_blogname() {
	 bloginfo('name');
 }
 
 /**
  * Render the site description for the selective refresh partial.
  *
  * @return void
  */
 function maghreb_customize_partial_blogdescription() {
	 bloginfo('description');
 }
 
 function maghreb_customize_preview_js() {
    wp_enqueue_script(
        'maghreb-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'customize-preview', 'jquery' ),
        '1.0',
        true
    );
}
add_action( 'customize_preview_init', 'maghreb_customize_preview_js' );