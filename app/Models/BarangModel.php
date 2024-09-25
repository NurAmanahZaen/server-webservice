<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    Protected $table = 'Barang'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'image', 'kd_barang', 'nama', 'merek', 'kd_user', 'harga', 'stok'];


    public function getBarang()
    {    
        return $this->findAll();
    }
    // Method untuk menganmbil data barang berdasarkan id
    public function getBarangById($id)

    {
        return $this->find($id);
    }
    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
        public function saveBarang($data)
    {
        return $this->save($data);
    }
    // Method untuk memperbarui data Pelanggan yang sudah ada
    public Function updateBarang($id, $data)
    {
        return $this->update($id, $data);
    }
    // Method untuk menghapus data barang berdasarkan id
    public function deleteBarang($id)
    {
        return $this->delete($id);
    }
}