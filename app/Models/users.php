<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key dari tabel
    protected $allowedFields = ['nama', 'username', 'password', 'alamat', 'no_hp', 'role']; 
    
    // Methode untuk mengambil data admin
    public function getusers($id)
    {
        // Mengambil semua data dari tabel
        return $this->findAll();
    }

    // Methode untuk mengambil data admin berdasarkan id
    public function getdatausers($id)
    {
        // Mengambil data admin berdasarkan id
        return $this->find($id);
    }

    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
    public function saveusers($id)
    {
        //Menyimpan data baru atau memperbarui data yang ada jika primary key sudah ada
        return $this->save($data);
    }

    // Method untuk memperbarui data admin berdasarkan id
    public function updateusers($id, $data)
    {
        //Menggunakan method update() dari codeigniter model untuk mengambil data
        return $this->update($id, $data);
    }

   //Method untuk menghapus data petshop berdasarkan id
   public function deleteusers($id)
   {
       //Menggunakan method delete() untuk menghapus data admin berdasarkan id
       return $this->delete($id);
   }
}