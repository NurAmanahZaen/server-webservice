<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    public function index()
    {
        // Optionally implement logic for the index method if needed
    }

    public function showSimpleJson()
    {
        $data = [
            'id' => 1, // Change to 1 instead of 01 for proper integer representation
            'image' => 'pict',
            'kd_barang' => 'B123',
            'nama' => 'nisa',
            'merek' => 'nixy',
            'harga' => '89000',
            'stok' => '15',
            'kd_user' => 123456,
        ];

        return $this->response->setJSON($data);
    }

    public function getBarang()
    {
        $barangModel = new BarangModel(); // Corrected variable name to match conventions

        $barangs = $barangModel->getBarang(); // Changed to match the correct variable name

        return $this->response->setJSON($barangs);
    }

    // Function untuk menyimpan data dengan output JSON
    public function storeData()
    {
        $barangModel = new BarangModel();

        // Mendapatkan data input dari request
        $data = [
            'id' => $this->request->getPost('id'),
            'image' => $this->request->getPost('image'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'nama' => $this->request->getPost('nama'),
            'merek' => $this->request->getPost('merek'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'kd_user' => $this->request->getPost('kd_user'),
        ];

        if ($barangModel->saveBarang($data)) {
            return $this->response->setJSON(['message' => 'Data berhasil disimpan', 'status' => 1]);
        } else {
            return $this->response->setJSON(['message' => 'Gagal menyimpan data', 'status' => 0]);
        }
    }

    public function update($id)
    {
        $barangModel = new BarangModel();

        // Mendapatkan data input dari request
        $data = [
            'id' => $id, // Use the $id parameter to identify which item to update
            'image' => $this->request->getPost('image'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'nama' => $this->request->getPost('nama'),
            'merek' => $this->request->getPost('merek'),
            'stok' => $this->request->getPost('stok'),
            'kd_user' => $this->request->getPost('kd_user'),
        ];

        if ($barangModel->saveBarang($data)) {
            return $this->response->setJSON(['message' => 'Data berhasil diperbarui', 'status' => 1]);
        } else {
            return $this->response->setJSON(['message' => 'Gagal memperbarui data', 'status' => 0]);
        }
    }

    public function delete($id)
    {
        $barangModel = new BarangModel();

        if ($barangModel->deleteBarang($id)) {
            return $this->response->setJSON(['message' => 'Data berhasil dihapus', 'status' => 1]);
        } else {
            return $this->response->setJSON(['message' => 'Gagal menghapus data', 'status' => 0]);
        }
    }
}
