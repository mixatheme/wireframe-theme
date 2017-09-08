<?php
/**
 * Custom Header helper functions for Wireframe_Theme.
 *
 * Sample implementation of the Custom Header feature.
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

if ( ! function_exists( 'wireframe_theme_custom_header' ) ) :
	/**
	 * Renders a Custom Header.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 * @see    header.php
	 */
	function wireframe_theme_custom_header() {
		if ( get_header_image() ) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
			</a>
		<?php } // End header image check.
	}
endif;

if ( ! function_exists( 'wireframe_theme_custom_header_css' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 * @see    wireframe_theme_custom_header().
	 */
	function wireframe_theme_custom_header_css() {

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text.
		 * Default: HEADER_TEXTCOLOR.
		 */
		if ( HEADER_TEXTCOLOR === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) : ?>
				.site-title,.site-description {position: absolute;clip: rect(1px, 1px, 1px, 1px);}
			<?php
			// If the user has set a custom color for the text use that.
			else : ?>
				.site-title a,.site-description {color: #<?php echo esc_attr( $header_text_color ); ?>;}
			<?php endif; ?>
		</style>
		<?php
	}
endif;
