<?php

namespace App\Controllers;

use App\Models\BarangModel;
class Barang extends BaseController
{
    public function index()
    {
    }
    
    public function showSimpleJson()
    {
        $data = [
            'id' => 01,
            'image' => 'pict',
            'kd_barang' => 'B123',
            'nama' => 'nisa',
            'merek' => 'nixy',
            'harga' => '89000',
            'stok' => '15',
            'kd_user' => 123456
        ];

        return $this->response->setJSON($data);
    }

    public function getBarangDataJson()
    {
        $BarangModel = new BarangModel();

        $Barangs = $barangModel->getBarang();

        return $this->response->setJSON($barangs);
    }
    
    public function storeData()
    {
        $barangModel = new BarangModel();

        $data = [
            'id' => $this->request->getGet('id'),
            'image' => $this->request->getGet('image'),
            'kd_barang' => $this->request->getGet('kd_barang'),
            'nama' => $this->request->getGet('nama'),
            'merek' => $this->request->getGet('merek'),
            'harga' => $this->request->getGet('harga'),
            'stok' => $this->request->getGet('stok'),
            'kd_user' => $this->request->getGet('kd_user'),

        ];
    }

}