<?php
/**
 * 404 template file for themes built with Wireframe Suite for WordPress.
 *
 * The 404 template is used when WordPress cannot find a post, page,
 * or other content that matches the visitor’s request.
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
 * @see       https://codex.wordpress.org/Creating_an_Error_404_Page
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

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">

			<header class="page-header">

				<h1 class="page-title text-center">
					<?php printf( esc_html__( '%1$s %2$s', 'wireframe-theme' ), '<em>Oops!</em>', 'That page can&rsquo;t be found.' ); ?>
				</h1>

			</header><!-- .page-header -->

			<div class="page-content">

				<p class="text-center">
					<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a new search?', 'wireframe-theme' ); ?>
				</p>

				<div class="row">
					<div class="text-center">
						<?php get_search_form(); ?>
					</div>
				</div><!-- .row -->

			</div><!-- .page-content -->

		</section><!-- .error-404 -->

	</main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();
