<?php
/**
 * Plugin Name: KitIcon Block.
 * Description: KitIcon is icon block  for WordPress Gutenberg Block.
 * Plugin URI:  http://kitbug.com/
 * Version:     1.0.0
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Author:      KitBug
 * Author URI:  https://profiles.wordpress.org/kitbug/
 * Text Domain: kit-icon
 */

// Exit if accessed directly.
// KITICON KitIcon kiticon

if (!defined('ABSPATH')) {
    exit;
}
define('KITICON_VERSION', '1.0.0');
define( 'KITICON_PLUGIN_DIR', dirname( __FILE__ ) . '/' );

if ( ! defined( 'KITICON_PLUGIN_URI' ) ) {
	define( 'KITICON_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

require_once KITICON_PLUGIN_DIR  . 'function/kiticon-scripts.php';
require_once KITICON_PLUGIN_DIR  . 'function/blocks-cat.php';
require_once KITICON_PLUGIN_DIR  . 'function/carbon-loader.php';
require_once KITICON_PLUGIN_DIR  . 'includes/icon-block/block-kiticon.php';


function kiticon_icon_lib() {
    $kiticon_icon_list = array();
    $kiticon_icon_all = glob( __DIR__ . '/includes/icon-block/icons/*.svg' );
    foreach ( $kiticon_icon_all as $icon ) {
        $iconExt = str_replace( __DIR__ . '/includes/icon-block/icons/' ,"", $icon);
        $iconPath = plugin_dir_url( __FILE__ ) . 'includes/icon-block/icons/' . $iconExt;
        $iconName = str_replace('.svg' ,"", $iconExt);
        $kiticon_icon_list[$iconName] = $iconPath;
    }
    return $kiticon_icon_list;
}


