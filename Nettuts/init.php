<?php
/*
Plugin Name: Them Option

*/ 
add_action('admin_menu','sinetiks_schools_modifymenus');
function sinetiks_schools_modifymenus() { 
	add_menu_page('Theme Optios', //page title
	'Theme Optios', //menu title
	'administrator', //capabilities
	'show_custom_option', //menu slug
	'manage_html' //function
	);  
}
define('ROOTDIR', plugin_dir_path(__FILE__));
#require_once(ROOTDIR . 'schools-list.php');
require_once(ROOTDIR . 'schools-list-create.php');
 function mytheme_add_init() {
	wp_enqueue_script( 'custom-script', plugins_url( '/script.js', __FILE__ ) );
	wp_enqueue_style( 'custom-style', plugins_url( '/rtl.css', __FILE__ ), array(), '', 'all' ); 
	}
add_action('admin_init', 'mytheme_add_init');
add_action('admin_init', 'my_general_section');  
function my_general_section() {  
    add_settings_section(  
        'my_settings_section', // Section ID 
        'My Options Title', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    ); 
    add_settings_field( // Option 1
        'option_1', // Option ID
        'Custom options for custom fields', // Label  Rajnagar
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
		 
        array( // The $args
            'option_1' // Should match Option ID
        )  
    );  
    register_setting('general','option_1', 'esc_attr');
   
}

function my_section_options_callback() { // Section Callback
    echo '<p>Add Custom Options(abc,xyz)</p>';  
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" class="regular-text" value="' . $option . '" />';
}  