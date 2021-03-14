<?php

namespace App\Controllers;

class Register extends BaseController
{

    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new \App\Models\LoginModel();
    }
    public function index()
    {
        $data = [
            'login' => $this->loginModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('register/index', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'name' => 'required', 'email' => 'required', 'password' => 'required'

        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/register/index')->withInput()->with('validation', $validation);
        }
        $this->loginModel->save([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => 1,
            'status' => 1
        ]);
        session()->setFlashdata('pesan', 'Akun berhasil ditambah');
        return redirect()->to('/login/index');
    }
}
