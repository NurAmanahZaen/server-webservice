<?php

namespace App\Controllers;

use App\Models\UserDetailTransaksi; // Import model dengan benar
use App\Controllers\BaseController;

class DetailTransaksi extends BaseController
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
            'id' => '1',
            'kd_transaksi' => '13283',
            'kd_barang' => '1001',
            'jumlah'  => '50',
            'status' => 'terkirim',
        ];

        // Mengembalikan response dalam format JSON
        return $this->response->setJSON($data);
    }

    // Method untuk menampilkan data detail transaksi dalam bentuk JSON
    public function getDetailTransaksi()
    {
        // Memanggil model DetailTransaksi
        $detailTransaksiModel = new UserDetailTransaksi();

        // Mengambil data dari tabel detail_transaksi
        $transaksi = $detailTransaksiModel->getDetailTransaksi(); // Pastikan nama method model benar

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($transaksi);
    }

    // Function untuk menyimpan data dengan output JSON
    public function storeData()
    {
        // Memanggil model UserDetailTransaksi
        $detailTransaksiModel = new UserDetailTransaksi();

        // Mendapatkan data input dari request
        $data = [
            'id' => $this->request->getPost('id'),
            'kd_transaksi' => $this->request->getPost('kd_transaksi'), 
            'kd_barang' => $this->request->getPost('kd_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status'),
        ];

        // Menyimpan data ke dalam database
        if ($detailTransaksiModel->insert($data)) {
            // Jika berhasil menyimpan data, kirimkan respon JSON
            return $this->response->setJSON([
                'message' => 'Berhasil menyimpan data',
                'status' => 1 // atau TRUE
            ]);
        } else {
            // Jika gagal menyimpan data, kirimkan response JSON dengan status gagal
            return $this->response->setJSON([
                'message' => 'Gagal menyimpan data',
                'status' => 0 // atau FALSE
            ]);
        }
    }

    // Method untuk mengupdate data detail transaksi
    public function update($id)
    {
        // Memanggil model UserDetailTransaksi
        $detailTransaksiModel = new UserDetailTransaksi();

        // Mengambil data input dari request
        $data = [
            'id' => $this->request->getPost('id'),
            'kd_transaksi' => $this->request->getPost('kd_transaksi'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status'),
        ];

        // Update data detail transaksi berdasarkan id
        if ($detailTransaksiModel->update($id, $data)) {
            // Jika berhasil update
            return $this->response->setJSON([
                'message' => 'Berhasil memperbarui data',
                'status' => 1
            ]);
        } else {
            // Jika gagal update
            return $this->response->setJSON([
                'message' => 'Gagal memperbarui data',
                'status' => 0
            ]);
        }
    }

    // Method untuk menghapus data detail transaksi
    public function delete($id)
    {
        // Memanggil model UserDetailTransaksi
        $detailTransaksiModel = new UserDetailTransaksi();

        // Menghapus data detail transaksi berdasarkan id
        if ($detailTransaksiModel->delete($id)) {
            // Jika berhasil dihapus
            return $this->response->setJSON([
                'message' => 'Berhasil menghapus data',
                'status' => 1
            ]);
        } else {
            // Jika gagal dihapus
            return $this->response->setJSON([
                'message' => 'Gagal menghapus data',
                'status' => 0
            ]);
        }
    }
}