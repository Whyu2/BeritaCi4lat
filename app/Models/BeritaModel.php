<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'tbl_berita';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kategori', 'judul', 'slug', 'isi', 'pengirim', 'sampul'];
    protected $primaryKey = 'id_berita';

    public function getberita($slug = false)
    {

        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    // public function get_count()
    // {
    //     $this->where(['id_kategori' => 7]);
    //     return $this->countAllResults();
    // }
    public function instertBerita($berita)
    {
        $query = $this->db->table($this->table)->insert($berita);
        if ($query) {
            return true;
        } else
            return false;
    }
    public function search($keyboard)
    {
        return $this->table('tbl_berita')->like('judul', $keyboard);
    }
}
