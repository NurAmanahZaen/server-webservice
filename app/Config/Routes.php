<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pelanggan/json', 'Pelanggan::showSimpleJson');
$routes->get('/pelanggan/data-pelanggan', 'Pelanggan::getPelangganDataJson');
$routes->get('/barang/json', 'Barang::showSimpleJson');
$routes->get('/barang/data-barang', 'Barang::getBarangDataJson');
