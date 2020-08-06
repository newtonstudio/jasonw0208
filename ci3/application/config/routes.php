<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['rumah'] = 'home/homepage';

//album/id/slug
$route['album/(:num)/(:any)'] = 'home/detailpage/$1/$2';
//album/id/slug/page
$route['album/(:num)/(:any)/(:num)'] = 'home/detailpage/$1/$2/$3';


$route['api/flogin'] = 'api_login_manage/flogin';
$route['api/glogin'] = 'api_login_manage/glogin';

$route['submit'] = "home/detailpage_submit";
$route['thanks'] = "home/thanks";

$route['default_controller'] = 'home/homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
