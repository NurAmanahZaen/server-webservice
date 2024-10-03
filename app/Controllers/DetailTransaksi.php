<?php

namespace App\Controllers;

use App\Models\DetailTransaksiModels; 
use CodeIgniter\RESTful\ResourceController;

class DetailTransaksi extends ResourceController 
{
    protected $detailtransaksiModel;

    public function __construct()
    {
        $this->detailtransaksiModel = new DetailTransaksiModel();
    }
    
    public function index()
    {
        $data_detailtransaksi = $this->detailtransaksiModel->findAll();
        return $this->respond($data_detailtransaksi, 200, ['Content-Type' => 'application/json']);
    }

    public function create()
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'id'     => $input_data['id'] ?? '',
                'kd_transaksi' => $input_data['kd_transaksi'] ?? '',
                'kd_barang'      => $input_data['kd_barang'] ?? '',
                'jumlah'     => $input_data['jumlah'] ?? '',
                'status'   => $input_data['status'] ?? '',
            ];

            if ($this->detailtransaksiModel->insert($data)) {
                return $this->respondCreated([
                    'status'  => 'success', 
                    'message' => 'Detail transaksi berhasil ditambahkan'
                ])->setContentType('application/json');
            } else {
                return $this->fail('Gagal menambah Detail transaksi', 400)
                             ->setContentType('application/json');
            }
        } else {
            return $this->fail('Invalid JSON input', 400)
                         ->setContentType('application/json');
        }
    }

    public function show($id = null)
    {
        $detailtransaksimodel = new DetailTransaksiModel();

        $detailtransaksi = $detailtransaksimodel->getDetailTransaksiById($id);

        return $this->response->setJSON($detailtransaksi);
    }

    public function getDetailTransaksi()
    {
        $detailtransaksiModel = new DetailTransaksiModel(); // Corrected variable name to match conventions

        $detailtransaksis = $detailtransaksiModel->getDetailTransaksi(); // Changed to match the correct variable name

        return $this->response->setJSON($detailtransaksis);
}

    public function update($id = null)
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'id' => $this->request->getPost('id'),
                'kd_transaksi' => $this->request->getPost('kd_transaksi'),
                'kd_barang' => $this->request->getPost('kd_barang'),
                'jumlah' => $this->request->getPost('jumlah'),
                'status' => $this->request->getPost('status'),
    
            ];

            if ($this->detailtransaksiModel->update($id, $data)) {
                return $this->respond(['status' => 'success', 'message' => 'Detail transaksi berhasil diperbarui'], 200, ['Content-Type' => 'application/json']);
            } else {
                return $this->fail('Gagal memperbarui detail transaksi', 400, ['Content-Type' => 'application/json']);
            }
        } else {
            return $this->fail('Invalid JSON input', 400, ['Content-Type' => 'application/json']);
        }
    }

    public function delete($id = null)
    {
        if ($this->detailtransaksiModel->delete($id)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'Barang berhasil dihapus'], 200, ['Content-Type' => 'application/json']);
        } else {
            return $this->fail('Gagal menghapus barang', 400, ['Content-Type' => 'application/json']);
        }
    }
}
