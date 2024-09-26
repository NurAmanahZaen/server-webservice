<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk Users
$routes->get('users', 'Users::index'); // Route untuk halaman index users
$routes->get('users/simple-json', 'Users::showSimpleJson'); // Route untuk menampilkan JSON sederhana
$routes->get('users/data', 'Users::getUsersDataJson'); // Route untuk mendapatkan data user dalam format JSON
$routes->post('users/store', 'Users::storeData'); // Route untuk menyimpan data users
$routes->post('users/update/(:num)', 'Users::update/$1'); // Route untuk mengupdate data users berdasarkan id
$routes->delete('users/delete/(:num)', 'Users::delete/$1'); // Route untuk menghapus data users berdasarkan id

// Rute untuk DetailTransaksi
$routes->get('detail-transaksi', 'DetailTransaksi::index'); // Route untuk menampilkan halaman index
$routes->get('detail-transaksi/simple-json', 'DetailTransaksi::showSimpleJson'); // Route untuk menampilkan data array dalam format JSON
$routes->get('detail-transaksi/data', 'DetailTransaksi::getDetailTransaksi'); // Route untuk mendapatkan detail transaksi dalam format JSON
$routes->post('detail-transaksi/store', 'DetailTransaksi::storeData'); // Route untuk menyimpan data detail transaksi
$routes->post('detail-transaksi/update/(:num)', 'DetailTransaksi::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('detail-transaksi/delete/(:num)', 'DetailTransaksi::delete/$1'); // Route untuk menghapus data berdasarkan id

// Rute untuk Home
$routes->get('/', 'Home::index');

// Rute untuk Pelanggan
$routes->get('pelanggan', 'Pelanggan::index'); // Route untuk menampilkan halaman index
$routes->get('/pelanggan/json', 'Pelanggan::showSimpleJson'); // Route untuk menampilkan JSON sederhana dari Pelanggan
$routes->get('pelanggan/data', 'Pelanggan::getPelanggan'); // Route untuk mendapatkan detail transaksi dalam format JSON
$routes->post('pelanggan/store', 'Pelanggan::storeData'); // Route untuk menyimpan data detail transaksi
$routes->get('/pelanggan/data-pelanggan', 'Pelanggan::getPelangganDataJson'); // Route untuk mendapatkan data Pelanggan dalam format JSON

// Rute untuk Barang
$routes->get('/barang/json', 'Barang::showSimpleJson'); // Route untuk menampilkan JSON sederhana dari Barang
$routes->get('/barang/data-pelanggan', 'Pelanggan::getPelangganDataJson'); // Route untuk mendapatkan data Pelanggan dalam format JSON (duplikasi nama fungsi mungkin perlu diperbaiki)

// Rute untuk transaksi
$routes->get('transaksi', 'Transaksi::index'); // Route untuk menampilkan halaman index
$routes->get('transaksi/simple-json', 'Transaksi::showSimpleJson'); // Route untuk menampilkan data array dalam format JSON
$routes->get('transaksi/data', 'Transaksi::getTransaksi'); // Route untuk mendapatkan detail transaksi dalam format JSON
$routes->post('transaksi/store', 'Transaksi::storeData'); // Route untuk menyimpan data detail transaksi
$routes->post('transaksi/update/(:num)', 'Transaksi::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('transaksi/delete/(:num)', 'Transaksi::delete/$1'); // Route untuk menghapus data berdasarkan id