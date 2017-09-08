<?php
/**
 * The main `wireframe.php` file for bootstrapping Wireframe Theme. Don't let any
 * of this scare you. Wireframe is pretty smart and does most of the heavy lifting
 * for you. To get up-and-running quickly, you just need to modify config files.
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
 *
 * Table of Contents:
 *
 *    § 01. Namespaces
 *    § 02. Access
 *    § 03. Constants
 *    § 04. Functions
 *    § 05. Objects
 *    § 06. Container
 *    § 07. Configs
 *    § 08. Services
 *    § 09. Wireframe
 *    § 10. Housekeeping
 *    § 11. Hooks
 *
 * (New sections are separated by lines.)
 */

/**
 * § 01. Namespaces.
 * =============================================================================
 *
 * @since 5.3.0 PHP
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * § 02. Access.
 * =============================================================================
 *
 * No direct access to this file.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * § 03. Constants.
 * =============================================================================
 *
 * Loads config constants available to your theme.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
require_once get_template_directory() . '/wireframe_cfg/cfg-constants.php';

/**
 * § 04. Functions.
 * =============================================================================
 *
 * Loads helper functions and callbacks. These functions should load before your
 * classes, so they become available to your objects. Once you get the hang of
 * Wireframe Theme, these files can probably be merged to save on file count.
 * We use locate_template() function so child themes can overload.
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 */
locate_template( WIREFRAME_THEME_FUNCTIONS . 'helpers.php', true, true );
locate_template( WIREFRAME_THEME_FUNCTIONS . 'template-tags.php', true, true );
locate_template( WIREFRAME_THEME_FUNCTIONS . 'admin.php', true, true );
locate_template( WIREFRAME_THEME_FUNCTIONS . 'custom-header.php', true, true );
locate_template( WIREFRAME_THEME_FUNCTIONS . 'jetpack.php', true, true );
locate_template( WIREFRAME_THEME_FUNCTIONS . 'extras.php', true, true );

/**
 * § 05. Objects.
 * =============================================================================
 *
 * Option #1: Use `require_once()` to load your class dependencies 1-by-1.
 *            This is the default option because some Developers don't use Composer.
 *
 * Option #2: Autoload class dependencies via Composer's `composer.json` file.
 *            If you add new class files, you must re-compile `composer.json`.
 *            This is the preferred option for loading your objects.
 *
 * Autoload Example:
 *
 *            require_once WIREFRAME_THEME_DEV . 'vendor/autoload.php';
 *
 * PRO-TIP: To re-compile the autoloader in CLI, replace all the require_once()
 * lines below with the `Autoload Example` above, `cd` to the directory where the
 * `composer.json` file is located, then execute: composer dump-autoload -o
 *
 * @since 0.1.0 Wireframe
 * @since 0.1.0 Wireframe_Theme
 * @since 1.1.2 Composer
 * @see   composer.json
 * @see   https://getcomposer.org
 *
 * @internal CLI: composer update
 * @internal CLI: composer dump-autoload -o
 * @internal WPCS expects a lowercase filename (PSR-2, PSR-4 invalid).
 */

// Core objects.
require_once WIREFRAME_THEME_CORE . 'module-abstract.php';
require_once WIREFRAME_THEME_CORE . 'container-interface.php';
require_once WIREFRAME_THEME_CORE . 'container.php';
require_once WIREFRAME_THEME_CORE . 'enqueue-interface.php';
require_once WIREFRAME_THEME_CORE . 'enqueue.php';
require_once WIREFRAME_THEME_CORE . 'language-interface.php';
require_once WIREFRAME_THEME_CORE . 'language.php';
require_once WIREFRAME_THEME_CORE . 'theme-interface.php';
require_once WIREFRAME_THEME_CORE . 'theme.php';

