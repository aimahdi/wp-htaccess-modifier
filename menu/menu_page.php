<?php

$rootDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;

// Get the absolute path to the current script
$currentScriptPath = $_SERVER['SCRIPT_FILENAME'];

// Find the WordPress installation directory by looking for wp-config.php
$wpConfigPath = str_replace("\\", "/", dirname($currentScriptPath));


// Assume the .htaccess file is in the WordPress installation directory
$htaccessPath = dirname($wpConfigPath) . '/.htaccess';


$fileExistance = true;

// Check if the .htaccess file exists
if (!file_exists($htaccessPath)) {
    $fileExistance = false;
    
}else{
    //file exists
    $file = fopen($htaccessPath, 'r');

    $content = '';

    while(($line = fgets($file)) !== false){
        $content .= $line;
        $content .= '<br>';
    }
}






require $rootDir . 'views' . DIRECTORY_SEPARATOR . 'view.php';