<?php

function maghreb_hero_title( $wp_customize ) {
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Welcome to Our Website',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => esc_html__('Hero Title', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_title_size', array(
        'default'           => '32',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('hero_title_size', array(
        'label'    => esc_html__('Hero Title Size (px)', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 1,
        ),
    ));
}
add_action( 'customize_register', 'maghreb_hero_title' );

function maghreb_hero_description( $wp_customize ) {
    
    $wp_customize->add_setting('hero_description_size', array(
        'default'           => '18', // Default font size
        'sanitize_callback' => 'absint', // Accepts only positive integers
    ));

    $wp_customize->add_control('hero_description_size', array(
        'label'    => esc_html__('Hero Description Size (px)', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 1,
        ),
    ));

    // Description Setting
    $wp_customize->add_setting('hero_description', array(
        'default'           => '<p>Your customizable description goes here.</p>',
        'sanitize_callback' => 'wp_kses_post', // Allows HTML
    ));

    $wp_customize->add_control('hero_description', array(
        'label'    => esc_html__('Hero Description', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'textarea',
    ));

    // Button Text Setting
    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label'    => esc_html__('Button Text', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'text',
    ));

    // Button URL Setting
    $wp_customize->add_setting('hero_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label'    => esc_html__('Button URL', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'url',
    ));
}
add_action( 'customize_register', 'maghreb_hero_description' );

