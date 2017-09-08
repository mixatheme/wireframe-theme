<?php
/**
 * Constants config for themes built with Wireframe Suite for WordPress.
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
 *      namespace MyCompany\MyTheme;
 *      use MixaTheme\Wireframe\Theme\Core_Enqueue;
 *      use Walker_Nav_Menus;
 *      use wpdb;
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
 * WordPress compatibility version.
 *
 * The minimum version of WordPress compatible with Wireframe Theme.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_WP', '4.8.1' );

/**
 * Product name.
 *
 * Official product name for your theme. This is used in various headings,
 * titles and menus. Your official product name should maintain consistency.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_PRODUCT', 'Wireframe Theme' );

/**
 * Theme text-domain.
 *
 * Theme text-domain (must match slug) used primarily for translation strings.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_TEXTDOMAIN', 'wireframe-theme' );

/**
 * Theme version.
 *
 * Tagged version number for this release. This is used throughout many
 * dependencies, especially when you enqueue your styles & scripts.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_VERSION', '0.1.0' );

/**
 * Theme prefix.
 *
 * A prefix for various strings, handles and helpers. This is primarily used
 * for keeping names short and helps avoid clashes. 3-8 characters preferred.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_PREFIX', 'wireframe_theme' );

/**
 * Theme directory.
 *
 * Template directory path. Retrieves the absolute path to the directory
 * of the current theme. Returns an absolute server path, for example:
 * `/srv/www/wordpress/htdocs/wp-content/themes/wireframe_theme` (not a URI).
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_DIR', get_template_directory() );

/**
 * Theme directory URI.
 *
 * Template URI. Retrieve theme directory URI. Checks for SSL. Does not return
 * a trailing slash following the directory address. This is primarily used for
 * loading your theme assets.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_URI', get_template_directory_uri() );

/**
 * Theme path for Developers.
 *
 * Absolute path to the `wireframe_dev` directory. This directory is specifically
 * for Developers and contains functions, classes, uncompiled JS/SCSS, etc.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_DEV', trailingslashit( WIREFRAME_THEME_DIR . '/wireframe_dev' ) );

/**
 * Theme path for functions.
 *
 * Absolute path to the Wireframe helper functions.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_FUNCTIONS', trailingslashit( 'wireframe_dev/functions' ) . 'functions-' );

/**
 * Theme path to Wireframe API.
 *
 * Absolute path to the Wireframe API. This directory holds base classes,
 * module classes, helper functions, utilities, config data, etc. This constant
 * should generally be used in conjunction with locate_template() so child
 * themes can overload any API files. NO leading slash. HAS trailing slash.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_API', trailingslashit( 'wireframe_dev/wireframe' ) );

/**
 * Theme path for objects.
 *
 * Absolute path to the Wireframe API for loading class files. This should
 * only be used if you choose to NOT use Composer's autoloading feature.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_OBJECTS', trailingslashit( WIREFRAME_THEME_DIR . '/wireframe_dev/wireframe' ) );
define( 'WIREFRAME_THEME_CORE', WIREFRAME_THEME_OBJECTS . 'core/core-' );
define( 'WIREFRAME_THEME_MODULE', trailingslashit( WIREFRAME_THEME_OBJECTS . 'module' ) );

/**
 * Theme path to client-side assets.
 *
 * Relative path to the `wireframe_usr` directory. This directory primarily
 * holds front-end assets, such as: images, fonts, scripts, stylesheets, etc.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_USER', trailingslashit( '/wireframe_usr' ) );

/**
 * Theme URI for CSS.
 *
 * URI for stylesheets located in the `wireframe_usr/css` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_CSS', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_USER . 'css' ) );

/**
 * Theme URI for fonts.
 *
 * URI for fonts located in the `wireframe_usr/fonts` directory. This is
 * primarily called by `.scss` files to compile the path to fonts.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_FONTS', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_USER . 'fonts' ) );

/**
 * Theme URI for images.
 *
 * URI for images located in the `wireframe_usr/img` directory. This is
 * primarily called by `.scss` files to compile the path to images.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_IMG', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_USER . 'img' ) );

/**
 * Theme URI for JavaScript.
 *
 * URI for JavaScript files located in the `wireframe_usr/js` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_JS', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_USER . 'js' ) );

/**
 * Theme language path.
 *
 * Absolute path to the `wireframe_usr/lang` directory. This directory
 * holds any `.mo` or `.po` or `.pot` files you package with your theme.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_LANG', trailingslashit( WIREFRAME_THEME_DIR . WIREFRAME_THEME_USER . 'lang' ) );

/**
 * Theme path for template parts.
 *
 * Relative path to the `wireframe_usr/tpl` directory (NO leading slash).
 * This directory holds files called by the `get_template_part()` function.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_TPL', trailingslashit( 'wireframe_usr/tpl' ) );
