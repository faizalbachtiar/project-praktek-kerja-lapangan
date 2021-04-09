<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ------------------------------- SUPERADMIN ------------------------------- //
$route['super/regadmin'] = 'superadmin/createadmin';
$route['pengguna'] = 'superadmin/pengguna';
$route['operator/(:any)'] = 'admin/view/$1';
$route['operator'] = 'superadmin/operator';
$route['super/permohonan'] = 'admin/permohonan';
$route['super/dashboard'] = 'superadmin/index';
$route['super'] = 'superadmin/login';
$route['puskesmas'] = 'superadmin/puskesmas';
$route['kecamatan'] = 'superadmin/kecamatan';

// ---------------------------------- ADMIN --------------------------------- //
$route['admin'] = 'admin/login';
$route['dashboard'] = 'admin/index';
$route['lupapassword'] = 'admin/forgotpass';
$route['changepass/(:any)'] = 'admin/changepass/$1';

// OPERATOR KESMAS
$route['kesmas/jadwal'] = 'admin/jadwal';
$route['cpermohonan'] = 'admin/createpermohonan';
$route['kesmas/permohonan'] = 'admin/permohonan';
$route['kesmas/logout'] = 'admin/logout';
$route['kesmas'] = 'admin/kesmas';
$route['laporan'] = 'admin/laporan';

// OPERATOR TIM VISITASI
$route['vistasi/download'] = 'admin/download_accessor';
$route['visitasi'] = 'admin/visitasi';

// routing for posts
$route['posts/index'] = 'posts/index';
$route['posts/update'] = 'posts/update';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

// ---------------------------------- HOTEL --------------------------------- //
$route['hotel/index'] = 'hotel/index';
$route['hotel/update'] = 'hotel/update';
$route['hotel/panduan'] = 'hotel/panduan';
$route['hotel/create'] = 'hotel/create';
$route['hotel/(:any)'] = 'hotel/view/$1';
$route['hotel'] = 'hotel/index';

// ----------------------------------- TPM ---------------------------------- //
$route['tpm/index'] = 'tpm/index';
$route['tpm/update'] = 'tpm/update';
$route['tpm/panduan'] = 'tpm/panduan';
$route['tpm/create'] = 'tpm/create';
$route['tpm/(:any)'] = 'tpm/view/$1';
$route['tpm'] = 'tpm/index';

// ----------------------------------- DAM ---------------------------------- //
$route['dam/index'] = 'dam/index';
$route['dam/update'] = 'dam/update';
$route['dam/panduan'] = 'dam/panduan';
$route['dam/create'] = 'dam/create';
$route['dam/(:any)'] = 'dam/view/$1';
$route['dam'] = 'dam/index';

// ------------------------=------ JASABOGA --------------------------------- //
$route['jasaboga/create'] = 'jasaboga/create';

// -------------------------------- PERMOHONAN ------------------------------ //
$route['permohonan/download'] = 'permohonan/download';
$route['permohonan/tpm'] = 'permohonan/tpm';
$route['permohonan/dam'] = 'permohonan/dam';
$route['permohonan/hotel'] = 'permohonan/hotel';

// Sertifikat

$route['sertifikat/(:any)'] = 'sertifikat/view/$1';
$route['csertifikat/(:any)'] = 'sertifikat/create/$1';
$route['asertifikat/(:any)'] = 'sertifikat/addview/$1';
$route['asertifikat'] = 'sertifikat/add';
$route['sertifikat'] = 'sertifikat/index';

// Penilaian Lapangan
$route['penilaian'] = 'penilaian/index';

// Jadwal visitasi
$route['ajadwal'] = 'jadwal/addjadwal';
$route['cjadwal'] = 'jadwal/createjadwal';
$route['jadwal/(:any)'] = 'jadwal/view/$1';
$route['jadwal'] = 'jadwal/index';

$route['calendar'] = 'jadwal/calendar';

// Hasil uji lab
$route['ujilab/(:any)'] = 'ujilab/view/$1';
$route['ujilab'] = 'ujilab/index';

// Permohonan
$route['permohonan/view/(:any)'] = 'permohonan/view/$1';
$route['permohonan'] = 'permohonan/index';

// Lupa Password
$route['pengguna/(:any)'] = 'users/view/$1';
$route['resetpassword'] = 'users/forgotpass';

// Main Page
$route['home'] = 'users/index';

$route['default_controller'] = 'users/index';
$route['(:any)'] = 'users/index/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
