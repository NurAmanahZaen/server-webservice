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

    // Jika ingin mengembalikan hasil sebagai array
    protected $returnType = 'array';

    // Method untuk mengambil semua data transaksi
    public function getTransaksi()
    {
        try {
            return $this->findAll(); // Mengambil semua data transaksi
        } catch (\Exception $e) {
            // Optional: Menangani jika ada error
            return ['error' => $e->getMessage()];
        }
    }

    // Method untuk mengambil data transaksi berdasarkan id
    public function getTransaksiById($id)
    {
        try {
            return $this->find($id); // Mengambil data transaksi berdasarkan id
        } catch (\Exception $e) {
            // Optional: Menangani jika ada error
            return ['error' => $e->getMessage()];
        }
    }

    // Method untuk menyimpan data transaksi
    public function store($data)
    {
        try {
            // Menyimpan data transaksi dan mengembalikan ID yang baru saja disimpan
            return $this->insert($data, true); 
        } catch (\Exception $e) {
            // Optional: Menangani jika ada error saat penyimpanan
            return ['error' => $e->getMessage()];
        }
    }
}