<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Users::getUsersDataJson');
// $routes->get('/users/show-user', 'Users::getUsersDataJson');
// $routes->get('/users/show-json', 'Users::showSimpleJson');
// $routes->get('/users/json', 'Users::showSimpleJson');
// $routes->get('/users/data-users', 'Users::getUsersDataJson');

$routes->get('users', 'Users::index'); // Route untuk halaman index users
$routes->get('users/simple-json', 'Users::showSimpleJson'); // Route untuk menampilkan JSON sederhana
$routes->get('users/data', 'Users::getUsersDataJson'); // Route untuk mendapatkan data user dalam format JSON
$routes->post('users/store', 'Users::storeData'); // Route untuk menyimpan data users
$routes->post('users/update/(:num)', 'Users::update/$1'); // Route untuk mengupdate data users berdasarkan id
$routes->delete('users/delete/(:num)', 'Users::delete/$1'); // Route untuk menghapus data users berdasarkan id


$routes->get('detail-transaksi', 'DetailTransaksi::index'); // Route untuk menampilkan halaman index
$routes->get('detail-transaksi/simple-json', 'DetailTransaksi::showSimpleJson'); // Route untuk menampilkan data array dalam format JSON
$routes->get('detail-transaksi/data', 'DetailTransaksi::getDetailTransaksi'); // Route untuk mendapatkan detail transaksi dalam format JSON
$routes->post('detail-transaksi/store', 'DetailTransaksi::storeData'); // Route untuk menyimpan data detail transaksi
$routes->post('detail-transaksi/update/(:num)', 'DetailTransaksi::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('detail-transaksi/delete/(:num)', 'DetailTransaksi::delete/$1'); // Route untuk menghapus data berdasarkan id
