<?php

////////////////////////////////////////////////////
// SimpleAppStore API - version 1.0
// https://github.com/anonwins/SimpleAppStore
////////////////////////////////////////////////////

# Required to change

	# You should change this from the default. It's the passcode for the apk-upload api
	$_passcode = 'PlsChangeThisToWhateverTextYouWantPlsMakeItHardToGuess9192837647';

# Change only if necessary

	# This is the accepted domain of AI2. Used in the apk-upload api
	$_origin = 'http://ai2.appinventor.mit.edu';

# Don't change

	# Internal paths. Change only if you understand what you're doing.
	$_apk_dir = './apk'; // this is the dir the apk's are stored
	$_img_dir = './img'; // this is the dir the apps images are stored
	$_app_list_path = './app-list.json'; // this is the json file you

?>