/**!
 * Customizer module script for Wireframe_Theme.
 *
 * Theme Customizer enhancements for a better user experience. Contains handlers
 * to make Theme Customizer preview reload changes asynchronously.
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme, Tada Burke
 * @version   0.1.0 Wireframe_Theme
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 * @see       https://github.com/mixatheme/wireframe_theme
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */
!function($){var n=wp.customize;n("logo_top",function(n){n.bind(function(n){$("#site-logo").css(n)})}),n("logo_left",function(n){n.bind(function(n){$("#site-logo").css(n)})}),n("logo_right",function(n){n.bind(function(n){$("#site-logo").css(n)})}),n("logo_bottom",function(n){n.bind(function(n){$("#site-logo").css(n)})}),n("blogname",function(n){n.bind(function(n){$(".site-title a").text(n)})}),n("blogdescription",function(n){n.bind(function(n){$(".site-description").text(n)})}),n("link_color",function(n){n.bind(function(n){$("a").css("color",n)})}),n("main_text_color",function(n){n.bind(function(n){$("body").css("color",n)})}),n("navbar_title",function(n){n.bind(function(n){!0===n?$(".navbar-brand").removeClass("hidden"):$(".navbar-brand").addClass("hidden")})}),n("header_textcolor",function(n){n.bind(function(n){"blank"===n?$(".site-title a, .site-description").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):($(".site-title a, .site-description").css({clip:"auto",position:"relative"}),$(".site-title a, .site-description").css({color:n}))})}),n("navbar_contrast",function(n){n.bind(function(n){"inverse"===n?$("#site-navigation").attr("class","main-navigation navbar-inverse"):"default"===n?$("#site-navigation").attr("class","main-navigation navbar-default"):"transparent"===n?$("#site-navigation").attr("class","main-navigation navbar-transparent"):$("#site-navigation").attr("class","main-navigation navbar-inverse")})})}(jQuery);