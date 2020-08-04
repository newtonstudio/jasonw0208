<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['rumah'] = 'home/homepage';
$route['album/(:num)/(:any)'] = 'home/detailpage/$1/$2';

$route['default_controller'] = 'home/homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
