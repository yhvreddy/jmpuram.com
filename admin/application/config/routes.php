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
$route['default_controller'] 											= 	'Login'; //dashboard
$route['404_override'] 													= 	'';
$route['translate_uri_dashes'] 											= 	FALSE;
$route['logout']                                        =   'Login/logout';
$route['user/loginAccess']                              =   'Login/loginAccessAccount';
$route['user/registeraccount']                          =   'Login/registerAccount';
$route['user/saveregisteraccount']                      =   'Login/newRegisterAccount';

$route['user/forgetpassword']                           =   'Login/forgetpassword';
$route['user/saveforgetpassword']                       =   'Login/saveForgetPassword';
$route['user/changepassword/:num/change']               =   'Login/Changepassword';
$route['user/savenewchangepassword']                    =   'Login/savenewChangePassword';
$route['dashboard']                                     =   'Welcome/dashboard';

//gallery links
$route['dashboard/gallery/setup']                       =   'Gallery/setup';
$route['dashboard/gallery/savesetup']                   =   'Gallery/savesetup';
$route['dashboard/gallery/editsetup/:num']              =   'Gallery/editsetup';
$route['dashboard/gallery/newgallery']                  =   'Gallery/newgallery';
$route['dashboard/gallery/savegallery']                 =   'Gallery/savegallery';
$route['dashboard/gallery/gallerylist']                 =   'Gallery/gallerylist';
$route['dashboard/gallery/gallerydelete/:any']          =   'Gallery/gallerydelete';

//events link
$route['dashboard/events/addevents']                    =   'Events/addevents';
$route['dashboard/events/saveevents']                   =   'Events/saveeventdetails';
$route['dashboard/events/eventslist']                   =   'Events/eventslist';

//Citizens links
$route['dashboard/citizens/newcitizens']                =   'Citizens/newcitizens';
$route['dashboard/citizens/savecitizen']                =   'Citizens/savecitizens';
$route['dashboard/citizens/citizenslist']               =   'Citizens/citizenslist';
$route['dashboard/citizens/citizentoorg/:num']          =   'Citizens/citizentoorg';
$route['dashboard/citizens/citizentounorg/:num']        =   'Citizens/citizentounorg';