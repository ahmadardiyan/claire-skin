<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Admin
$route['admin'] = 'admin/index';

// Produk
$route['produk'] = 'produk/index';
// $route['create'] = 'produk/create';

//Home
$route['default_controller'] = 'home/index';

// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
