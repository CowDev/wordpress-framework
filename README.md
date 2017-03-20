```
     ██████╗ ██████╗ ██╗    ██╗██████╗ ███████╗██╗   ██╗
    ██╔════╝██╔═══██╗██║    ██║██╔══██╗██╔════╝██║   ██║
    ██║     ██║   ██║██║ █╗ ██║██║  ██║█████╗  ██║   ██║
    ██║     ██║   ██║██║███╗██║██║  ██║██╔══╝  ╚██╗ ██╔╝
    ╚██████╗╚██████╔╝╚███╔███╔╝██████╔╝███████╗ ╚████╔╝ 
     ╚═════╝ ╚═════╝  ╚══╝╚══╝ ╚═════╝ ╚══════╝  ╚═══╝  
                                                    
    ----------------------------------------------------- 
```
# Default WordPress setup
This is a default WordPress setup, using Composer and Git. It's made to be installed one folder up from the public_html folder.
_If your hosting works with a different public folder, you're SOL at this moment, I'm afraid._

## Requirements
The following programs are required to be installed:
- *[Composer:][5]* The dependency manager used to install all plugins, etc.
- *[WP-Cli:][6]* _(Future)_ WP-Cli is used to find and replace the URLs in the database.
- *PHP 5.6 >:* The [Roots\' WP Password bcrypt][3] plugin requires at least PHP version 5.6, and due to the many downsides to using lower versions, we're making it a "must use"

## Installation
To finish installation, do the following steps:
### Composer installation
When in this folder, do `composer install`. Use `composer update` to update plugins etc.
### WordPress installation
place a config file in `config/environment`. Use one of the sample files as an example for the appropriate environment. Remove .sample from the file name.

## Contents
This is a two way system. First, there is a composer system, installing and maintaining WordPress and a couple of plugins.
WordPress has been set up as a separated app, dividing the WordPress system from the content.

The included plugins by default are:
- *[Sucuri WordPress security:][1]* This plugin hasn't been tested yet in the current system, and might not work due to the way WordPress is setup.
- *[WordPress SEO by Yoast:][2]* A plugin used for SEO.
- *[Roots\' WP Password bcrypt:][3]* A plugin used to change the WordPress password functionality, from MD5 to the new `password_hash` and `password_verify` functionality, introduced in PHP v5.5
- *[WP Mandrill:][4]* An alternative to WP_Mail(). Not required, but recommended in most sites.

## Updating
The system can be updated in two different ways. Through composer, which can be run through a cronjob daily, using `composer update`, or using the WordPress auto updater.
This is default, and is set in the `global-config.php` file. Check for the `WP_AUTO_UPDATE_CORE` variable there, to turn it off. Updates are interchangeable. WordPress will only update when visited by default.
Updating through cron might be more consistent.

## Other remarks
Due to the setup of this theme, you're advised to force the URL on each environment (through .htaccess), most importantly on the live site.
The WordPress content and HOME_URL will be set in the global config (config/global-config.php) with the server address.
This might cause issues if you don't force the same URL throughout the site.

[1]: https://wordpress.org/plugins/wordpress-seo/
[2]: https://wordpress.org/plugins/sucuri-scanner/
[3]: https://github.com/roots/wp-password-bcrypt
[4]: https://wordpress.org/plugins/wpmandrill/
[5]: https://getcomposer.org/
[6]: http://wp-cli.org/