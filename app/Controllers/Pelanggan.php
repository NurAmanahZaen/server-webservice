<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use CodeIgniter\RESTful\ResourceController;
class Pelanggan extends ResourceController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data_pelanggan = $this->pelangganModel->findAll();
        return $this->respond($data_pelanggan, 200, ['Content-Type' => 'application/json']);
    }
    
    public function create()
    {
        $input_data = $this->request->getJSON(true);
        if ($input_data) {
        $data = [
                'nama'      => $input_data['nama'] ?? '',
                'alamat'    => $input_data['alamat'] ?? '',
                'no_hp'     => $input_data['no_hp'] ?? '',
                'username'  => $input_data['username'] ?? '',
                'password'  => $input_data['password'] ?? ''
                ];

            if ($this->pelangganModel->savePelanggan($data)) {
                return $this->respondCreated(
                    ['status' => 'success', 'message' => 'Pelanggan berhasil ditambahkan']
                )->setContentType('application/json');
            } else {
                return $this->fail(
                    'Gagal menambah pelanggan', 
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
        $pelangganmodel = new PelangganModel();

        $pelanggan = $pelangganmodel->getPelangganById($id);

        return $this->response->setJSON($pelanggan);
    }
    
    public function getPelanggan()
    {
        $pelangganModel = new PelangganModel(); // Corrected variable name to match conventions

        $pelanggans = $pelangganModel->getPelanggan(); // Changed to match the correct variable name

        return $this->response->setJSON($pelanggans);
    }


    public function update($id = null)
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'nama'      => $input_data['nama'] ?? '',
                'alamat'    => $input_data['alamat'] ?? '',
                'no_hp'     => $input_data['no_hp'] ?? '',
                'username'  => $input_data['username'] ?? '',
                'password'  => $input_data['password'] ?? ''
            ];

            if ($this->pelangganModel->update($id, $data)) {
                return $this->respond(['status' => 'success', 'message' => 'Pelanggan berhasil diperbarui'], 200, ['Content-Type' => 'application/json']);
            } else {
                return $this->fail('Gagal memperbarui pelanggan', 400, ['Content-Type' => 'application/json']);
            }
        } else {
            return $this->fail('Invalid JSON input', 400, ['Content-Type' => 'application/json']);
        }
    }
    public function delete($id = null)
    {
        if ($this->pelangganModel->delete($id)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'Pelanggan berhasil dihapus'], 200, ['Content-Type' => 'application/json']);
        } else {
            return $this->fail('Gagal menghapus pelanggan', 400, ['Content-Type' => 'application/json']);
        }
    }
}