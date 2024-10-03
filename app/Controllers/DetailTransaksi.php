<?php

namespace App\Controllers;

use App\Models\detailtransaksiModel as DetailTransaksiModel; 

class DetailTransaksi extends BaseController 
{
    public function index()
    {
    }
    
    public function showSimpleJson()
    {
        $data = [
            'id' => '1',
            'kd_transaksi' => '13283',
            'kd_barang' => '1001',
            'jumlah'  => '50', 
            'status' => 'terkirim',
        ];

        return $this->response->setJSON($data);
    }

    // Method untuk menampilkan data detail transaksi dalam bentuk JSON
    public function getDetailTransaksi() // Updated method name to camel case
    {
        // Memanggil model DetailTransaksiModel
        $detailtransaksiModel = new DetailTransaksi(); // Use consistent variable name

        // Mengambil data dari tabel transaksi
        $detailtransaksi = $detailtransaksiModel->getDetailTransaksi(); // Ensure method name is correct

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($detailtransaksi);
    }
    // Function untuk menyimpan data dengan output JSON
    public function storeData()
{
    $detailtransaksiModel = new DetailTransaksiModel();

    // Mendapatkan data input dari request
    $data = [
       'id' => $this->request->getPost('id'),
        'kd_transaksi' => $this->request->getPost('kd_transaksi'), 
        'kd_barang' => $this->request->getPost('kd_barang'),
        'jumlah' => $this->request->getPost('jumlah'),
        'status' => $this->request->getPost('status'),
    ];

    if ($detailtransaksiModel->saveDetailTransaksi($data)) {
        return $this->response->setJSON(['message' => 'Data berhasil disimpan', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal menyimpan data', 'status' => 0]);
    }
}
public function update($id)
{
    $detailtransaksiModel = new DetailTransaksiModel();

    // Mendapatkan data input dari request
    $data = [
        'id' => $this->request->getPost('id'),
        'kd_transaksi' => $this->request->getPost('kd_transaksi'), 
        'kd_barang' => $this->request->getPost('kd_barang'),
        'jumlah' => $this->request->getPost('jumlah'),
        'status' => $this->request->getPost('status'),
    ];

    if ($detailTransaksiModel->saveDetailTransaksi($data)) {
        return $this->response->setJSON(['message' => 'Data berhasil diperbarui', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal memperbarui data', 'status' => 0]);
    }
}

public function delete($id)
{
    $detailtransaksiModel = new DetailTransaksiModel();

    if ($detailTransaksiModel->deleteDetailTransaksi($id)) {
        return $this->response->setJSON(['message' => 'Data berhasil dihapus', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal menghapus data', 'status' => 0]);
    }
}
} 