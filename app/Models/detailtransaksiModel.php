<?php 

namespace App\Models;

use CodeIgniter\Model;

class detailtransaksiModel extends Model
{
    protected $table      = 'detail_transaksi'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key dari tabel
    protected $allowedFields = ['kd_transaksi', 'kd_barang', 'jumlah', 'status']; 
    
    // Method untuk mengambil semua data transaksi
    public function getDetailTransaksi()
    {
        // Mengambil semua data dari tabel
        return $this->findAll();
    }

    // Method untuk mengambil data transaksi berdasarkan id
    public function getDetailTransaksiById($id)
    {
        // Mengambil data transaksi berdasarkan id
        return $this->find($id);
    }

    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
    public function saveDetailTransaksi($data)
    {
        // Menyimpan data baru atau memperbarui data yang ada jika primary key sudah ada
        return $this->save($data);
    }

    // Method untuk memperbarui data transaksi berdasarkan id
    public function updateDetailTransaksi($id, $data)
    {
        // Menggunakan method update() dari CodeIgniter model untuk memperbarui data
        return $this->update($id, $data);
    }

    // Method untuk menghapus data transaksi berdasarkan id
    public function deleteDetailTransaksi($id)
    {
        // Menggunakan method delete() untuk menghapus data berdasarkan id
        return $this->delete($id);
    }
}