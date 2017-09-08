<?php
/**
 * Theme_UI config for modules built with Wireframe Suite for WordPress.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme, Tada Burke
 * @version   0.1.0 Wireframe_Theme
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespaces.
 *
 * You should namespace configs to access your objects. If you change your
 * namespace, don't forget to `use` any namespace aliases you may need.
 * Also, if you autoload, don't forget to re-compile Composer.
 *
 * Examples:
 *
 * 		namespace MyCompany\MyTheme;
 * 		use MixaTheme\Wireframe\Theme\Core_Enqueue;
 * 		use Walker_Nav_Menus;
 * 		use wpdb;
 *
 * @since 5.3.0 PHP
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 * @since 0.1.0 Wireframe Child
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 * @since 0.1.0 Wireframe Child
 */
defined( 'ABSPATH' ) or die();

/**
 * Stores array of default config data for passing into objects.
 *
 * Option #1: We use a function so the config data can be called and reused
 *            easily when you neeed it.
 *
 * Option #2: Put your array data inside a Services closure (see wireframe.php).
 *            Another alternative is putting all your object configs into one
 *            single config file to minimize your file count.
 *
 * @since  0.1.0 Wireframe
 * @since  0.1.0 Wireframe_Theme
 * @since  0.1.0 Wireframe Child
 * @see    object Theme_UI
 * @return array  Default configuration values.
 */
function wireframe_theme_cfg_ui() {
	/**
	 * Wired.
	 *
	 * Wires the Theme_UI actions & filters at runtime. Since most themes
	 * should have UI styles & scripts, this should usually be set to true.
	 *
	 * Note: Most objects can be wired to hook actions & filters when an object
	 * is instantiated. This is optional, because some objects do not need any
	 * actions or filters.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   bool $wired Wire hooks via __construct(). Default: true
	 */
	$wired = true;

	/**
	 * Prefix.
	 *
	 * Many objects use a prefix for various strings, handles, scripts, etc.
	 * Generally, you should use a constant defined in config-constants.php. However,
	 * you can change it here if needed. Default: WIREFRAME_THEME_PREFIX
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   string $prefix Prefix for handles.
	 */
	$prefix = WIREFRAME_THEME_PREFIX;

	/**
	 * Actions.
	 *
	 * Most objects will usually need actions to be hooked at some point.
	 * You can set your actions in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   array $actions Actions to hook.
	 */
	$actions = array(
		'styles' => array(
			'tag'      => 'wp_enqueue_scripts',
			'function' => 'styles',
			'priority' => 10,
			'args'     => null,
		),
		'scripts' => array(
			'tag'      => 'wp_enqueue_scripts',
			'function' => 'scripts',
			'priority' => 10,
			'args'     => null,
		),
		'stylecss' => array(
			'tag'      => 'wp_enqueue_scripts',
			'function' => 'stylecss',
			'priority' => 10,
			'args'     => null,
		),
		'comments' => array(
			'tag'      => 'wp_enqueue_scripts',
			'function' => 'commentjs',
			'priority' => 10,
			'args'     => null,
		),
	);

	/**
	 * Filters.
	 *
	 * Objects don't generally need filters here, but you have the option.
	 * You can set your filters in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   array $filters Filters to hook.
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Stylesheets to load.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   array $styles Array of stylesheets to enqueue.
	 */
	$styles = array();

	/**
	 * Scripts to load.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   array $scripts Array of scripts to enqueue.
	 */
	$scripts = array();

	/**
	 * Load media modal. This is primarily Plugin territory, but
	 * it's only here for completeness. Most likely should remain false.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   bool $media True loads wp_enqueue_media(). Default: false.
	 * @todo  Should we contextually enqueue media modal?
	 */
	$mediamodal = false;

	/**
	 * Load default style.css. This should almost always be true.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   bool $stylecss Default: true.
	 */
	$stylecss = true;

	/**
	 * Load comment-reply script. This is a WordPress script which
	 * enables better UX for comment reply forms. Should always be true.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   bool $commentjs Default: true.
	 */
	$commentjs = true;

	/**
	 * This config depends on the Core_Enqueue object, so we need to intantiate
	 * the Core_Enqueue object and pass-in parameters.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @var   object Core_Enqueue(
	 *        @param string     $prefix     Required prefix for handles.
	 *        @param array|null $styles     Optional styles.
	 *        @param array|null $scripts    Optional scripts.
	 *        @param bool|null  $mediamodal Optional media modal.
	 *        @param bool|null  $stylecss   Optional main stylesheet.
	 *        @param bool|null  $commentjs  Optional main comment-reply script.
	 * )
	 */
	$enqueue = new Core_Enqueue( $prefix, $styles, $scripts, $mediamodal, $stylecss, $commentjs );

	/**
	 * Option #1: Return (array) of config data for passing into objects.
	 *
	 * Option #2: Cast array as an (object) and use object/property sytnax
	 *            vs array syntax. If you choose to cast this array as an (object),
	 *            then you will need to modify the syntax in your class files.
	 *
	 * PRO-TIP: Most of Wireframe's object properties are protected or private
	 * and should not be set outside of this config file. However, you may wish
	 * to use `apply_filters` or `wp_json_encode` or `add_setting` or `add_option`
	 * whenever appropriate. Consider Admin pages for modifying settings & options.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @since  0.1.0 Wireframe Child
	 * @return array|object
	 */
	return array(
		'wired'   => $wired,
		'prefix'  => $prefix,
		'actions' => $actions,
		'filters' => $filters,
		'enqueue' => $enqueue,
	);

} // Thanks for using MixaTheme products!
