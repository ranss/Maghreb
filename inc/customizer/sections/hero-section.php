<?php

function bidaya_hero_title( $wp_customize ) {
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Welcome to Our Website',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => esc_html__('Hero Title', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_title_size', array(
        'default'           => '32',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('hero_title_size', array(
        'label'    => esc_html__('Hero Title Size (px)', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 1,
        ),
    ));
}
add_action( 'customize_register', 'bidaya_hero_title' );

function bidaya_hero_description( $wp_customize ) {
    
    $wp_customize->add_setting('hero_description_size', array(
        'default'           => '18', // Default font size
        'sanitize_callback' => 'absint', // Accepts only positive integers
    ));

    $wp_customize->add_control('hero_description_size', array(
        'label'    => esc_html__('Hero Description Size (px)', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 1,
        ),
    ));

    // Description Setting
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Your customizable description goes here.',
        'sanitize_callback' => 'wp_kses_post', // Allows HTML
    ));

    $wp_customize->add_control('hero_description', array(
        'label'    => esc_html__('Hero Description', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'textarea',
    ));

    // Button Text Setting
    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label'    => esc_html__('Button Text', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'text',
    ));

    // Button URL Setting
    $wp_customize->add_setting('hero_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label'    => esc_html__('Button URL', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'url',
    ));
}
add_action( 'customize_register', 'bidaya_hero_description' );

function bidaya_hero_section( $wp_customize ) {
    // Add Hero Section
    $wp_customize->add_section('bidaya_hero_section', array(
        'title'       => esc_html__('Bidaya Hero', 'bidaya'),
        'description' => esc_html__('Customize the hero section of your homepage.', 'bidaya'),
        'priority'    => 30,
    ));

    // Hero Background Color Setting
    $wp_customize->add_setting('hero_background_color', array(
        'default'           => '', // Default background color (black)
        'sanitize_callback' => 'sanitize_hex_color', // Sanitize to ensure it's a valid hex color
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize, 
        'hero_background_color', 
        array(
            'label'    => esc_html__('Hero Section Background Color', 'bidaya'),
            'description' => esc_html__('Choose the background color for the hero section above the image. If no color is selected, the background image will be used alone.', 'bidaya'),            'section'  => 'bidaya_hero_section', // The section where this setting will appear
            'settings' => 'hero_background_color',
        )
    ));

    // Background Image Setting
    $wp_customize->add_setting('hero_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label'    => esc_html__('Background Image', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'settings' => 'hero_background_image',
    )));

    // Background Position Setting
    $wp_customize->add_setting('hero_background_position', array(
        'default'           => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_background_position', array(
        'label'    => esc_html__('Background Position', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'text',
        'description' => esc_html__('Examples: center center, top right, bottom left, etc.', 'bidaya'),
    ));

    // Background Size Setting
    $wp_customize->add_setting('hero_background_size', array(
        'default'           => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_background_size', array(
        'label'    => esc_html__('Background Size', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'select',
        'choices'  => array(
            'auto'    => esc_html__('Auto', 'bidaya'),
            'cover'   => esc_html__('Cover', 'bidaya'),
            'contain' => esc_html__('Contain', 'bidaya'),
        ),
    ));

    // Hero Content Centering Settings
    $wp_customize->add_setting('hero_content_center', array(
        'default'           => 'yes', // Default to yes, content centered
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_content_center', array(
        'label'   => esc_html__('Center Content in Hero Section', 'bidaya'),
        'section' => 'bidaya_hero_section',
        'type'    => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'bidaya'),
            'no'  => esc_html__('No', 'bidaya'),
        ),
    ));
    
    // Hero Text Alignment Setting
    $wp_customize->add_setting('hero_text_alignment', array(
        'default'           => 'center', // Default to center alignment
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_text_alignment', array(
        'label'   => esc_html__('Hero Section Text Alignment', 'bidaya'),
        'section' => 'bidaya_hero_section',
        'type'    => 'select',
        'choices' => array(
            'left'   => esc_html__('Left', 'bidaya'),
            'center' => esc_html__('Center', 'bidaya'),
            'right'  => esc_html__('Right', 'bidaya'),
        ),
    ));

    // Hero Section Line Height
    $wp_customize->add_setting('hero_line_height', array(
        'default'           => '1.5', // Default line-height
        'sanitize_callback' => 'sanitize_float', // Ensure it's a float
    ));

    $wp_customize->add_control('hero_line_height', array(
        'label'    => esc_html__('Hero Section Line Height', 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 0.1,
        ),
    ));

    function sanitize_float( $input ) {
        return floatval( $input );
    }
}
add_action('customize_register', 'bidaya_hero_section');

