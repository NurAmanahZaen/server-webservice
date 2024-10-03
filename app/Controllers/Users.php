<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        $data_users = $this->userModel->findAll();
        return $this->respond($data_users, 200, ['Content-Type' => 'application/json']);
    }

    public function create()
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'id' => $input_data['id'] ?? '',
                'nama' => $input_data['nama'] ?? '',
                'username' => $input_data['username'] ?? '',
                'password' => $input_data['password'] ?? '',
                'alamat' => $input_data['alamat'] ?? '',
                'no_hp' => $input_data['no_hp'] ?? '',
                'role' => $input_data['role'] ?? '',
    
        ];
        
        if ($this->userModel->saveUsers($data)) {
            return $this->respondCreated(
                ['status' => 'success', 'message' => 'Users berhasil ditambahkan']
            )->setContentType('application/json');
        } else {
            return $this->fail(
                'Gagal menambah users', 
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
    $usermodel = new UsersModel();

    $users = $usermodel->getUsersById($id);

    return $this->response->setJSON($users);
}

public function getUsers()
    {
        $userModel = new UserModel(); // Corrected variable name to match conventions

        $users = $userModel->getUsers(); // Changed to match the correct variable name

        return $this->response->setJSON($users);
    }

public function update($id = null)
{
    $input_data = $this->request->getJSON(true);

    if ($input_data) {
        $data = [
            'id' => $input_data['id'] ?? '',
                'nama' => $input_data['nama'] ?? '',
                'username' => $input_data['username'] ?? '',
                'password' => $input_data['password'] ?? '',
                'alamat' => $input_data['alamat'] ?? '',
                'no_hp' => $input_data['no_hp'] ?? '',
                'role' => $input_data['role'] ?? '',
        ];

        if ($this->userModel->update($id, $data)) {
            return $this->respond(['status' => 'success', 'message' => 'Users berhasil diperbarui'], 200, ['Content-Type' => 'application/json']);
        } else {
            return $this->fail('Gagal memperbarui users', 400, ['Content-Type' => 'application/json']);
        }
    } else {
        return $this->fail('Invalid JSON input', 400, ['Content-Type' => 'application/json']);
    }
}
 
public function delete($id = null)
{
    if ($this->userModel->delete($id)) {
        return $this->respondDeleted(['status' => 'success', 'message' => 'Users berhasil dihapus'], 200, ['Content-Type' => 'application/json']);
    } else {
        return $this->fail('Gagal menghapus users', 400, ['Content-Type' => 'application/json']);
}
}
}
