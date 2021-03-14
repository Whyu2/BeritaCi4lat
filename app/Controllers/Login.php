<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\AuthModel;
use App\Models\BeritaModel;

class Login extends BaseController
{

    protected $loginModel, $beritaModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->beritaModel = new BeritaModel();
    }
    public function index()
    {

        $data = [

            'validation' => \Config\Services::validation()
        ];

        return view('login/index', $data);
    }

    public function login_action()
    {

        if (!$this->validate([
            'email' => 'required', 'password' => 'required'

        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/login/index')->withInput()->with('validation', $validation);
        }
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $cek = $this->loginModel->login($email, $password);

        $data = [
            'berita' => $this->beritaModel->getberita(),
            'nama' => 'List Berita'
        ];

        if ($cek) {
            session()->set('name', $cek['name']);
            session()->set('level', $cek['level']);
            return view('admin/index', $data);
        } else {
            session()->setFlashdata('pesan_login', ' Gagal Login, Password / Email tidak cocok');
            return redirect()->to('/login/index');
        }
    }

    public function logout()
    {
        session()->removeTempdata('name');
        session()->removeTempdata('level');
        session()->setFlashdata('pesan', ' Anda berhasil logout');
        return redirect()->to('/login/index');
    }
}
