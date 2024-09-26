<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
    }

    //Function sederhana untuk menampilkan data array dalam format JSON
    public function showSimpleJson()
    {
        // Data array sederhana
        $data = [
        'id' => 1,
        'nama' => 'amalia ardiyani',
        'username' => 'amaliaard',
        'password' => '12345',
        'alamat' => 'ajibarang',
        'no_hp' => '085219053802',
        'role' => 'user',
        ];
       
        // Mengambil response dalam format JSON
        return $this->response->setJSON($data);
    }

    // method untuk menampilkan data admin dalam bentuk JSON
    public function getUsersDataJson()
    {
        // Memanggil  model users
        $usersmodel = new UsersData();

        // Mengambil data dari tabel tb_user
        $users = $usersmodel->getUsersData();

        //Memanggil data dalam format JSON
        return $this->response->setJSON($users);
    }

    // Function untuk menyimpan data dengan output JSON
    public function storeData()
    {
        // Memanggil model UsersModel
        $users = new UsersModel();

        // Mendapatkan data input dari request
        $data = [
            'id' => $this->request->getPost('id',),
            'nama' => $this->request->getPost('nama',),
            'username' => $this->request->getPost('username',),
            'password' => $this->request->getPost('password',),
            'alamat' => $this->request->getPost('alamat',),
            'no_hp' => $this->request->getPost('no_hp',),
            'role' => $this->request->getPost('role',)

        ];

        if ($usersModel->saveUsers($data)) {
            return $this->response->setJSON(['message' => 'Data berhasil disimpan', 'status' => 1]);
        } else {
            return $this->response->setJSON(['message' => 'Gagal menyimpan data', 'status' => 0]);
        }
    }
    
    public function update($id)
    {
        $usersModel = new UsersModel();
    
        // Mendapatkan data input dari request
        $data = [
            'id' => $this->request->getPost('id',),
            'nama' => $this->request->getPost('nama',),
            'username' => $this->request->getPost('username',),
            'password' => $this->request->getPost('password',),
            'alamat' => $this->request->getPost('alamat',),
            'no_hp' => $this->request->getPost('no_hp',),
            'role' => $this->request->getPost('role',)
        ];
    
        if ($usersModel->saveUsers($data)) {
            return $this->response->setJSON(['message' => 'Data berhasil diperbarui', 'status' => 1]);
        } else {
            return $this->response->setJSON(['message' => 'Gagal memperbarui data', 'status' => 0]);
        }
    }
    
    public function delete($id)
    {
        $usersModel = new UsersModel();
    
        if ($usersModel->deleteUsers($id)) {
            return $this->response->setJSON(['message' => 'Data berhasil dihapus', 'status' => 1]);
        } else {
            return $this->response->setJSON(['message' => 'Gagal menghapus data', 'status' => 0]);
        }
    }
        
    }