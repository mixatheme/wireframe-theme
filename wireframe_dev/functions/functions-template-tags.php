<?php
/**
 * Template Tags helper functions for Wireframe_Theme.
 *
 * Custom template tags for this theme. Eventually, some of the functionality here
 * could be replaced by core features.
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

if ( ! function_exists( 'wireframe_theme_template_part' ) ) :
	/**
	 * Wireframe Theme template part.
	 *
	 * Allows a little more flexibility for loading template files. You can use
	 * the standard `get_template_part()` or `locate_template()` also works well.
	 * We use `include( locate_template() )` which allows object vars (if needed).
	 *
	 * @since 0.1.0 Wireframe_Theme
	 * @param string $path Path to the template file.
	 * @param bool   $load If true the template file will be loaded if it is found.
	 * @param bool   $once Whether to require_once or require. Default true. Has no effect if $load is false.
	 */
	function wireframe_theme_template_part( $path, $load = false, $once = true ) {

		// Get the post type.
		$type = get_post_type();

		// Get the post format.
		$format = get_post_format();

		// Fallback template file.
		$fallback = 'content.php';

		// Switch post types. You can get creative here.
		switch ( $type ) {
			// Posts.
			case 'post' :
				if ( $format ) {
					$file = $path . 'content-' . $format . '.php';
				} else {
					$file = $path . 'content.php';
				}
				break;
			// Pages.
			case 'page' :
				$file = $path . 'content-page.php';
				break;
			// Search.
			case 'search' :
				$file = $path . 'content-search.php';
				break;
			default:
				$file = $path . '/' . $fallback;
				break;
		}

		// Check for template file.
		if ( file_exists( get_stylesheet_directory() . '/' . $file ) ) {
			include( locate_template( $file, $load, $once ) );
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_version' ) ) :
	/**
	 * Wireframe Theme Version.
	 *
	 * Prevents caching while debugging or in Customizer. Generates a random version number
	 * if WP_DEBUG is true or in Live Preview, else use the $version parameter.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @param  string $version The package version number.
	 * @return mixed  $version A randomly generated string or the $version arg.
	 */
	function wireframe_theme_version( $version = '' ) {

		// Characters for shuffling.
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$rand  = substr( str_shuffle( $chars ), 0, 1 ) . substr( md5( time() ), 1 );

		// Check if Debug is on in Live Preview.
		if ( WP_DEBUG && ! is_customize_preview() ) {
			return apply_filters( 'wireframe_theme_version', $rand );
		} elseif ( is_customize_preview() ) {
			return null;
		} else {
			return $version;
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_custom_logo' ) ) :
	/**
	 * Wireframe Theme Custom Logo.
	 *
	 * Renders a Custom Logo.
	 *
	 * @since 4.5.0 WordPress
	 * @since 0.1.0 Wireframe_Theme
	 * @see   https://codex.wordpress.org/Theme_Logo
	 */
	function wireframe_theme_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			?>
			<div id="site-logo">
				<?php the_custom_logo(); ?>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 */
	function wireframe_theme_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'wireframe-theme' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'wireframe-theme' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'wireframe_theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 */
	function wireframe_theme_entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'wireframe-theme' ) );
			if ( $categories_list && wireframe_theme_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wireframe-theme' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wireframe-theme' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wireframe-theme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wireframe-theme' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'wireframe-theme' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'wireframe_theme_categorized_blog' ) ) :
	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 * @return bool Returns true if more than 1 category, or false otherwise.
	 */
	function wireframe_theme_categorized_blog() {

		if ( false === ( $all_the_cool_cats = get_transient( 'wireframe_theme_categories' ) ) ) {

			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories(
				array(
					'fields'        => 'ids',
					'hide_empty'    => 1,
					'number'        => 2, // We only need to know if there is more than one category.
				)
			);

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			// Set transient.
			set_transient( 'wireframe_theme_categories', $all_the_cool_cats );
		}

		// Check if more than 1 category.
		if ( $all_the_cool_cats > 1 ) {

			// More than 1 category found.
			return true;

		} else {

			// This blog has only 1 category.
			return false;
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_category_transient_flusher' ) ) :
	/**
	 * Flush out the transients used in wireframe_theme_categorized_blog.
	 *
	 * @since  0.1.0 Wireframe_Theme
	 * @author Automattic
	 * @author MixaTheme
	 */
	function wireframe_theme_category_transient_flusher() {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Like, beat it. Dig?
		delete_transient( 'wireframe_theme_categories' );
	}
	add_action( 'edit_category', 'wireframe_theme_category_transient_flusher' );
	add_action( 'save_post', 'wireframe_theme_category_transient_flusher' );
endif;
