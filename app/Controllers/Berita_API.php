<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use CodeIgniter\RESTful\ResourceController;

class Berita_API extends ResourceController
{
    public function __construct()
    {
        $this->berita =  new BeritaModel();
    }
    public function index()
    {
        $berita = $this->berita->getberita();

        foreach ($berita as $b) {
            $berita_all[] = [
                'id_berita' => intval($b['id_berita']),
                'id_kategori' => intval($b['id_kategori']),
                'judul' => $b['judul'],
                'slug' => $b['slug'],
                'isi' => $b['isi'],
                'pengirim' => $b['pengirim'],
                'sampul' => $b['sampul']
            ];
        }
        return $this->respond($berita_all, 200);
    }
    public function create()
    {
        $id_kategori = $this->request->getPost('id_kategori');
        $judul = $this->request->getPost('judul');
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $isi = $this->request->getPost('isi');
        $pengirim = $this->request->getPost('pengirim');
        $sampul = $this->request->getPost('sampul');

        $berita = [
            'id_kategori' => $id_kategori,
            'judul' => $judul,
            'slug' => $slug,
            'isi' => $isi,
            'pengirim' => $pengirim,
            'sampul' => $sampul
        ];
        $simpan = $this->berita->instertBerita($berita);
        if ($simpan = true) {
            $out = [
                'status' => 200,
                'message' => 'Data Berita Berhasul masuk',
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
    //--------------------------------------------------------------------

}
