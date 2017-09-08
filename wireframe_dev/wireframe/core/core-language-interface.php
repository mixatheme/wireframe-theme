<?php
/**
 * Core_Language_Interface is a Wireframe core interface..
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
 * @since 0.1.0 Wireframe Child
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 * @since 0.1.0 Wireframe Child
 * @since 0.1.0 Wireframe Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 * @since 0.1.0 Wireframe Child
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Language_Interface' ) ) :
	/**
	 * Core_Language_Interface is a core theme contract for i18n & l10n translation.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @since 0.1.0 Wireframe Child
	 * @since 0.1.0 Wireframe Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 * @todo  There's zero reason for this to be a class.
	 */
	interface Core_Language_Interface {
		/**
		 * Loads the theme's textdomain.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 3.1.0 WordPress
		 * @since 0.1.0 Wireframe_Theme
		 * @since 0.1.0 Wireframe Child
		 * @since 0.1.0 Wireframe Plugin
		 */
		public function textdomain();

	} // Core_Language_Interface.

endif; // Thanks for using MixaTheme products!
