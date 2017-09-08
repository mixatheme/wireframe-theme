<?php
/**
 * Module_Admin_Interface is a Wireframe module interface.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Plugin
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
 * @since 5.3.0 PHP
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Admin_Interface' ) ) :
	/**
	 * Module_Admin_Interface contract for loading back-end menu pages.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	interface Module_Admin_Interface {
		/**
		 * Add a top-level menu page.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 */
		public function menu_pages();

		/**
		 * Add a submenu page.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 */
		public function submenu_pages();

	} // Module_Admin_Interface.

endif; // Thanks for using MixaTheme products!
