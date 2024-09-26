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
    // Function untuk menyimpan data dengan output JSON
    public function storeData()
{
    $pelangganModel = new PelangganModel();

    // Mendapatkan data input dari request
    $data = [
        'id'        => $this->request->getPost('id'),
        'nama'      => $this->request->getPost('nama'),
        'alamat'    => $this->request->getPost('alamat'),
        'no_hp'     => $this->request->getPost('no_hp'),
        'username'  => $this->request->getPost('username'),
        'password'  => $this->request->getPost('password'),
    ];

    if ($pelangganModel->savePelanggan($data)) {
        return $this->response->setJSON(['message' => 'Data berhasil disimpan', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal menyimpan data', 'status' => 0]);
    }
}
public function update($id)
{
    $pelangganModel = new PelangganModel();

    // Mendapatkan data input dari request
    $data = [
        'id'        => $this->request->getPost('id'),
        'nama'      => $this->request->getPost('nama'),
        'alamat'    => $this->request->getPost('alamat'),
        'no_hp'     => $this->request->getPost('no_hp'),
        'username'  => $this->request->getPost('username'),
        'password'  => $this->request->getPost('password'),
    ];

    if ($pelangganModel->savePelanggan($data)) {
        return $this->response->setJSON(['message' => 'Data berhasil diperbarui', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal memperbarui data', 'status' => 0]);
    }
}

public function delete($id)
{
    $pelangganModel = new PelangganModel();

    if ($pelangganModel->deletePelanggan($id)) {
        return $this->response->setJSON(['message' => 'Data berhasil dihapus', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal menghapus data', 'status' => 0]);
    }
}
}