<?php
/*
Plugin Name: Browser DNS Prefetching
Plugin URI: http://fusi0n.org/category/browser-dns-prefetching
Description: Allows users to select whether they want to activate, deactivate or selectively configure Browser DNS Prefetching
Version: 1.0
Author: Pier-Luc Petitclerc
Author URI: http://twitter.com/pluc
Text Domain: bdp
License: GPL
*/

class Browser_DNS_Prefetching {
  public function __construct() {
    if (is_admin) {
      add_action('admin_init', array($this, 'bdp_admin_init'));
      add_action('admin_menu', array($this, 'bdp_hooks_admin'));
      add_action('plugin_action_links_'.plugin_basename(__FILE__), array($this, 'bdp_plugin_links'));
    }
    add_action('wp_head', array($this, 'bdp_head'));
  }

  public function bdp_head() {
    $prefetch = get_option('bdp_status');
    echo '<meta http-equiv="x-dns-prefetch-control" content="'.$prefetch.'">'."\n";
    if ($prefetch != 'on') {
      $domains = get_option('bdp_domains');
      foreach ($domains as $domain) {
        if (!empty($domain)) echo '<link rel="dns-prefetch" href="http://'.$domain.'/">'."\n";
      }
    }
  }

  public function bdp_admin_init() {
    register_setting('browser-dns-prefetching', 'bdp_status');
    register_setting('browser-dns-prefetching', 'bdp_domains');
  }

  public function bdp_hooks_admin() {
    add_options_page('Browser DNS Prefetching', __('DNS Prefetching'), 'edit_plugins', 'bdp', array($this, 'bdp_options_page'));
  }

  public function bdp_plugin_links($links) {
    $additionalLinks = array('<a href="options-general.php?page=bdp">'.__('Settings').'</a>');
    return array_merge($additionalLinks, $links);
  }

  public function bdp_options_page() {
    echo '<div class="wrap"><h2>Browser DNS Prefetching</h2><form method="post" action="options.php">';
    $nonce = (function_exists('settings_fields'))? settings_fields('browser-dns-prefetching') : wp_nonce_field('update-options').'<input type="hidden" name="action" value="update" /><input type="hidden" name="page_options" value="bdp_status,bdp_domains" />';
    echo '<input type="hidden" name="action" value="update" />';
    echo '<h3>'.__('Browser DNS Prefetching Status', 'bdp').'</h3>';
    echo get_option('bdp_status') == 'on'? '<input type="radio" name="bdp_status" value="on" checked="checked" />On  <input type="radio" name="bdp_status" value="off">Off<br />' : '<input type="radio" name="bdp_status" value="on" />On  <input type="radio" name="bdp_status" value="off" checked="checked">Off<br />';
    echo "\n".'<h3>'.__('Enable Prefetching for Specific Domains').'</h3><em>Format: domain.com</em><br />';
    $domains = get_option('bdp_domains');
    if (count($domains)) {
      $i=0;
      foreach ($domains as $domain) {
        echo 'Domain #'.++$i.': <input type="text" name="bdp_domains[]" value="'.$domain.'" /><br />';
      }
    }
    else {
      for ($i=1;$i<=5;$i++) { echo 'Domain #'.$i.': <input type="text" name="bdp_domains[]" value="" /><br />';}
    }
    echo '<p class="submit"><input type="submit" name="Submit" value="Save Changes" /></p></form></div>';
  }
}
new Browser_DNS_Prefetching;