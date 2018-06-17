<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'ecoder';

$route['profile'] = 'admin/profile';


$route['html_list'] = 'ecoder/html_list';
$route['html_list/(:num)'] = 'ecoder/html_list/$1';
$route['html_search'] = 'ecoder/html_search';
$route['statment_list'] = 'ecoder/statment_list';
$route['statment_list/(:num)'] = 'ecoder/statment_list/$1';

// Templates
$route['template'] = 'template';
$route['template/(:num)'] = 'template/index/$1';

// Statements
$route['statement'] = 'ecoder/statement';
$route['statement/(:num)'] = 'ecoder/statement/$1';

$route['getPartnerLogo'] = 'ecoder/getPartnerLogo';
$route['getPartnerLogo/(:num)'] = 'ecoder/getPartnerLogo/$1';

$route['create_html/(:any)'] = 'create/create_html';
$route['download_html/(:any)'] = 'create/download_html';
//$route['create_online_html'] = 'create/create_online_html';
$route['create_online_html/(:any)'] = 'create/create_online_html';
$route['create_online_html/(:any)/(:any)'] = 'create/create_online_html';
$route['create_online_file/(:any)'] = 'create/create_online_file';
$route['create_camp'] = 'ecoder/create_camp';

// statment
$route['create_statement'] = 'ecoder/create_statement';
$route['update_statement/(:num)'] = 'ecoder/update_statement/$1';
$route['view_statement/(:any)'] = 'create/view_statement';
$route['download_statement/(:any)'] = 'create/download_statement';
$route['create_online_statement/(:any)'] = 'create/create_online_statement';
$route['copy_statement/(:num)'] = 'ecoder/copy_statement/$1';
$route['deleteStatement/(:num)'] = 'ecoder/deleteStatement/$1';
$route['lockStatement/(:any)'] = 'ecoder/lockStatement';


$route['image_list'] = 'tools/image_list';
$route['upload_img'] = 'tools/upload_img';
$route['create_files'] = 'tools/create_files';
$route['create_files/(:num)'] = 'tools/create_files/$1';
$route['create_files/(:num)/(:num)'] = 'tools/create_files/$1/$1';


$route['copy_camp/(:num)'] = 'ecoder/copy_camp/$1';
$route['deleteCamp/(:num)'] = 'ecoder/deleteCamp/$1';
$route['lockCamp/(:any)'] = 'ecoder/lockCamp';

/* admin */
$route['addlogo'] = 'system/addlogo';
$route['addlogo/(:num)'] = 'system/addlogo/$1';

/* admin */

/* Emailer */
$route['addressBook'] = 'emailer/addressBook';
$route['emailTemplates'] = 'emailer/emailTemplates';
$route['sendMail'] = 'emailer/sendMail';
$route['sendMail/(:any)'] = 'emailer/sendMail';
$route['report'] = 'emailer/report';
$route['report/(:any)'] = 'emailer/report';

$route['test'] = 'emailer/test';

$route['reportData'] = 'create/reportData';

/* Emailer */

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */