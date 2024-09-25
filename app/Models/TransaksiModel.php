<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key dari tabel
    protected $allowedFields = [
        'no_invoice', 
        'kd_user', 
        'kd_pelanggan', 
        'tgl_mulai', 
        'tgl_kembali', 
        'status', 
        'keterangan'
    ]; 
    
    // Method untuk mengambil semua data transaksi
    public function getTransaksi()
    {
        return $this->findAll(); // Mengambil semua data transaksi
    }

    // Method untuk mengambil data transaksi berdasarkan id
    public function getTransaksiById($id)
    {
        return $this->find($id); // Mengambil data transaksi berdasarkan ID
    }

    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
    public function saveTransaksi($data)
    {
        return $this->save($data); // Menggunakan method save() dari CodeIgniter Model
    }

    // Method untuk menghapus data transaksi berdasarkan id
    public function deleteTransaksi($id)
    {
        return $this->delete($id); // Menggunakan method delete() dari CodeIgniter Model
    }
}