// Module objects.
require_once WIREFRAME_THEME_MODULE . 'admin/module-admin-interface.php';
require_once WIREFRAME_THEME_MODULE . 'admin/module-admin.php';
require_once WIREFRAME_THEME_MODULE . 'customizer/module-customizer-interface.php';
require_once WIREFRAME_THEME_MODULE . 'customizer/module-customizer.php';
require_once WIREFRAME_THEME_MODULE . 'editor/module-editor-interface.php';
require_once WIREFRAME_THEME_MODULE . 'editor/module-editor.php';
require_once WIREFRAME_THEME_MODULE . 'features/module-features-interface.php';
require_once WIREFRAME_THEME_MODULE . 'features/module-features.php';
require_once WIREFRAME_THEME_MODULE . 'navigation/module-navigation-interface.php';
require_once WIREFRAME_THEME_MODULE . 'navigation/module-navigation.php';
require_once WIREFRAME_THEME_MODULE . 'notices/module-notices-interface.php';
require_once WIREFRAME_THEME_MODULE . 'notices/module-notices.php';
require_once WIREFRAME_THEME_MODULE . 'ui/module-ui-interface.php';
require_once WIREFRAME_THEME_MODULE . 'ui/module-ui.php';
require_once WIREFRAME_THEME_MODULE . 'widgets/module-widgets-interface.php';
require_once WIREFRAME_THEME_MODULE . 'widgets/module-widgets.php';

/**
 * Check if the `Core_Theme` class exists then configure defaults.
 *
 * @since 0.1.0 Wireframe_Theme
 */
