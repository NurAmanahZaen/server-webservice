<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    {
    }

    // Fungsi untuk mendapatkan semua data transaksi
    public function data()
    {
        $data_transaksi = $this->transaksiModel->findAll();
        return $this->response->setJSON($data_transaksi);
    }

    // Fungsi untuk menyimpan data transaksi
    public function create()
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'kd_user'      => $input_data['kd_user'] ?? '',
                'no_invoice'   => $input_data['no_invoice'] ?? '',
                'tgl_mulai'    => $input_data['tgl_mulai'] ?? '',
                'tgl_kembali'  => $input_data['tgl_kembali'] ?? '',
                'status'       => $input_data['status'] ?? '',
                'keterangan'   => $input_data['keterangan'] ?? ''
            ];

            // Simpan data
            if ($this->transaksiModel->insert($data)) {
                return $this->response->setStatusCode(201)->setJSON([
                    'status' => 'success',
                    'message' => 'Transaksi berhasil ditambahkan',
                    'data' => $data
                ]);
            } else {
                return $this->response->setStatusCode(500)->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal menambah transaksi'
                ]);
            }
        }

        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'message' => 'Invalid JSON input'
        ]);
    }

    // Fungsi untuk menampilkan data transaksi berdasarkan ID
    public function show($id = null)
    {
        $transaksi = $this->transaksiModel->find($id);

        if ($transaksi) {
            return $this->response->setJSON($transaksi);
        } else {
            return $this->response->setStatusCode(404)->setJSON([
                'status' => 'error',
                'message' => 'Data transaksi tidak ditemukan'
            ]);
        }
    }

    // Fungsi untuk memperbarui data transaksi
    public function update($id = null)
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $transaksi = $this->transaksiModel->find($id);

            if ($transaksi) {
                $data = [
                    'kd_user'      => $input_data['kd_user'] ?? $transaksi['kd_user'],
                    'no_invoice'   => $input_data['no_invoice'] ?? $transaksi['no_invoice'],
                    'tgl_mulai'    => $input_data['tgl_mulai'] ?? $transaksi['tgl_mulai'],
                    'tgl_kembali'  => $input_data['tgl_kembali'] ?? $transaksi['tgl_kembali'],
                    'status'       => $input_data['status'] ?? $transaksi['status'],
                    'keterangan'   => $input_data['keterangan'] ?? $transaksi['keterangan']
                ];

                if ($this->transaksiModel->update($id, $data)) {
                    return $this->response->setStatusCode(200)->setJSON([
                        'status' => 'success',
                        'message' => 'Transaksi berhasil diperbarui',
                        'data' => $data
                    ]);
                } else {
                    return $this->response->setStatusCode(500)->setJSON([
                        'status' => 'error',
                        'message' => 'Gagal memperbarui transaksi'
                    ]);
                }
            } else {
                return $this->response->setStatusCode(404)->setJSON([
                    'status' => 'error',
                    'message' => 'Data transaksi tidak ditemukan'
                ]);
            }
        }

        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'message' => 'Invalid JSON input'
        ]);
    }

    // Fungsi untuk menghapus data transaksi
    public function delete($id = null)
    {
        $transaksi = $this->transaksiModel->find($id);

        if ($transaksi) {
            if ($this->transaksiModel->delete($id)) {
                return $this->response->setStatusCode(200)->setJSON([
                    'status' => 'success',
                    'message' => 'Transaksi berhasil dihapus'
                ]);
            } else {
                return $this->response->setStatusCode(500)->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal menghapus transaksi'
                ]);
            }
        } else {
            return $this->response->setStatusCode(404)->setJSON([
                'status' => 'error',
                'message' => 'Data transaksi tidak ditemukan'
            ]);
        }
    }
}