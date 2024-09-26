<?php

namespace App\Controllers;

use App\Models\TransaksiModel; // Import model dengan benar
use App\Controllers\BaseController;

class Transaksi extends BaseController // Updated class name to Transaksi
{
    protected $transaksiModel;
    
    public function __construct()
    {
        // Inisialisasi model
        $this->transaksiModel = new TransaksiModel();
    }

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
    public function store()
    {
        // Ambil data JSON dari request
        $input_data = $this->request->getJSON(true);
        
        if($input_data) {
            $data = [
                'id' => $input_data['id'] ?? null,
                'kd_user' => $input_data['kd_user'] ?? null,
                'no_invoice' => $input_data['no_invoice'] ?? null,
                'tgl_mulai' => $input_data['tgl_mulai'] ?? null,
                'tgl_kembali' => $input_data['tgl_kembali'] ?? null,
                'status' => $input_data['status'] ?? null,
                'keterangan' => $input_data['keterangan'] ?? null,
            ];

            // Simpan data menggunakan insert atau save
            if($this->transaksiModel->save($data)) {
                // Jika berhasil disimpan, kembalikan respon sukses
                return $this->respondCreated([
                    'message' => 'Berhasil menyimpan data',
                    'data' => $data
                ])->setContentType('application/json');
            } else {
                // Jika gagal menyimpan data, kembalikan respon error
                return $this->response->setStatusCode(500)->setJSON([
                    'message' => 'Gagal menyimpan data',
                ]);
            }
        }

        // Jika input_data kosong
        return $this->response->setStatusCode(400)->setJSON([
            'message' => 'Data tidak valid atau tidak ditemukan',
        ]);
    }
    
    public function delete($id = null)
    {
        // Periksa apakah data dengan ID yang diberikan ada di database
        $transaksi = $this->transaksiModel->find($id);

        if ($transaksi) {
            // Jika data ditemukan, lakukan penghapusan
            if ($this->transaksiModel->deleteTransaksi($id)) {
                return $this->response->setStatusCode(200)->setJSON([
                    'message' => 'Data transaksi berhasil dihapus'
                ]);
            } else {
                // Jika gagal menghapus data
                return $this->response->setStatusCode(500)->setJSON([
                    'message' => 'Gagal menghapus data transaksi'
                ]);
            }
        } else {
            // Jika data tidak ditemukan
            return $this->response->setStatusCode(404)->setJSON([
                'message' => 'Data transaksi tidak ditemukan'
            ]);
        }
    }
    public function update($id = null)
    {
        // Ambil data JSON dari request
        $input_data = $this->request->getJSON(true);

        // Cek apakah data transaksi dengan ID yang diberikan ada
        $transaksi = $this->transaksiModel->find($id);

        if ($transaksi) {
            // Siapkan data yang akan diperbarui
            $data = [
                'id' => $input_data['id'] ?? $transaksi['id'],
                'kd_user' => $input_data['kd_user'] ?? $transaksi['kd_user'],
                'no_invoice' => $input_data['no_invoice'] ?? $transaksi['no_invoice'],
                'tgl_mulai' => $input_data['tgl_mulai'] ?? $transaksi['tgl_mulai'],
                'tgl_kembali' => $input_data['tgl_kembali'] ?? $transaksi['tgl_kembali'],
                'status' => $input_data['status'] ?? $transaksi['status'],
                'keterangan' => $input_data['keterangan'] ?? $transaksi['keterangan']
            ];

            // Lakukan update data
            if ($this->transaksiModel->update($id, $data)) {
                return $this->response->setStatusCode(200)->setJSON([
                    'message' => 'Data transaksi berhasil diperbarui',
                    'data' => $data
                ]);
            } else {
                // Jika gagal memperbarui data
                return $this->response->setStatusCode(500)->setJSON([
                    'message' => 'Gagal memperbarui data transaksi'
                ]);
            }
        } else {
            // Jika data transaksi tidak ditemukan
            return $this->response->setStatusCode(404)->setJSON([
                'message' => 'Data transaksi tidak ditemukan'
            ]);
        }
    }
}