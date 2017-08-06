<?php
/**
 * ds-blade Theme Customizer
 *
 * @package ds-blade
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ds_blade_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ds_blade_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ds_blade_customize_partial_blogdescription',
		) );
	}

	// sections
	$wp_customize->add_section('theme_options_section', array(
		'title' => __("Theme Options", 'ds-volvo')
	));

	$wp_customize->add_section('footer_social_media_links', array(
		'title' => __("Social Media Links", 'ds-volvo')
	));

	// settings
	$wp_customize->add_setting('site_dealer_name', array(
		'default' => __("Add name of the dealer"),
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('site_dealer_address', array(
		'default' => __("Add your address here"),
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('site_dealer_contact_number', array(
		'default' => __("Add your contact number here"),
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('copyright_text', array(
		'default' => __("Add copyright text here"),
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('facebook_link', array(
		'default' => __("Add your facebook profile"),
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('twitter_link', array(
		'default' => __("Add your twitter profile"),
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('linkedin_link', array(
		'default' => __("Add your linkedin profile"),
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('google_link', array(
		'default' => __("Add your google profile"),
		'transport' => 'refresh'
	));

	// control
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_option_dealer_name',
		array(
			'label' => __("Dealer Name", 'ds-volvo'),
			'section' => 'theme_options_section',
			'settings' => 'site_dealer_name'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_option_dealer_address',
		array(
			'label' => __("Dealer Address", 'ds-volvo'),
			'section' => 'theme_options_section',
			'settings' => 'site_dealer_address'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_option_dealer_contact_number',
		array(
			'label' => __("Contact Number", 'ds-volvo'),
			'section' => 'theme_options_section',
			'settings' => 'site_dealer_contact_number'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_option_copyright_text',
		array(
			'label' => __("Copyright Text", 'ds-volvo'),
			'section' => 'theme_options_section',
			'settings' => 'copyright_text'
		)
	));


	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_footer_fb_link',
		array(
			'label' => __("Facebook Profile URL", 'ds-volvo'),
			'section' => 'footer_social_media_links',
			'settings' => 'facebook_link'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_footer_twitter_link',
		array(
			'label' => __("Twitter Profile URL", 'ds-volvo'),
			'section' => 'footer_social_media_links',
			'settings' => 'twitter_link'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_footer_linkedin_link',
		array(
			'label' => __("LinkedIn Profile URL", 'ds-volvo'),
			'section' => 'footer_social_media_links',
			'settings' => 'linkedin_link'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_footer_google_link',
		array(
			'label' => __("Google Profile URL", 'ds-volvo'),
			'section' => 'footer_social_media_links',
			'settings' => 'google_link'
		)
	));
}
add_action( 'customize_register', 'ds_blade_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ds_blade_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ds_blade_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ds_blade_customize_preview_js() {
	wp_enqueue_script( 'ds-blade-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ds_blade_customize_preview_js' );
