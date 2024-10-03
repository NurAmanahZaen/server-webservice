<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\RESTful\ResourceController;

class BarangServer extends ResourceController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    // Method untuk mengambil semua data barang
    public function index()
    {
        try {
            $data_barang = $this->barangModel->findAll();
            return $this->respond($data_barang, 200, ['Content-Type' => 'application/json']);
        } catch (\Exception $e) {
            return $this->fail(['error' => $e->getMessage()], 500, ['Content-Type' => 'application/json']);
        }
    }

    // Method untuk membuat data barang baru
    public function create()
    {
        try {
            $input_data = $this->request->getJSON(true);

            if ($input_data) {
                $data = [
                    'image'     => $input_data['image'] ?? 'no-image.png',
                    'kd_barang' => $input_data['kd_barang'] ?? '',
                    'nama'      => $input_data['nama'] ?? '',
                    'merek'     => $input_data['merek'] ?? '',
                    'kd_user'   => $input_data['kd_user'] ?? '',
                    'harga'     => $input_data['harga'] ?? '',
                    'stok'      => $input_data['stok'] ?? ''
                ];

                if ($this->barangModel->insert($data)) {
                    return $this->respondCreated(
                        ['status' => 'success', 'message' => 'Barang berhasil ditambahkan']
                    )->setContentType('application/json');
                } else {
                    return $this->fail(
                        'Gagal menambah barang', 
                        400
                    )->setContentType('application/json');
                }
            } else {
                return $this->fail(
                    'Invalid JSON input', 
                    400
                )->setContentType('application/json');
            }
        } catch (\Exception $e) {
            return $this->fail(['error' => $e->getMessage()], 500, ['Content-Type' => 'application/json']);
        }
    }

    // Method untuk mengambil data barang berdasarkan id
    public function show($id = null)
    {
        try {
            $barang = $this->barangModel->find($id);

            if ($barang) {
                return $this->respond($barang, 200, ['Content-Type' => 'application/json']);
            } else {
                return $this->failNotFound('Barang tidak ditemukan')->setContentType('application/json');
            }
        } catch (\Exception $e) {
            return $this->fail(['error' => $e->getMessage()], 500, ['Content-Type' => 'application/json']);
        }
    }

    // Method untuk memperbarui data barang berdasarkan id
    public function update($id = null)
    {
        try {
            $input_data = $this->request->getJSON(true);

            if ($input_data) {
                $data = [
                    'image'     => $input_data['image'] ?? 'no-image.png',
                    'kd_barang' => $input_data['kd_barang'] ?? '',
                    'nama'      => $input_data['nama'] ?? '',
                    'merek'     => $input_data['merek'] ?? '',
                    'kd_user'   => $input_data['kd_user'] ?? '',
                    'harga'     => $input_data['harga'] ?? '',
                    'stok'      => $input_data['stok'] ?? ''
                ];

                if ($this->barangModel->update($id, $data)) {
                    return $this->respond(['status' => 'success', 'message' => 'Barang berhasil diperbarui'], 200, ['Content-Type' => 'application/json']);
                } else {
                    return $this->fail('Gagal memperbarui barang', 400, ['Content-Type' => 'application/json']);
                }
            } else {
                return $this->fail('Invalid JSON input', 400, ['Content-Type' => 'application/json']);
            }
        } catch (\Exception $e) {
            return $this->fail(['error' => $e->getMessage()], 500, ['Content-Type' => 'application/json']);
        }
    }

    // Method untuk menghapus data barang berdasarkan id
    public function delete($id = null)
    {
        try {
            if ($this->barangModel->find($id)) {
                if ($this->barangModel->delete($id)) {
                    return $this->respondDeleted(['status' => 'success', 'message' => 'Barang berhasil dihapus'], 200, ['Content-Type' => 'application/json']);
                } else {
                    return $this->fail('Gagal menghapus barang', 400, ['Content-Type' => 'application/json']);
                }
            } else {
                return $this->failNotFound('Barang tidak ditemukan')->setContentType('application/json');
            }
        } catch (\Exception $e) {
            return $this->fail(['error' => $e->getMessage()], 500, ['Content-Type' => 'application/json']);
        }
    }
}