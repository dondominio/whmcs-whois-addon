# The DonDominio/MrDomain Whois Addon for WHMCS

This addon makes possible to perform WHOIS queries using the DonDominio/MrDomain API service.

You will need a username and password for the DonDominio/MrDomain API to use this addon. Head to the [API documentation](https://dev.dondominio.com) for more information.

The addon is composed of two scripts: `whoisproxy.php` is the script that performs WHOIS queries using the DonDominio API and `ddwhois.php` is an Addon for WHMCS that allows to configure and setup the WHOIS proxy.

## Installation
Download the files in ZIP form from Github and unzip them. On your WHMCS installation, navigate to `/modules/addons/` and create a folder named `ddwhois`. Copy inside this folder the files from the previous ZIP file. Ensure that this folder can be writen by your web server.

Once finished, access your WHMCS Administration Panel, and navigate to `Setup > Addon Modules`. Look in the list for `DonDominio Whois Addon` and click `Activate`. Once activated, go to `Addons > DonDominio Whois Addon`, click on `Settings` and enter your API Username & Password. Now the plugin is ready to work.

At this point, if you see a warning about permissions, you will need to perform additional actions. Instead, if you see the Whois Servers list, you're ready to go.

## Restrict access

We recommend restricting access to the whoisproxy.php file from outside your server to avoid overuse of this service. You can do this using a variety of methods, such as using the .htaccess file or a firewall installed on your server.

## Fixing permissions

If you see a warning about permissions once you have configured the addon, you will need to ensure that the file `/includes/whoisservers.php` is writable by your web server. Depending on your operating system and version the exact procedure may vary, but it's usually enough to change the owner or group of the file to the one used by your web server process.
