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

$route['click_income_alter'] = 'click_income/alter';
$route['click_income_alter_view'] = 'click_income/alter_view';
$route['click_income_view'] = 'click_income/view';
$route['click_income_update'] = 'click_income/update';
$route['click_income'] = 'click_income/index';

$route['all_view'] = 'all/view';
$route['all'] = 'all/index';

$route['login'] = 'login/index';

$route['click_alter'] = 'click_data/alter';
$route['click_view'] = 'click_data/view';
$route['click_update'] = 'click_data/update';
$route['click_data/(:any)'] = 'click_data/view/$1';
$route['click_data'] = 'click_data';
$route['default_controller'] = 'login';


/* End of file routes.php */
/* Location: ./application/config/routes.php */