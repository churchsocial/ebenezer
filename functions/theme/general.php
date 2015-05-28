<?php

// Register main menu
register_nav_menu('main_menu', 'Main Menu');

// Add post thumbnail support
add_theme_support('post-thumbnails');

// Register sidebars
register_sidebar(array('name' => 'Page'));
register_sidebar(array('name' => 'Blog'));

// Register custom images sizes
add_image_size('banner_large', 940, 470, true);
add_image_size('banner_small', 940, 270, true);

// add_filter( 'use_default_gallery_style', '__return_false' );
if (!isset($content_width)) {
    $content_width = 760;
}

// Setup custom theme options
add_action('customize_register', function($wp_customize)
{
    // Add custom textarea control
    class WP_Textarea_Control extends WP_Customize_Control
    {
        public $type = 'textarea';
        public $wrap = 'on';
        public $rows;

        public function render_content()
        {
            echo '<label>';
            echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
            echo '<textarea wrap="' . $this->wrap . '" rows="' . $this->rows . '" style="width:100%;" ' . $this->get_link() . '>' . esc_textarea($this->value()) . '</textarea>';
            echo '</label>';
        }
    }

    $wp_customize->add_section('social_media', array
    (
        'title' => 'Social Media',
        'priority' => 1
    ));

    $wp_customize->add_setting('twitter');
    $wp_customize->add_control
    (
        new WP_Customize_Control($wp_customize, 'twitter', array
        (
            'label' => 'Twitter',
            'section' => 'social_media',
            'settings' => 'twitter',
            'priority' => 1
        ) )
    );

    $wp_customize->add_setting('facebook');
    $wp_customize->add_control
    (
        new WP_Customize_Control($wp_customize, 'facebook', array
        (
            'label' => 'Facebook',
            'section' => 'social_media',
            'settings' => 'facebook',
            'priority' => 2
        ) )
    );

    $wp_customize->add_setting('member_login');
    $wp_customize->add_control
    (
        new WP_Customize_Control($wp_customize, 'member_login', array
        (
            'label' => 'Member login',
            'section' => 'social_media',
            'settings' => 'member_login',
            'priority' => 3
        ) )
    );


    $wp_customize->add_section('join_us', array
    (
        'title' => 'Join us this Sunday',
        'priority' => 1
    ));

    $wp_customize->add_setting('church_address');
    $wp_customize->add_control
    (
        new WP_Customize_Control($wp_customize, 'church_address', array
        (
            'label' => 'Church Address',
            'section' => 'join_us',
            'settings' => 'church_address',
            'priority' => 1
        ) )
    );

    $wp_customize->add_setting('service_times');
    $wp_customize->add_control
    (
        new WP_Customize_Control($wp_customize, 'service_times', array
        (
            'label' => 'Service Times',
            'section' => 'join_us',
            'settings' => 'service_times',
            'priority' => 2
        ) )
    );

    $wp_customize->add_section('home_page', array
    (
        'title' => 'Home Page',
        'priority' => 1
    ));

    $wp_customize->add_setting('banner', array(
        'default' => '1'
    ));

    $wp_customize->add_control
    (
        new WP_Customize_Control($wp_customize, 'banner', array
        (
            'label' => 'Show large banner',
            'section' => 'static_front_page',
            'settings' => 'banner',
            'priority' => 1,
            'type' => 'select',
            'choices' => array
            (
                '1' => 'Yes',
                '0' => 'No'
            )
        ) )
    );
});