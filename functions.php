<?php

////////////////////////////////////////////////////
// SimpleAppStore API - version 1.0
// https://github.com/anonwins/SimpleAppStore
////////////////////////////////////////////////////

function get_apk_version_code($apk_path) {
	// You need to have aapt installed.
	// If you want to change the command, to use another tool for example, this is the place to do it:
	$ver = shell_exec("aapt dump badging '$apk_path' | grep 'versionCode' | sed -e \"s/.*versionCode='//\" -e \"s/' .*//\"");
	return intval($ver);
}

function get_app_list() {
	// Returns the app-list json as Array
	global $_app_list_path;
	return json_decode(file_get_contents($_app_list_path),true);
}

function is_apk_in_list($filename) {
	// Returns true if a apk filename matches the app-list packages
	foreach (get_app_list() as $app) {
		$pckg_r = explode('.',$app['pckg']);
		if (end($pckg_r).'.apk' == $filename) return true;
	}
	return false;
}

function get_current_dir_url() {
	$dir_url = (@$_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
	$dir_url .= $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "/"));
	return $dir_url;
}

function get_apk_url($package_name) {
	global $_apk_dir;
	$url = get_current_dir_url()."/$_apk_dir/".get_apk_filename($package_name);
	return str_replace('/./','/',$url);
}

function get_apk_filename($package_name) {
	return end(explode('.',$package_name)).'.apk';
}

function get_apk_filepath($package_name) {
	global $_apk_dir;
	return $_apk_dir."/".get_apk_filename($package_name);
}

function get_app_picture_filename($package_name) {
	return end(explode('.',$package_name)).'.png';
}

function get_app_picture_url($package_name) {
	global $_img_dir;
	$url = get_current_dir_url()."/$_img_dir/".get_app_picture_filename($package_name);
	return str_replace('/./','/',$url);
}

?>