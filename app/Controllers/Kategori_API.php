<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use CodeIgniter\RESTful\ResourceController;

class Kategori_API extends ResourceController
{
    public function __construct()
    {
        $this->kategori =  new KategoriModel();
    }
    public function index()
    {
        $kategori = $this->kategori->getkategori();

        foreach ($kategori as $b) {
            $kategori_all[] = [
                'id_kategori' => intval($b['id_kategori']),
                'nama_kategori' => $b['nama_kategori']
            ];
        }
        return $this->respond($kategori_all, 200);
    }
    public function create()
    {
        $nama_kategori = $this->request->getPost('nama_kategori');


        $kategori = [
            'nama_kategori' => $nama_kategori

        ];
        $simpan = $this->kategori->instertKategori($kategori);
        if ($simpan = true) {
            $out = [
                'status' => 200,
                'message' => 'Data kategori Berhasil masuk',
                'data' => ''
            ];
            return $this->respond($out, 200);
        } else {
            $out = [
                'status' => 400,
                'message' => 'Data Gagal masuk',
                'data' => ''
            ];
            return $this->respond($out, 400);
        }
    }
}
