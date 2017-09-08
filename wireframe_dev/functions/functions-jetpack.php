<?php
/**
 * Jetpack helper functions for Wireframe_Theme.
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
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! function_exists( 'wireframe_theme_jetpack_features' ) ) :
	/**
	 * Jetpack theme support.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 * @uses   wireframe_theme_infinite_scroll_render()
	 * @see    functions-jetpack.php
	 * @see    https://jetpack.com/support/infinite-scroll/
	 * @see    https://jetpack.com/support/responsive-videos/
	 * @todo   Move this to Theme_Features class?
	 */
	function wireframe_theme_jetpack_features() {
		add_theme_support(
			'infinite-scroll',
			array(
				'container' => 'main',
				'render'    => 'wireframe_theme_infinite_scroll_render',
				'footer'    => 'page',
			)
		);
		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );
	}
	add_action( 'after_setup_theme', 'wireframe_theme_jetpack_features' );
endif;

if ( ! function_exists( 'wireframe_theme_jetpack_infinite_scroll_render' ) ) :
	/**
	 * Infinite Scroll render.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 * @see    functions-jetpack.php
	 * @see    https://jetpack.com/support/infinite-scroll/
	 *
	 * @internal Thanks: _s
	 */
	function wireframe_theme_jetpack_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( is_search() ) {
				get_template_part( WIREFRAME_THEME_TPL . 'content', 'search' );
			} else {
				get_template_part( WIREFRAME_THEME_TPL . 'content', get_post_format() );
			}
		}
	}
endif;
