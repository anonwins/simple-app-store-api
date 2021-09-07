<?php

////////////////////////////////////////////////////
// SimpleAppStore API - version 1.0
// https://github.com/anonwins/SimpleAppStore
////////////////////////////////////////////////////

require_once('./config.php');
require_once('./functions.php');

// Get current dir's URL
$dir_url = get_current_dir_url();

// List all apps
$return = '';
foreach(get_app_list() as $app) {
	$return .=   "||".$app['name']; 										// 1. app name
	$return .= "\n||".$app['desc']; 										// 2. app description
	$return .= "\n||".get_apk_version_code(get_apk_filepath($app['pckg']));	// 3. version code
	$return .= "\n||".get_app_picture_url($app['pckg']); 					// 4. picture url
	$return .= "\n||".get_apk_url($app['pckg']); 							// 5. apk url
	$return .= "\n||".$app['pckg']; 										// 6. package name
	$return .= "\n---\n";
}

// Send the app list
echo substr($return,0,-5);

?>