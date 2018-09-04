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

$route['default_controller'] = "Login";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['employees'] = 'employees';
$route['employees/new'] = 'employees/new'; 
$route['employees/register'] = 'employees/register'; 
$route['employees/edit/(:any)'] = 'employees/edit/$1';
$route['employees/update/(:any)'] = 'employees/update/$1';
$route['employees/delete/(:any)'] = 'employees/delete/$1';

$route['students'] = "students";
$route['students/new'] = 'students/new';
$route['students/add'] = 'students/add'; 
$route['students/edit/(:any)'] = 'students/edit/$1';
$route['students/update/(:any)'] = 'students/update/$1'; 
$route['students/delete/(:any)'] = 'students/delete_student/$1';

$route['equipment'] = "equipment";
$route['equipment/new'] = 'equipment/new'; 
$route['equipment/add'] = 'equipment/add'; 
$route['equipment/edit/(:any)'] = 'equipment/edit/$1'; 
$route['equipment/update/(:any)'] = 'equipment/update/$1'; 
$route['equipment/delete/(:any)'] = 'equipment/delete/$1';

$route['reservations'] = "reservations";
$route['reservations/new'] = 'reservations/new'; 
$route['reservations/add'] = 'reservations/add'; 
$route['reservations/edit/(:any)'] = 'reservations/edit/$1'; 
$route['reservations/update/(:any)'] = 'reservations/update/$1'; 
$route['reservations/delete/(:any)'] = 'reservations/delete_reservation/$1';