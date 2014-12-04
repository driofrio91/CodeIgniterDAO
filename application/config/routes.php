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
 
$route['default_controller'] = "welcome";
$route['404_override'] = 'errors/page_missing'; 
///////////////
//$route['users/(:any)'] = 'users/view/$1';
//$route['users'] = 'users';
//$route['(:any)'] = 'pages/view/$1';
//$route['default_controller'] = 'pages/view'; 

//$route['users/(:any)'] = 'users/view/$1';
//$route['users'] = 'users';
//$route['(:any)'] = 'pages/view/$1';
$route['users/read/(:any)'] = 'Users/read/$1';
$route['users/getAll'] = 'Users/getAll';
$route['users/create/(:any)'] = 'Users/create/$1/$2/$3/$4/$5';
$route['listtask/create/(:any)'] = 'ListTask/create/$1/$2/$3/$4/$5/$6/$7';
$route['listtask/update/(:any)'] = 'ListTask/update/$1';
$route['listtask/updatetasks/(:any)'] = 'ListTask/updateTasks/$1';
$route['listtask/updatelisttaskgroup/(:any)'] = 'ListTask/updateListTaskGroup/$1/$2';
$route['task/update/(:any)'] = 'Task/update/$1/$2/$3';
$route['group/share/(:any)'] = 'Group/shareList/$1/$2/$3';
$route['group/create/(:any)'] = 'Group/create/$1';
$route['group/insertusergroup/(:any)'] = 'Group/insertUserGroup/$1';

$route['default_controller'] = 'pages/view';
/* End of file routes.php */
/* Location: ./application/config/routes.php */