function maghreb_hero_section( $wp_customize ) {
    // Add Hero Section
    $wp_customize->add_section('maghreb_hero_section', array(
        'title'       => esc_html__('Maghreb Hero', 'maghreb'),
        'description' => esc_html__('Customize the hero section of your homepage.', 'maghreb'),
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
            'label'    => esc_html__('Hero Section Background Color', 'maghreb'),
            'description' => esc_html__('Choose the background color for the hero section above the image. If no color is selected, the background image will be used alone.', 'maghreb'),            'section'  => 'maghreb_hero_section', // The section where this setting will appear
            'settings' => 'hero_background_color',
        )
    ));

    // Background Image Setting
    $wp_customize->add_setting('hero_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label'    => esc_html__('Background Image', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'settings' => 'hero_background_image',
    )));

    // Background Position Setting
    $wp_customize->add_setting('hero_background_position', array(
        'default'           => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_background_position', array(
        'label'    => esc_html__('Background Position', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'text',
        'description' => esc_html__('Examples: center center, top right, bottom left, etc.', 'maghreb'),
    ));

    // Background Size Setting
    $wp_customize->add_setting('hero_background_size', array(
        'default'           => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_background_size', array(
        'label'    => esc_html__('Background Size', 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'select',
        'choices'  => array(
            'auto'    => esc_html__('Auto', 'maghreb'),
            'cover'   => esc_html__('Cover', 'maghreb'),
            'contain' => esc_html__('Contain', 'maghreb'),
        ),
    ));

    // Hero Content Centering Settings
    $wp_customize->add_setting('hero_content_center', array(
        'default'           => 'yes', // Default to yes, content centered
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_content_center', array(
        'label'   => esc_html__('Center Content in Hero Section', 'maghreb'),
        'section' => 'maghreb_hero_section',
        'type'    => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'maghreb'),
            'no'  => esc_html__('No', 'maghreb'),
        ),
    ));
    
    // Hero Text Alignment Setting
    $wp_customize->add_setting('hero_text_alignment', array(
        'default'           => 'center', // Default to center alignment
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_text_alignment', array(
        'label'   => esc_html__('Hero Section Text Alignment', 'maghreb'),
        'section' => 'maghreb_hero_section',
        'type'    => 'select',
        'choices' => array(
            'left'   => esc_html__('Left', 'maghreb'),
            'center' => esc_html__('Center', 'maghreb'),
            'right'  => esc_html__('Right', 'maghreb'),
        ),
    ));

    // Hero Section Line Height
    $wp_customize->add_setting('hero_line_height', array(
        'default'           => '1.5', // Default line-height
        'sanitize_callback' => 'sanitize_float', // Ensure it's a float
    ));

    $wp_customize->add_control('hero_line_height', array(
        'label'    => esc_html__('Hero Section Line Height', 'maghreb'),
        'section'  => 'maghreb_hero_section',
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
add_action('customize_register', 'maghreb_hero_section');

function maghreb_hero_widgets( $wp_customize ) {

    // Loop through three widgets
    for ($i = 1; $i <= 3; $i++) {
    
        // Add title setting
        $wp_customize->add_setting("maghreb_widget_{$i}_title", array(
            'default'           => "Widget {$i} Title",
            'sanitize_callback' => 'wp_kses_post', // Allow HTML
        ));

        $wp_customize->add_control("maghreb_widget_{$i}_title", array(
            'label'    => esc_html__("Widget {$i} Title", 'maghreb'),
            'section'  => 'maghreb_hero_section',
            'type'     => 'text',
        ));

        // Add description setting
        $wp_customize->add_setting("maghreb_widget_{$i}_description", array(
            'default'           => "Widget {$i} Description",
            'sanitize_callback' => 'wp_kses_post', // Allow HTML
        ));

        $wp_customize->add_control("maghreb_widget_{$i}_description", array(
            'label'    => esc_html__("Widget {$i} Description", 'maghreb'),
            'section'  => 'maghreb_hero_section',
            'type'     => 'textarea',
        ));

        // Add button text setting
        $wp_customize->add_setting("maghreb_widget_{$i}_button_text", array(
            'default'           => "Learn More {$i}",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("maghreb_widget_{$i}_button_text", array(
            'label'    => esc_html__("Widget {$i} Button Text", 'maghreb'),
            'section'  => 'maghreb_hero_section',
            'type'     => 'text',
        ));

        // Add button URL setting
        $wp_customize->add_setting("maghreb_widget_{$i}_button_url", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("maghreb_widget_{$i}_button_url", array(
            'label'    => esc_html__("Widget {$i} Button URL", 'maghreb'),
            'section'  => 'maghreb_hero_section',
            'type'     => 'url',
        ));

        // Add icon setting
        $wp_customize->add_setting("maghreb_widget_{$i}_icon", array(
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
        $wp_customize->add_control("maghreb_widget_{$i}_icon", array(
            'label'    => esc_html__("Widget {$i} Icon", 'maghreb'),
            'section'  => 'maghreb_hero_section',
            'type'     => 'select',
            'choices'  => $icons,
        ));
    }

    // Add button size setting
    $wp_customize->add_setting("maghreb_widget_{$i}_button_size", array(
        'default'           => 'medium',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for button size
    $wp_customize->add_control("maghreb_widget_{$i}_button_size", array(
        'label'    => esc_html__("Widget {$i} Button Size", 'maghreb'),
        'section'  => 'maghreb_hero_section',
        'type'     => 'select',
        'choices'  => array(
            'small'  => esc_html__('Small', 'maghreb'),
            'medium' => esc_html__('Medium', 'maghreb'),
            'large'  => esc_html__('Large', 'maghreb'),
        ),
    ));
}
add_action( 'customize_register', 'maghreb_hero_widgets' );

function maghreb_last_posts( $wp_customize ) {
    // Add Setting
    $wp_customize->add_setting( 'show_last_posts', array(
        'default'           => 'yes', // Default to 'no'
        'sanitize_callback' => 'sanitize_text_field', // Sanitize input
    ));

    // Add Control
    $wp_customize->add_control( 'show_last_posts', array(
        'label'    => esc_html__( 'Show Last Posts', 'maghreb' ),
        'section'  => 'maghreb_hero_section', // Replace with your desired section slug
        'type'     => 'select',
        'choices'  => array(
            'yes' => esc_html__( 'Yes', 'maghreb' ),
            'no'  => esc_html__( 'No', 'maghreb' ),
        ),
    ));
}
add_action( 'customize_register', 'maghreb_last_posts' );