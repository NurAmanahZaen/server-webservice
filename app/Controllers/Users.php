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
            'id' => $this->request->get('id',),
            'nama' => $this->request->get('nama',),
            'username' => $this->request->get('username',),
            'password' => $this->request->get('password',),
            'alamat' => $this->request->get('alamat',),
            'no_hp' => $this->request->get('no_hp',),
            'role' => $this->request->get('role',)

        ];

        // Menyimpan data ke dalam database
        if ($usersModel->insert($data)) {
            // Jika berhasil menyimpan data, kirimkan respon JSON
            return $this->response->setJSON([
                'message' => 'Berhasil menyimpan data',
                'status' => 1 // atau TRUE
            ]);
        } else {
            // jika gagal menyimpan data, kirimkan response JSON dengan status gagal
            return $this->response->setJSON([
                'message' => 'Gagal menyimpan data',
                'status' => 1 // atau FALSE
            ]);
        }
    }

    
    // Method untuk mengupdate data admin
    public function update($id)
    {
        //$idAdmin = $this->request->getGet('id');
        // Memanggil model AdminModel
        $TokoBukuModel = new AdminModel();

        // Mengambil data input dari request
        $data = [
            'id' => $this->request->get('id',),
            'nama' => $this->request->get('nama',),
            'username' => $this->request->get('username',),
            'password' => $this->request->get('password',),
            'alamat' => $this->request->get('alamat',),
            'no_hp' => $this->request->get('no_hp',),
            'role' => $this->request->get('role',),
            'tgl_update' => date('Y-m-d H:i:s'), // Mengisi dengan tanggal dan waktu saat ini
        ];

        // Update data admin berdasarkan id
        if ($adminModel->updateUsersData($id, $data)) {
            // Jika berhasil update
            return $this->response->setJSON([
                'message' => 'Berhasil memperbarui data',
                'status' => 1
            ]);
        } else {
            // Jika gagal update
            return $this->response->setJSON([
                'message' => 'Gagal memperbarui data',
                'status' => 0
            ]);
        }
    }

    // Method untuk menghapus data admin
    public function delete($id)
    {
        //$idAdmin = $this->request->getGet('id');
        // Memanggil model Users
        $adminModel = new UsersModel();

        // Menghapus data admin berdasarkan id
        if ($adminModel->deleteAdmin($id)) {
            // Jika berhasil dihapus
            return $this->response->setJSON([
                'message' => 'Berhasil menghapus data',
                'status' => 1
            ]);
        } else {
            // Jika gagal dihapus
            return $this->response->setJSON([
                'message' => 'Gagal menghapus data',
                'status' => 0
            ]);
        }
    }
}