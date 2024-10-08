<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk Users
$routes->get('users', 'Users::index'); // Route untuk halaman index users
$routes->get('users/simple-json', 'Users::showSimpleJson'); // Route untuk menampilkan JSON sederhana
$routes->get('users/data', 'Users::getUsers'); // Route untuk mendapatkan data user dalam format JSON
$routes->post('users/store', 'Users::storeData'); // Route untuk menyimpan data users
$routes->post('users/update/(:num)', 'Users::update/$1'); // Route untuk mengupdate data users berdasarkan id
$routes->delete('users/delete/(:num)', 'Users::delete/$1'); // Route untuk menghapus data users berdasarkan id
$routes->get('/users/data-users', 'Users::getUsersDataJson'); // Route untuk mendapatkan data Users dalam format JSON


// Rute untuk DetailTransaksi
$routes->get('detailtransaksi', 'DetailTransaksi::index');
$routes->get('detailtransaksi/json', 'DetailTransaksi::showSimpleJson');
$routes->get('detailtransaksi/data', 'DetailTransaksi::GetDetailTransaksi');
$routes->post('detailtransaksi/store', 'DetailTransaksi::storeData');
$routes->post('detailtransaksi/data-detailtransaksi', 'detailtransaksi::getDetailTransaksiDataJson');
$routes->post('detailtransaksi/update/(:num)', 'DetailTransaksi::update/$1'); // Route untuk mengupdate data barang berdasarkan id
$routes->delete('detailtransaksi/delete/(:num)', 'DetailTransaksi::delete/$1'); // Route untuk menghapus data barang berdasarkan id
$routes->get('/detailtransaksi/data-datatransaksi', 'DetailTransaksi::getDetailTransaksiDataJson'); // Route untuk mendapatkan data Pelanggan dalam format JSON


// Rute untuk Home
$routes->get('/', 'Home::index');

// Rute untuk Pelanggan
$routes->get('pelanggan', 'Pelanggan::index'); // Route untuk menampilkan halaman index
$routes->get('/pelanggan/json', 'Pelanggan::showSimpleJson'); // Route untuk menampilkan JSON sederhana dari Pelanggan
$routes->get('pelanggan/data', 'Pelanggan::getPelanggan'); // Route untuk mendapatkan pelanggan dalam format JSON
$routes->post('pelanggan/store', 'Pelanggan::storeData'); // Route untuk menyimpan data pelanggan
$routes->get('/pelanggan/data-pelanggan', 'Pelanggan::getPelangganDataJson'); // Route untuk mendapatkan data Pelanggan dalam format JSON
$routes->post('pelanggan/update/(:num)', 'Pelanggan::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('pelanggan/delete/(:num)', 'Pelanggan::delete/$1');
$routes->post('pelanggan/update/(:num)', 'Transaksi::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->get('/pelanggan/data-pelanggan', 'Pelanggan::getPelangganDataJson'); // Route untuk mengit add gitdapatkan data Pelanggan dalam format JSON

// Rute untuk Barang
$routes->get('barang', 'Barang::index'); // Route untuk menampilkan halaman index
$routes->get('barang/json', 'Barang::showSimpleJson'); // Route untuk menampilkan data array dalam format JSON
$routes->get('barang/data', 'Barang::getBarang'); // Route untuk mendapatkan detail barang dalam format JSON
$routes->post('barang/store', 'Barang::storeData'); // Route untuk menyimpan data barang
$routes->get('barang/show', 'Barang::show');
$routes->post('barang/data-barang', 'Barang::getBarangDataJson');
$routes->post('barang/update/(:num)', 'Barang::update/$1'); // Route untuk mengupdate data barang berdasarkan id
$routes->delete('barang/delete/(:num)', 'Barang::delete/$1'); // Route untuk menghapus data barang berdasarkan id
$routes->get('/barang/data-barang', 'Barang::getBarangDataJson'); // Route untuk mendapatkan data Pelanggan dalam format JSON


// Rute untuk transaksi
$routes->get('transaksi', 'Transaksi::index'); // Route untuk menampilkan halaman index
$routes->get('transaksi/simple-json', 'Transaksi::showSimpleJson'); // Route untuk menampilkan data array dalam format JSON
$routes->get('transaksi/data', 'Transaksi::show'); // Route untuk mendapatkan detail transaksi dalam format JSON
$routes->get('transaksi/data-transaksi', 'Transaksi::data');
$routes->post('transaksi/store', 'Transaksi::create'); // Route untuk menyimpan data transaksi
$routes->post('transaksi/update/(:num)', 'Transaksi::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->get('transaksi/delete/(:num)', 'Transaksi::delete/$1'); // Route untuk menghapus transaksi berdasarkan id