function bidaya_hero_widgets( $wp_customize ) {

    // Loop through three widgets
    for ($i = 1; $i <= 3; $i++) {
    
        // Add title setting
        $wp_customize->add_setting("bidaya_widget_{$i}_title", array(
            'default'           => "Widget {$i} Title",
            'sanitize_callback' => 'wp_kses_post', // Allow HTML
        ));

        $wp_customize->add_control("bidaya_widget_{$i}_title", array(
            'label'    => esc_html__("Widget {$i} Title", 'bidaya'),
            'section'  => 'bidaya_hero_section',
            'type'     => 'text',
        ));

        // Add description setting
        $wp_customize->add_setting("bidaya_widget_{$i}_description", array(
            'default'           => "Widget {$i} Description",
            'sanitize_callback' => 'wp_kses_post', // Allow HTML
        ));

        $wp_customize->add_control("bidaya_widget_{$i}_description", array(
            'label'    => esc_html__("Widget {$i} Description", 'bidaya'),
            'section'  => 'bidaya_hero_section',
            'type'     => 'textarea',
        ));

        // Add button text setting
        $wp_customize->add_setting("bidaya_widget_{$i}_button_text", array(
            'default'           => "Learn More {$i}",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("bidaya_widget_{$i}_button_text", array(
            'label'    => esc_html__("Widget {$i} Button Text", 'bidaya'),
            'section'  => 'bidaya_hero_section',
            'type'     => 'text',
        ));

        // Add button URL setting
        $wp_customize->add_setting("bidaya_widget_{$i}_button_url", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("bidaya_widget_{$i}_button_url", array(
            'label'    => esc_html__("Widget {$i} Button URL", 'bidaya'),
            'section'  => 'bidaya_hero_section',
            'type'     => 'url',
        ));

        // Add icon setting
        $wp_customize->add_setting("bidaya_widget_{$i}_icon", array(
            'default'           => 'fa-star',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $icons = array(
            'fa-star'       => 'Star',
            'fa-heart'      => 'Heart',
            'fa-check'      => 'Check',
            'fa-lightbulb'  => 'Lightbulb',
            'fa-cogs'       => 'Cogs',
        );
        $wp_customize->add_control("bidaya_widget_{$i}_icon", array(
            'label'    => esc_html__("Widget {$i} Icon", 'bidaya'),
            'section'  => 'bidaya_hero_section',
            'type'     => 'select',
            'choices'  => $icons,
        ));
    }

    // Add button size setting
    $wp_customize->add_setting("bidaya_widget_{$i}_button_size", array(
        'default'           => 'medium',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for button size
    $wp_customize->add_control("bidaya_widget_{$i}_button_size", array(
        'label'    => esc_html__("Widget {$i} Button Size", 'bidaya'),
        'section'  => 'bidaya_hero_section',
        'type'     => 'select',
        'choices'  => array(
            'small'  => esc_html__('Small', 'bidaya'),
            'medium' => esc_html__('Medium', 'bidaya'),
            'large'  => esc_html__('Large', 'bidaya'),
        ),
    ));
}
add_action( 'customize_register', 'bidaya_hero_widgets' );

function bidaya_last_posts( $wp_customize ) {
    // Add Setting
    $wp_customize->add_setting( 'show_last_posts', array(
        'default'           => 'yes', // Default to 'no'
        'sanitize_callback' => 'sanitize_text_field', // Sanitize input
    ));

    // Add Control
    $wp_customize->add_control( 'show_last_posts', array(
        'label'    => esc_html__( 'Show Last Posts', 'bidaya' ),
        'section'  => 'bidaya_hero_section', // Replace with your desired section slug
        'type'     => 'select',
        'choices'  => array(
            'yes' => esc_html__( 'Yes', 'bidaya' ),
            'no'  => esc_html__( 'No', 'bidaya' ),
        ),
    ));
}
add_action( 'customize_register', 'bidaya_last_posts' );