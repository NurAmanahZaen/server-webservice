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

    public function getPelangganDataJson()
    {
        $pelangganModel = new PelangganModel();

        $pelanggans = $pelangganModel->getPelanggan();

        return $this->response->setJSON($pelanggans);
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