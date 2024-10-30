=== Browser DNS Prefetching ===
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=pL%40fusi0n%2eorg&lc=CA&item_name=Pier%2dLuc%20Petitclerc%20%2d%20Code%20Support&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest
Tags: dns, prefetch, prefetching, optimization, bandwidth
Requires at least: 2.7
Tested up to: 3.1
Stable tag: 1.0
Contributors: plpetitclerc

Allows users to select whether they want to activate, deactivate or selectively configure Browser DNS Prefetching

== Description ==

Disabling (or configuring correctly) your site's DNS prefetching option allows you to save immensely on bandwidth as described in [this article](http://www.pinkbike.com/news/DNS-Prefetching-Implications.html).

To learn more about DNS Prefetching:

* [Controlling DNS Prefetching](https://developer.mozilla.org/en/controlling_dns_prefetching)
* [DNS Prefetching for Firefox](http://bitsup.blogspot.com/2008/11/dns-prefetching-for-firefox.html)
* [DNS Prefetching or Pre-Resolving](http://blog.chromium.org/2008/09/dns-prefetching-or-pre-resolving.html)
* [DNS Prefetching Implications](http://www.pinkbike.com/news/DNS-Prefetching-Implications.html)

== Installation ==

* Use WordPress’ builtin plugin installation system located in your WordPress admin panel, labeled as the "Add New" options in the "Plugins" menu to upload the zip file you downloaded
* Extract the zip file and upload the resulting "browser-dns-prefetching" folder on your server under `wp-content/plugins/`.

All you need to do after that is navigate to your blog’s administration panel, go in the plugins section and enable Browser DNS Prefetching.

In order to personalize the available options, check in WordPress' "Settings" section under "DNS Prefetching"

For more information, see the ["Installing Plugins" article on the WordPress Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

When configuring BDP, you can either set global prefetch to "On" which will prefetch every DNS query or you can set it to "off" to turn all prefetching off.

Should you want to keep prefetching for selected domains (up to 5), set BDP to "Off" and add your domains where prompted.

== Frequently Asked Questions ==

= Any technical requirements? =

* You will need PHP5. PHP4 has been [officially discontinued since August 8 2008](http://www.php.net/archive/2007.php#2007-07-13-1). If this plugin gives you PHP errors (T_STATIC, T_OLD_FUNCTION), you should strongly consider upgrading your PHP installation.

== ChangeLog ==

= 1.0 =

* Initial release
