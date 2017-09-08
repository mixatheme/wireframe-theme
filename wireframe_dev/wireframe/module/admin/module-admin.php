<?php
/**
 * Module_Admin is a Wireframe module class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Admin' ) ) :
	/**
	 * Module_Admin is a module class for registering Admin menu pages & sub pages.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @see   https://codex.wordpress.org/Administration_Menus
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	class Module_Admin extends Core_Module_Abstract implements Module_Admin_Interface {
		/**
		 * Enqueue.
		 *
		 * @access private
		 * @since  0.1.0 Wireframe
		 * @since  0.1.0 Wireframe_Theme
		 * @var    object $_enqueue
		 */
		private $_enqueue;

		/**
		 * Theme Page.
		 *
		 * @access private
		 * @since  0.1.0 Wireframe
		 * @since  0.1.0 Wireframe_Theme
		 * @var    array $_theme_page
		 */
		private $_theme_page;

		/**
		 * Menu Pages.
		 *
		 * @access private
		 * @since  0.1.0 Wireframe
		 * @since  0.1.0 Wireframe_Theme
		 * @var    array $_menu_pages
		 */
		private $_menu_pages;

		/**
		 * Submenu Pages.
		 *
		 * @access private
		 * @since  0.1.0 Wireframe
		 * @since  0.1.0 Wireframe_Theme
		 * @var    array $_submenu_pages
		 */
		private $_submenu_pages;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 * @param array $config Required array of config variables.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_enqueue       = $config['enqueue'];
			$this->_theme_page    = $config['theme_page'];
			$this->_menu_pages    = $config['menu_pages'];
			$this->_submenu_pages = $config['submenu_pages'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Enqueue CSS Styles.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 */
		public function styles() {
			if ( null !== $this->_enqueue->styles() ) {
				$this->_enqueue->styles();
			}
		}

		/**
		 * Enqueue JS Scripts.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 */
		public function scripts() {
			if ( null !== $this->_enqueue->scripts() ) {
				$this->_enqueue->scripts();
			}
		}

		/**
		 * Enqueue JS Media Modal.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 */
		public function mediamodal() {
			if ( null !== $this->_enqueue->mediamodal() ) {
				$this->_enqueue->mediamodal();
			}
		}

		/**
		 * Add a theme page.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 * @see   https://codex.wordpress.org/Function_Reference/add_theme_page
		 */
		public function theme_page() {
			if ( isset( $this->_theme_page ) ) {
				foreach ( $this->_theme_page as $key => $value ) {
					add_theme_page(
						$value['page_title'],
						$value['menu_title'],
						$value['capability'],
						$value['menu_slug'],
						$value['function']
					);
				}
			}
		}

		/**
		 * Add a top-level menu page.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 * @see   https://developer.wordpress.org/reference/functions/add_menu_page/
		 */
		public function menu_pages() {
			if ( isset( $this->_menu_pages ) ) {
				foreach ( $this->_menu_pages as $key => $value ) {
					add_menu_page(
						$value['page_title'],
						$value['menu_title'],
						$value['capability'],
						$value['menu_slug'],
						$value['function'],
						$value['icon_url'],
						$value['position']
					);
				}
			}
		}

		/**
		 * Add a submenu page.
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 * @see   https://developer.wordpress.org/reference/functions/add_submenu_page/
		 */
		public function submenu_pages() {
			if ( isset( $this->_submenu_pages ) ) {
				foreach ( $this->_submenu_pages as $key => $value ) {
					add_submenu_page(
						$value['parent_slug'],
						$value['page_title'],
						$value['menu_title'],
						$value['capability'],
						$value['menu_slug'],
						$value['function']
					);
				}
			}
		}

	} // Module_Admin.

endif; // Thanks for using MixaTheme products!
