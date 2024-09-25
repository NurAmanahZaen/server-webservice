<?php

namespace App\Controllers;

use App\Models\TransaksiModel; // Import model dengan benar
use App\Controllers\BaseController;

class Transaksi extends BaseController // Updated class name to Transaksi
{
    // Fungsi untuk menampilkan halaman index
    public function index()
    {
        // Implementasi logika jika diperlukan
    }

    // Fungsi sederhana untuk menampilkan data array dalam format JSON
    public function showSimpleJson()
    {
        // Data array sederhana
        $data = [
            'id' => '10',
            'no_invoice' => '13283',
            'kd_user' => '1001',
            'tgl_mulai'  => '2024-09-27',
            'tgl_kembali' => '2024-09-27',
            'status' => 'terkirim',
            'keterangan' => 'terkirim',
        ];

        // Mengembalikan response dalam format JSON
        return $this->response->setJSON($data);
    }

    // Method untuk menampilkan data detail transaksi dalam bentuk JSON
    public function getTransaksi() // Updated method name to camel case
    {
        // Memanggil model TransaksiModel
        $transaksiModel = new TransaksiModel(); // Use consistent variable name

        // Mengambil data dari tabel transaksi
        $transaksi = $transaksiModel->getTransaksi(); // Ensure method name is correct

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($transaksi);
    }

    // Function untuk menyimpan data dengan output JSON
    public function storeData()
{
    $transaksiModel = new TransaksiModel();

    // Mendapatkan data input dari request
    $data = [
        'no_invoice'   => $this->request->getPost('no_invoice'),
        'kd_user'      => $this->request->getPost('kd_user'),
        'kd_pelanggan' => $this->request->getPost('kd_pelanggan'),
        'tgl_mulai'    => $this->request->getPost('tgl_mulai'),
        'tgl_kembali'  => $this->request->getPost('tgl_kembali'),
        'status'       => $this->request->getPost('status'),
        'keterangan'   => $this->request->getPost('keterangan'),
    ];

    if ($transaksiModel->saveTransaksi($data)) {
        return $this->response->setJSON(['message' => 'Data berhasil disimpan', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal menyimpan data', 'status' => 0]);
    }
}

public function update($id)
{
    $transaksiModel = new TransaksiModel();

    // Mendapatkan data input dari request
    $data = [
        'no_invoice'   => $this->request->getPost('no_invoice'),
        'kd_user'      => $this->request->getPost('kd_user'),
        'kd_pelanggan' => $this->request->getPost('kd_pelanggan'),
        'tgl_mulai'    => $this->request->getPost('tgl_mulai'),
        'tgl_kembali'  => $this->request->getPost('tgl_kembali'),
        'status'       => $this->request->getPost('status'),
        'keterangan'   => $this->request->getPost('keterangan'),
    ];

    if ($transaksiModel->saveTransaksi($data)) {
        return $this->response->setJSON(['message' => 'Data berhasil diperbarui', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal memperbarui data', 'status' => 0]);
    }
}

public function delete($id)
{
    $transaksiModel = new TransaksiModel();

    if ($transaksiModel->deleteTransaksi($id)) {
        return $this->response->setJSON(['message' => 'Data berhasil dihapus', 'status' => 1]);
    } else {
        return $this->response->setJSON(['message' => 'Gagal menghapus data', 'status' => 0]);
    }
}
    
}