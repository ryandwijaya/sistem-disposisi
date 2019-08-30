<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'AuthController/index';
//login
$route['login'] = 'AuthController/index';


$route['dashboard'] = 'Welcome/index';

$route['surat/detail/(:any)'] = 'SMasukController/disposisi/$1';

$route['laporan'] = 'LaporanController/index';

//user
$route['jabatan'] = 'JabatanController/index';
$route['jabatan/post'] = 'JabatanController/create';
$route['jabatan/delete/(:any)'] = 'JabatanController/delete/$1';
$route['jabatan/edit/(:any)'] = 'JabatanController/edit/$1';

//user
$route['pegawai'] = 'PegawaiController/index';
$route['pegawai/post'] = 'PegawaiController/create';
$route['profil/(:any)'] = 'PegawaiController/profil/$1';
$route['pegawai/edit/(:any)'] = 'PegawaiController/edit/$1';
$route['pegawai/delete/(:any)'] = 'PegawaiController/hapus/$1';
$route['changePw/(:any)'] = 'PegawaiController/changePw/$1';

//surat_masuk
$route['surat_masuk'] = 'SMasukController/index';
$route['surat_masuk/disposisi/(:any)'] = 'SMasukController/lajur_disposisi/$1';
$route['disposisi_lanjutan/(:any)'] = 'SMasukController/disposisi_lanjutan/$1';
$route['disposisi_lanjutan_kasubag/(:any)'] = 'SMasukController/disposisi_lanjutan_kasubag/$1';
$route['surat/post'] = 'SMasukController/create';
$route['surat/delete/(:any)'] = 'SMasukController/delete/$1';
$route['create_lajur'] = 'SMasukController/create_lajur';


//auth
$route['auth/login'] = 'AuthController/login';
$route['auth/logout'] = 'AuthController/logout';




//user
$route['user/(:any)'] = 'PegawaiController/profil/$1';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
