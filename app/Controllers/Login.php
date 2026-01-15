<?php

namespace App\Controllers;

use App\Models\ModelLogin;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        $modelPengaturan = new \App\Models\ModelPengaturan();
        $data = [
            'pengaturan' => $modelPengaturan->data()
        ];
        return view('dashboard/login', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new ModelLogin();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) { // Cek password hash
                $session->set([
                    'id_user'   => $user['id_user'],
                    'nama_user' => $user['nama_user'],
                    'username'  => $user['username'],
                    'foto'      => $user['foto'],
                    'level'     => $user['level'],
                    'logged_in' => true
                ]);
                
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    
}
