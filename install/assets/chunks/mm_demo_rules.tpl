/**
 * mm_demo_rules
 * 
 * Default ManagerManager rules. Should be modified for your own sites.
 * 
 * @category	chunk
 * @version 	1.1
 * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal 	@modx_category Demo Content
 * @internal    @overwrite false
 * @internal    @installset base, sample
 */

// Uncomment this line (remove the leading '// ') to hide longtitle if you do not use it.
// mm_hideFields('longtitle');

// Uncomment this if you use [*description*] in a description meta tag
// mm_changeFieldHelp('description', 'Description for search engines. Optional. Leave blank if unsure'); 

// Uncomment the following to hide some often unused fields from all users
// mm_hideFields('log');
// mm_hideFields('parent');
// mm_hideFields('link_attributes');
// mm_hideFields('which_editor');
// mm_hideFields('is_richtext');

// Examples of changing the help text. Uncomment to use these or write your own.
// mm_changeFieldHelp('pagetitle', 'Title of this page');
// mm_changeFieldHelp('menutitle', 'An optional title for this page to be used in menus. Usually shorter if used.');

// Uncomment the following to hide the fields from all but admins
// mm_hideFields('cacheable', '!1');
// mm_hideFields('clear_cache', '!1');
// mm_hideFields('is_folder', '!1');
// mm_hideFields('content_dispo', '!1');
// mm_hideFields('content_type', '!1');

// Always give a preview of Image TVs
mm_widget_showimagetvs();

