<?php
/**
 * Backwards compatibility helper functions for Wireframe_Theme.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme, Tada Burke
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @version   0.1.0 Wireframe_Theme
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 * @see       https://developer.wordpress.org/themes/basics/theme-functions
 * @see       https://developer.wordpress.org/themes/functionality/custom-headers
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
 * Prevent switching to Wireframe Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since  0.1.0 Wireframe_Theme
 * @author MixaTheme
 *
 * @internal Thanks: twentyseventeen
 */
function wireframe_theme_switch_theme() {

	// Load theme textdomain.
	load_theme_textdomain( 'wireframe-theme', get_template_directory() . '/wireframe_usr/lang' );

	// Hook the update WordPress notice.
	do_action( 'wireframe_theme_hook_update_wordpress', WIREFRAME_THEME_PRODUCT, WIREFRAME_THEME_WP );

	// Switch to the default WordPress theme defined in wp-config.php.
	switch_theme( WP_DEFAULT_THEME );

	// Check the active theme.
	if ( isset( $_GET['activated'] ) ) { // Input var ok.

		// Unset the active theme.
		unset( $_GET['activated'] ); // Input var ok.

	}
}
add_action( 'after_switch_theme', 'wireframe_theme_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful switch to Wireframe Theme
 * on incompatible WordPress versions.
 *
 * @since  0.1.0 Wireframe
 * @since  0.1.0 Wireframe_Theme
 * @param  string $product               The name of this product.
 * @param  string $compat                The WordPress version compatible with this product.
 * @global string $GLOBALS['wp_version'] WordPress version.
 */
function wireframe_theme_update_wordpress( $product, $compat ) {

	// Notice text.
	$notice = sprintf( __( '%1$s requires at least WordPress %2$s. You are running WordPress %3$s. Please upgrade WordPress and re-activate %1$s.', 'wireframe-theme' ), $product, $compat, $GLOBALS['wp_version'] );

	// Display notice on Admin screens.
	if ( is_admin() ) {
		printf( __( '<div class="error"><p>%s</p></div>', 'wireframe-theme' ), $notice ); // XSS ok.
	}

}
add_action( 'wireframe_theme_hook_update_wordpress', 'wireframe_theme_update_wordpress', 10, 2 );
