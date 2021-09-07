# Simple App Store 1.0 - Server (API)
These are the server files for the SimpleAppStore AI2 project

## Requirements

   - Must have **aapt** package installed (ubuntu: **apt install aapt**)
   - A PHP server

## How to install

- Clone this repository or download as zip. Put the files in a directory in your web server.

## How to configure

- [config.php](config.php)
    
    - You need to change the passcode. This is your personal/admin password
    
- [app-list.json](app-list.json)

    - Here you need to enter your apps (name, description, package name)
    
       The rest will be generated automatically (apk url, version code, app picture, picture url)
    
## How to use

  - Load [index.php](index.php) in your browser.

    You will see your app-list in a format suitable for the SimpleAppStore AI2 project.
    
    You can use this url in your project.
    
  - To upload a new version of an app, load the [apk-upload.php](apk-upload.php) in your browser
  
    You need to provide these parameters: `apk-url`, `passcode`
    
    example: `https://your-server/simple-app-store-api/apk-upload.php?apk-url=https://ai2app.apk&passcode=ThisIsExamplePasscode123`
    
## Once-click APK upload
   
   You can also use this handy [bookmarklet](https://support.mozilla.org/en-US/kb/bookmarklets-perform-common-web-page-tasks) to publish your app with one click, right after you build it:
   
    javascript: if (document.querySelector('.gwt-Anchor.gwt-Button.download-button').href) {
    
	var api_url = 'https://your-server/simple-app-store-api/apk-upload.php'; // <-- change this!
	var api_passcode = 'ThisIsExamplePasscode123'; // <-- and this!
  
	fetch(api_url+'?apk-url='+document.querySelector('.gwt-Anchor.gwt-Button.download-button').href+'&passcode='+api_passcode)
	.then(response=>response.text()).then(data=>alert(data)).catch(error=>{alert(error)});}
   
   Don't forget to change your api url & passcode in the above bookmarklet.
   
   To install the bookmarklet, just create a new bookmark in your browser's toolbar and paste this code as URL.
   
   Just click the bookmarklet when the Download APK button & QR code appear in AI2, after the build.
   
   The fresh apk will be sent to the server, and the API will reflect the new version in future calls.
   
## How to set app images

   Add the images in the [`/img`](/img) folder. Each image must have the name of the app. Not the whole package name.
   
   Example: `/img/app1.png`
   
   Note the images but by png
   
## How to add new apps / remove apps

   Just edit the [app-list.json](app-list.json)
