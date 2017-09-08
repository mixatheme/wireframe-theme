<?php
/**
 * Header template file for themes built with Wireframe Suite for WordPress.
 *
 * This is the template partial that displays all of the `head` section
 * and everything up until `div id="content"`
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

?><!DOCTYPE html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'wireframe-theme' ); ?></a>

		<header id="masthead" class="site-header" role="banner">

			<div class="site-branding">

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>


				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>

			</div><!-- .site-branding -->

			<?php wireframe_theme_custom_header(); ?><!-- wireframe_theme_custom_header -->

			<nav id="site-navigation" class="main-navigation" role="navigation">

				<?php do_action( 'wireframe_theme_navigation' ); ?><!-- wireframe_theme_navigation -->

			</nav><!-- #site-navigation -->

		</header><!-- #masthead -->

		<div id="content" class="site-content">
