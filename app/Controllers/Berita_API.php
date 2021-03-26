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

    //--------------------------------------------------------------------

}
