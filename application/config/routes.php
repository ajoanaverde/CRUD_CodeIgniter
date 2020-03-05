<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['user/logout'] = 'user/logout';
$route['user/login'] = 'user/login';
$route['user/register'] = 'user/register';

$route['commande/delete/(:any)'] = 'commande/delete/$1';
$route['commande/update/(:any)'] = 'commande/update/$1';
$route['commande/create'] = 'commande/create';
$route['commande/show/(:any)'] = 'commande/show/$1';
$route['commande/index'] = 'commande/index';


$route['produit/delete/(:any)'] = 'produit/delete/$1';
$route['produit/update/(:any)'] = 'produit/update/$1';
$route['produit/create'] = 'produit/create';
$route['produit/show/(:any)'] = 'produit/show/$1';
$route['produit/index'] = 'produit/index';

$route['client/delete/(:any)'] = 'client/delete/$1';
$route['client/update/(:any)'] = 'client/update/$1';
$route['client/create'] = 'client/create';
$route['client/show/(:any)'] = 'client/show/$1';
$route['client/index'] = 'client/index';

$route['default_controller'] = 'welcome/load';
// $route['default_controller'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
