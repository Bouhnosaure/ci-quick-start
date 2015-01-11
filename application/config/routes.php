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
$route['404_override'] = '';

$route['login'] = "user/auth/login";
$route['user'] = "user/auth/index";
$route['admin'] = "user/auth/admin";
$route['logout'] = "user/auth/logout";
$route['change-password'] = "user/auth/change_password";
$route['forgot-password'] = "user/auth/forgot_password";
$route['reset-password/(:any)'] = "user/auth/reset_password/$1";
$route['activate/(:any)/(:any)'] = "user/auth/activate/$1/$2";
$route['deactivate/(:any)'] = "user/auth/deactivate/$1";
$route['create-user'] = "user/auth/create_user";
$route['register'] = "user/auth/register";
$route['register/social'] = "user/auth/social_register";
$route['edit-user/(:num)'] = "user/auth/edit_user/$1";
$route['create-group'] = "user/auth/create_group";
$route['edit-group/(:num)'] = "user/auth/edit_group/$1";

$route['login/social/(:any)'] = "user/social_auth/login/$1";
$route['social/unlink/(:num)'] = "user/social_auth/unlink_account/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */