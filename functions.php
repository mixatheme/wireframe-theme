<?php
/**
 * Functions file for themes built with Wireframe Suite for WordPress.
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
 * @see       https://codex.wordpress.org/Functions_File_Explained
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
 * Constants.
 * =============================================================================
 *
 * Loads constants available to your theme.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
require_once get_template_directory() . '/wireframe_cfg/cfg-constants.php';

/**
 * Compatibility: Checker.
 * =============================================================================
 *
 * If WordPress version is incompatible, load backwards compatibility helpers;
 * else continue bootstrapping Wireframe.
 *
 * Note: Whenever WordPress releases a new update, we will always sync this
 * file on GitHub to reflect the latest WordPress version ;-)
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
if ( version_compare( $GLOBALS['wp_version'], WIREFRAME_THEME_WP, '<' ) ) {

	// Incompatible WP: Load backwards compatibility handlers.
	require_once WIREFRAME_THEME_FUNCTIONS . 'compat.php';

} else {

	/**
	 * Bootstrap Wireframe.
	 *
	 * Option #1: Hook Wireframe late so you can access any `pluggable functions` you need.
	 *
	 * Option #2: You can alternatively hook even later with `after_setup_theme` (or similar) if desired.
	 *
	 * Option #3: If you don't need pluggable functions, you can just use require_once().
	 *
	 * Example hook:
	 *
	 *      add_action( 'after_setup_theme', function() {
	 *          require_once WIREFRAME_THEME_DEV . 'wireframe.php';
	 *      } );
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @see   https://codex.wordpress.org/Pluggable_Functions
	 * @todo  Possibly make the action configurable?
	 */
	require_once WIREFRAME_THEME_DEV . 'wireframe.php';
}

/** ADD YOUR CUSTOM FUNCTIONS BELOW THIS LINE... */
/** ------------------------------------------------------------------------- */
