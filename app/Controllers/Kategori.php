<?php

namespace App\Controllers;

class Kategori extends BaseController
{

    protected $kategoriModel;
    public function __construct()
    {

        $this->kategoriModel = new \App\Models\KategoriModel();
    }
    public function index()
    {
        if (session()->get('name') == '') {
            session()->setFlashdata('pesan_login', ' Gagal Login, Anda belum login');
            return redirect()->to('/login/index');
        }
        $data = [
            'kategori' => $this->kategoriModel->findAll(),
            'nama' => 'List Kategori Berita'
        ];


        return view('kategori/index', $data);
    }
    public function tambah()
    {
        if (session()->get('name') == '') {
            session()->setFlashdata('pesan_login', ' Gagal Login, Anda belum login');
            return redirect()->to('/login/index');
        }
        $data = [
            'kategori' => $this->kategoriModel->findAll(),
            'nama' => 'Tambah Kategori Berita',
            'validation' => \Config\Services::validation()
        ];

        return view('kategori/tambah_kategori', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_kategori' => 'required|is_unique[tbl_kategori.nama_kategori]',
        ]))
            return redirect()->to('/kategori/tambah')->withInput();

        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ]);
        session()->setFlashdata('pesan', ' Kategori berhasil ditambahkan');
        return redirect()->to('/kategori/index');
    }
    public function delete($id_kategori)
    {
        $kategoria = $this->kategoriModel->getkategori($id_kategori);
        $this->kategoriModel->delete($id_kategori);
        session()->setFlashdata('pesan_danger', ' Kategori ' . $kategoria['nama_kategori'] . ' berhasil dihapus');
        return redirect()->to('/kategori/index');
    }
    public function edit($id_kategori)
    {
        if (session()->get('name') == '') {
            session()->setFlashdata('pesan_login', ' Gagal Login, Anda belum login');
            return redirect()->to('/login/index');
        }
        $data = [
            'kategori' => $this->kategoriModel->getkategori($id_kategori),
            'nama' => 'Edit Kategori Berita',
            'validation' => \Config\Services::validation()
        ];

        return view('kategori/edit_kategori', $data);
    }

    public function update($id_kategori)
    {
        $old = $this->kategoriModel->getkategori($id_kategori);

        if ($old['nama_kategori'] == $this->request->getVar('nama_kategori')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[tbl_kategori.nama_kategori]';
        }
        if (!$this->validate([
            'nama_kategori' => $rule
        ])) {
            return redirect()->to('/kategori/edit/' . $id_kategori)->withInput();
        }
        $baru = $this->request->getVar('nama_kategori');
        $this->kategoriModel->save([
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]); {
            session()->setFlashdata('pesan', 'Kategori ' . $old['nama_kategori'] . ' berhasil diubah menjadi ' . $baru . '');
            return redirect()->to('/kategori/index');
        }
    }
}
