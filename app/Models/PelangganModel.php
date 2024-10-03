<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    Protected $table = 'pelanggan'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'alamat', 'no_hp', 'username', 'password'];


    public function getPelanggan()
    {    
        return $this->findAll();
    }
    // Method untuk menganmbil data barang berdasarkan id
    public function getPelangganById($id)

    {
        return $this->find($id);
    }
    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
        public function savePelanggan($data)
    {
        return $this->save($data);
    }
    // Method untuk memperbarui data Pelanggan yang sudah ada
    public Function updatePelanggan($id, $data)
    {
        return $this->update($id, $data);
    }
    // Method untuk menghapus data barang berdasarkan id
    public function deletePelanggan($id)
    {
        return $this->delete($id);
    }
}