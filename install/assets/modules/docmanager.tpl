// <?php 
/**
 * Doc Manager
 * 
 * Quickly perform bulk updates to the Documents in your site including templates, publishing details, and permissions
 * 
 * @category	module
 * @version 	1.1
 * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal	@properties
 * @internal	@guid 	
 * @internal	@shareparams 1
 * @internal	@dependencies requires files located at /assets/modules/resmanager/
 * @internal	@modx_category Manager and Admin
 * @internal    @installset base, sample
 */

include_once(MODX_BASE_PATH.'assets/modules/resmanager/classes/resmanager.class.php');
include_once(MODX_BASE_PATH.'assets/modules/resmanager/classes/rm_frontend.class.php');
include_once(MODX_BASE_PATH.'assets/modules/resmanager/classes/rm_backend.class.php');

$rm = new ResManager($modx);
$rmf = new ResManagerFrontend($rm, $modx);
$rmb = new ResManagerBackend($rm, $modx);

$rm->ph = $rm->getLang();
$rm->ph['theme'] = $rm->getTheme();
$rm->ph['ajax.endpoint'] = MODX_SITE_URL.'assets/modules/resmanager/tv.ajax.php';
$rm->ph['datepicker.year_range'] = $modx->config['datepicker_year_range'];
$rm->ph['date.format'] = $modx->config['date_format'];
$rm->ph['time.format'] = $modx->config['time_format'];

if (isset($_POST['tabAction'])) {
    $rmb->handlePostback();
} else {
    $rmf->getViews();
    echo $rm->parseTemplate('main.tpl', $rm->ph);
}