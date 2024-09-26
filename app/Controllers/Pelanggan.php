<?php

namespace App\Controllers;

use App\Models\PelangganModel;
class Pelanggan extends BaseController
{
    public function index()
    {
    }
    
    public function showSimpleJson()
    {
        $data = [
            'id' => 01,
            'nama' => 'Nurma',
            'alamat' => 'Pemalang',
            'no_hp' => '082362483486',
            'username' => 'akunurma',
            'password' => 123456
        ];

        return $this->response->setJSON($data);
    }

    // Method untuk menampilkan data detail transaksi dalam bentuk JSON
    public function getPelanggan() // Updated method name to camel case
    {
        // Memanggil model PelangganModel
        $pelangganModel = new PelangganModel(); // Use consistent variable name

        // Mengambil data dari tabel transaksi
        $pelanggan = $pelangganModel->getPelanggan(); // Ensure method name is correct

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($pelanggan);
    }
    
    public function storeData()
    {
        $pelangganModel = new PelangganModel();

        $data = [
            'nama' => $this->request->getGet('nama'),
            'alamat' => $this->request->getGet('alamat'),
            'no_hp' => $this->request->getGet('no_hp'),
            'username' => $this->request->getGet('username'),
            'password' => $this->request->getGet('password'),

        ];
    }

}