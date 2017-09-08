<?php
/**
 * Extras helper functions for Wireframe_Theme.
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

if ( ! function_exists( 'wireframe_theme_is_home' ) ) :
	/**
	 * Wireframe Theme callback for Posts.
	 *
	 * Helper for Contexual Controls (active_callback) in the Customizer, or
	 * various template parts. If you don't need to support PHP 5.2, then you
	 * may wish to use a closure instead in the Customizer.
	 *
	 * @since 0.1.0 Wireframe_Theme
	 * @see   https://developer.wordpress.org/themes/advanced-topics/customizer-api/
	 */
	function wireframe_theme_is_home() {
		if ( is_home() ) {
			return true;
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_is_single' ) ) :
	/**
	 * Wireframe Theme callback for Single.
	 *
	 * Helper for Contexual Controls (active_callback) in the Customizer, or
	 * various template parts. If you don't need to support PHP 5.2, then you
	 * may wish to use a closure instead in the Customizer.
	 *
	 * @since 0.1.0 Wireframe_Theme
	 * @see   https://developer.wordpress.org/themes/advanced-topics/customizer-api/
	 */
	function wireframe_theme_is_single() {
		if ( is_single() ) {
			return true;
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_is_page' ) ) :
	/**
	 * Wireframe Theme callback for Pages.
	 *
	 * Helper for Contexual Controls (active_callback) in the Customizer, or
	 * various template parts. If you don't need to support PHP 5.2, then you
	 * may wish to use a closure instead in the Customizer.
	 *
	 * @since 0.1.0 Wireframe_Theme
	 * @see   https://developer.wordpress.org/themes/advanced-topics/customizer-api/
	 */
	function wireframe_theme_is_page() {
		if ( is_page() ) {
			return true;
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_css_article' ) ) :
	/**
	 * Adds extra CSS classes to an article element. This can be useful
	 * for adding Microformats v2+, etc.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 */
	function wireframe_theme_css_article() {

		// Default classes.
		$default = array( 'h-entry' );

		// Get theme mod.
		$mod = get_theme_mod( 'css_article', $default );

		// Results.
		return apply_filters( 'wireframe_theme_css_article', $mod );

	}
endif;

if ( ! function_exists( 'wireframe_theme_read_more_link' ) ) :
	/**
	 * Wireframe Read More
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 */
	function wireframe_theme_read_more_link() {
		$readmore  = '&nbsp;';
		$readmore .= '<i class="fa fa-arrow-circle-right"></i>';
		$readmore .= '&nbsp;';
		$readmore .= '<a class="more-link" href="' . get_permalink() . '">' . esc_html_e( 'Read More', 'wireframe-theme' ) . '</a>';
		return $readmore;
	}
	add_filter( 'the_content_more_link', 'wireframe_theme_read_more_link' );
endif;


if ( ! function_exists( 'wireframe_theme_search_form_button' ) ) :
	/**
	 * Adds the ability to override the widget search form button.
	 *
	 * @since 2.7.0 WordPress
	 * @since 0.1.0 Wireframe_Theme
	 * @param string $text Replaces the form elements.
	 * @see   https://developer.wordpress.org/reference/functions/get_search_form/
	 * @todo  Glyphicon vs Font Awesome?
	 */
	function wireframe_theme_search_form_button( $text ) {
		$text = str_replace(
			'input type="submit" class="search-submit" value="Search"',
			'button>Search</button',
			$text
		);
		return $text;
	}
	add_filter( 'get_search_form', 'wireframe_theme_search_form_button' );
endif;


if ( ! function_exists( 'wireframe_theme_tag_cloud_font' ) ) :
	/**
	 * Wireframe Tag Cloud description.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 * @param  array $args Font sizes for tag cloud.
	 */
	function wireframe_theme_tag_cloud_font( $args ) {
		$args['smallest'] = 9;
		$args['largest']  = 24;
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'wireframe_theme_tag_cloud_font' );
endif;

if ( ! function_exists( 'wireframe_theme_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 * @param  array $classes Classes for the body element.
	 * @return array
	 */
	function wireframe_theme_body_classes( $classes ) {

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
	add_filter( 'body_class', 'wireframe_theme_body_classes' );
endif;
