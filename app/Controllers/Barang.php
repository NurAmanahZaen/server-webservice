<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\RESTful\ResourceController;
class Barang extends ResourceController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data_barang = $this->barangModel->findAll();
        return $this->respond($data_barang, 200, ['Content-Type' => 'application/json']);
    }

    public function create()
    {
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

        if ($this->barangModel->saveBarang($data)) {
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
    }
    
 public function show($id = null)
    {
        $barangmodel = new BarangModel();

        $barang = $barangmodel->getBarangById($id);

        return $this->response->setJSON($barang);
    }

    public function getBarang()
    {
        $barangModel = new BarangModel(); // Corrected variable name to match conventions

        $barangs = $barangModel->getBarang(); // Changed to match the correct variable name

        return $this->response->setJSON($barangs);
    }

    public function update($id = null)
    {
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
    }

    public function delete($id = null)
    {
        if ($this->barangModel->delete($id)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'Barang berhasil dihapus'], 200, ['Content-Type' => 'application/json']);
        } else {
            return $this->fail('Gagal menghapus barang', 400, ['Content-Type' => 'application/json']);
        }
    }
}