if ( class_exists( 'MixaTheme\Wireframe\Theme\Core_Theme' ) ) :
	/**
	 * § 06. Container.
	 * =========================================================================
	 *
	 * Wireframe Theme needs to wire objects to the Core_Container $_storage array.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 * @see   object   Core_Container
	 * @var   callable $wireframe_theme_container
	 */
	$wireframe_theme_container = new Core_Container();

	/**
	 * § 07. Configs.
	 * =========================================================================
	 *
	 * Option #1: Load config data for passing array args into theme objects.
	 *
	 * Option #2: You can set args/property data for objects inside a Services closure
	 *            (see `Services` section below). If you wish to set your config
	 *            data inside closures, then you don't need to require files.
	 *            We also use locate_template() so child themes can overload.
	 *
	 * Data files are located in: `wireframe_cfg/`
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 */
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-language.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-notices.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-ui.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-navigation.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-widgets.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-features.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-customizer.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-editor.php', true, true );
	locate_template( trailingslashit( 'wireframe_cfg' ) . 'cfg-admin.php', true, true );

	/**
	 * § 08. Services: Language.
	 * =========================================================================
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Core_Language object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_language()
	 * @return object Core_Language( @param array Config args. )
	 */
	$wireframe_theme_container->language = function () {
		return new Core_Language( wireframe_theme_cfg_language() );
	};

	/**
	 * § 08. Services: Notices.
	 * =========================================================================
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_Notices object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_notices()
	 * @return object Module_Notices( @param array Config args. )
	 */
	$wireframe_theme_container->notices = function () {
		return new Module_Notices( wireframe_theme_cfg_notices() );
	};

	/**
	 * § 08. Services: UI.
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_UI object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_ui()
	 * @return object Module_UI( @param array Config args. )
	 */
	$wireframe_theme_container->ui = function () {
		return new Module_UI( wireframe_theme_cfg_ui() );
	};

	/**
	 * § 08. Services: Navigation.
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_Navigation object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_navigation()
	 * @return object Module_Navigation( @param array Config args. )
	 */
	$wireframe_theme_container->navigation = function () {
		return new Module_Navigation( wireframe_theme_cfg_navigation() );
	};

	/**
	 * § 08. Services: Widgets.
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_Widgets object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_widgets()
	 * @return object Module_Widgets( @param array Config args. )
	 */
	$wireframe_theme_container->widgets = function () {
		return new Module_Widgets( wireframe_theme_cfg_widgets() );
	};

	/**
	 * § 08. Services: Features.
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_Features object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_features()
	 * @return object Module_Features( @param array Config args. )
	 */
	$wireframe_theme_container->features = function () {
		return new Module_Features( wireframe_theme_cfg_features() );
	};

	/**
	 * § 08. Services: Customizer.
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_Customizer object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_customizer()
	 * @return object Module_Customizer( @param array Config args. )
	 */
	$wireframe_theme_container->customizer = function () {
		return new Module_Customizer( wireframe_theme_cfg_customizer() );
	};

	/**
	 * § 08. Services: Editor.
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_Editor object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_editor()
	 * @return object Module_Editor( @param array Config args. )
	 */
	$wireframe_theme_container->editor = function () {
		return new Module_Editor( wireframe_theme_cfg_editor() );
	};

	/**
	 * § 08. Services: Admin.
	 *
	 * This closure registers a service with the Core_Container $_storage array,
	 * and instantiates a new Module_Admin object with config data passed-in.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @see    wireframe_theme_cfg_admin()
	 * @return object Module_Admin( @param array Config args. )
	 */
	$wireframe_theme_container->admin = function () {
		return new Module_Admin( wireframe_theme_cfg_admin() );
	};

	/**
	 * § 09. Wireframe is alive!
	 * =========================================================================
	 *
	 * Instantiates the base `Core_Theme` object, then wires together the default
	 * services you added to the `$wireframe_theme_container` object (above).
	 *
	 * Option #1: You can re-declare which objects your theme wires via the
	 *            _construct() method in the `Core_Theme` class. Then, DI only
	 *            the objects you need. We started you off with common objects.
	 *
	 * Option #2: You can entirely swap-out the `Core_Theme` class with your
	 *            own custom class, or make the `Core_Theme` class abstract,
	 *            then extend it.
	 *
	 * @since  0.1.0 Wireframe
	 * @since  0.1.0 Wireframe_Theme
	 * @var    object $wireframe_theme
	 * @return object Core_Theme(
	 *         @param object Core_Language     DI core class for wiring i18n & l10n translation.
	 *         @param object Module_Notices    DI module class for wiring notifications.
	 *         @param object Module_UI         DI module class for wiring front-end presentation methods.
	 *         @param object Module_Navigation DI module class for wiring walker nav menus.
	 *         @param object Module_Widgets    DI module class for wiring sidebars & widgets.
	 *         @param object Module_Features   DI module class for wiring theme features.
	 *         @param object Module_Customizer DI module class for wiring live preview modifications.
	 *         @param object Module_Editor     DI module class for wiring TinyMCE WYSIWYG text editor.
	 *         @param object Module_Admin      DI module class for registering Admin menu pages & sub pages.
	 * )
	 */
	$wireframe_theme = new Core_Theme(
		$wireframe_theme_container->language,
		$wireframe_theme_container->notices,
		$wireframe_theme_container->ui,
		$wireframe_theme_container->navigation,
		$wireframe_theme_container->widgets,
		$wireframe_theme_container->features,
		$wireframe_theme_container->customizer,
		$wireframe_theme_container->editor,
		$wireframe_theme_container->admin
	);

	/**
	 * § 10. Housekeeping.
	 * =========================================================================
	 *
	 * Check if Wireframe Theme is properly initialized. You can perform any
	 * clean-up tasks here, or simply output a warning if `$wireframe_theme`
	 * fails. Your template files now have access to objects beyond this point.
	 *
	 * How to access your service objects:
	 *
	 * 		$wireframe_theme
	 * 		$wireframe_theme->language()
	 * 		$wireframe_theme->notices()
	 * 		$wireframe_theme->ui()
	 * 		$wireframe_theme->navigation()
	 * 		$wireframe_theme->widgets()
	 * 		$wireframe_theme->features()
	 * 		$wireframe_theme->customizer()
	 * 		$wireframe_theme->editor()
	 * 		$wireframe_theme->admin()
	 *
	 * Note: Objects not available in `header.php` or `footer.php` template files.
	 *
	 * @since 0.1.0 Wireframe
	 * @since 0.1.0 Wireframe_Theme
	 */
	if ( ! isset( $wireframe_theme ) ) {

		// Init failed. Stop processing. Hook a failure notice.
		add_action( 'admin_notices', array( $wireframe_theme_container->notices, 'error_init' ), 10, 0 );

	} else {

		/**
		 * § 11. Hooks.
		 * =====================================================================
		 *
		 * Init success! Continue processing. Run any hooks you need.
		 *
		 * Note: Many objects are not required to be wired (hooked) when instantiated.
		 * In your config data file(s), you can set the `$wired` value to true or false.
		 * If false, you can de-couple any hooks and declare them here (below).
		 * If $wired = true, then those objects will fire hooks onload.
		 *
		 * Data files are located in: `wireframe_dev/wireframe/config/`
		 *
		 * @since 0.1.0 Wireframe
		 * @since 0.1.0 Wireframe_Theme
		 * @see   object $wireframe_theme Instance of Core_Theme.
		 */
		add_action( 'after_switch_theme', array( $wireframe_theme_container->notices, 'warn_activated' ), 10, 0 );
	}

endif; // Thanks for using MixaTheme products!
