<?php
/**
 * Archive template file for themes built with Wireframe Suite for WordPress.
 *
 * The archive template is used when visitors request posts by category,
 * author, or date. Note: this template will be overridden if more specific
 * templates are present like category.php, author.php, and date.php.
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
 * @see       https://codex.wordpress.org/Template_Hierarchy
 * @see       https://developer.wordpress.org/themes/basics/template-files
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

get_header(); ?>

	<div id="primary" class="ontent-area">

		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					wireframe_theme_template_part( WIREFRAME_THEME_TPL, false, true );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

				<?php else : ?>

					<?php get_template_part( WIREFRAME_THEME_TPL . 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
