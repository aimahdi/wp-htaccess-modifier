<?php
/**
*Plugin Name: WP .htaccess Modifier
*Plugin URI: http://wordpress.org/plugins/wp-htaccess-modifier
*Description: This is plugin that you can use to modify the .httacess file's content.
*Author: Amimul Ihsan Mahdi
*Version: 1.0.0
*Author URI: https://aimahdi.com
*/



add_action( 'admin_menu', 'show_plugin_page' );
function show_plugin_page() {
    add_menu_page(
        '',
        'WP .htaccess Modifier',
        'manage_options',
        plugin_dir_path(__FILE__) . '/menu/menu_page.php',
        null,
        'dashicons-code-standards',
        50
    );
}

// Define a function to enqueue your styles
function enqueue_plugin_styles() {
    // Enqueue your custom CSS file for the plugin
    wp_enqueue_style('wp-htaccess-modifier-styles', plugins_url('assets/css/styles.css', __FILE__));

    
   wp_enqueue_script('wp-htaccess-modifier-script', plugins_url('assets/js/script.js', __FILE__));
}

// Hook the function to the wp_enqueue_scripts action
add_action('admin_enqueue_scripts', 'enqueue_plugin_styles');

// Inside your main plugin file or in a dedicated file
add_action('wp_ajax_clearHTACCESSData', 'clearHTACCESSData');
add_action('wp_ajax_nopriv_clearHTACCESSData', 'clearHTACCESSData');

function clearHTACCESSData() {

    // Get the absolute path to the current script
$currentScriptPath = $_SERVER['SCRIPT_FILENAME'];

// Find the WordPress installation directory by looking for wp-config.php
$wpConfigPath = str_replace("\\", "/", dirname($currentScriptPath));


// Assume the .htaccess file is in the WordPress installation directory
$htaccessPath = dirname($wpConfigPath) . '/.htaccess';

    //$file_path = '/path/to/your/file.txt'; // Update with the actual path to your file

    // Your logic to update the file content goes here
    $new_content = ''; // Replace with your desired content

    // Update the file content
   // $result = file_put_contents($htaccessPath, $new_content);
    $result = unlink($htaccessPath);

    // Return a response based on the result
    if ($result !== false) {
        echo '.htaccess updated successfully!';
    } else {
        echo 'Error updating the file!';
    }

    // Always exit after processing to ensure proper AJAX handling
    wp_die();
}


// Inside your main plugin file or in a dedicated file
add_action('wp_ajax_updateDefaultData', 'updateDefaultData');
add_action('wp_ajax_nopriv_updateDefaultData', 'updateDefaultData');

function updateDefaultData() {

    // Get the absolute path to the current script
$currentScriptPath = $_SERVER['SCRIPT_FILENAME'];

// Find the WordPress installation directory by looking for wp-config.php
$wpConfigPath = str_replace("\\", "/", dirname($currentScriptPath));



// Assume the .htaccess file is in the WordPress installation directory
$htaccessPath = dirname($wpConfigPath) . '/.htaccess';

    //$file_path = '/path/to/your/file.txt'; // Update with the actual path to your file

    // Your logic to update the file content goes here
    $new_content = trim('
# BEGIN WordPress
    <IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteRule ^index\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /index.php [L]
    </IfModule>
# END WordPress
    
    
    '); // Replace with your desired content

    // Update the file content
    $result = file_put_contents($htaccessPath, $new_content);

    // Return a response based on the result
    if ($result !== false) {
        echo '.htaccess updated successfully!';
    } else {
        echo 'Error updating the file!';
    }

    // Always exit after processing to ensure proper AJAX handling
    wp_die();
}

// Inside your main plugin file or in a dedicated file
add_action('wp_ajax_updateCustomRule', 'updateCustomRule');
add_action('wp_ajax_nopriv_updateCustomRule', 'updateCustomRule');

function updateCustomRule() {

    // Get the absolute path to the current script
$currentScriptPath = $_SERVER['SCRIPT_FILENAME'];

// Find the WordPress installation directory by looking for wp-config.php
$wpConfigPath = str_replace("\\", "/", dirname($currentScriptPath));



// Assume the .htaccess file is in the WordPress installation directory
$htaccessPath = dirname($wpConfigPath) . '/.htaccess';

    //$file_path = '/path/to/your/file.txt'; // Update with the actual path to your file

    // Your logic to update the file content goes here
    $new_content = trim('
# BEGIN WordPress
    <IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteRule ^index\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /index.php [L]
    </IfModule>
# END WordPress
    '); // Replace with your desired content

    // Update the file content
    $result = file_put_contents($htaccessPath, $new_content);

    // Return a response based on the result
    if ($result !== false) {
        echo '.htaccess updated successfully!';
    } else {
        echo 'Error updating the file!';
    }

    // Always exit after processing to ensure proper AJAX handling
    wp_die();
}



