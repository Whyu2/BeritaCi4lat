<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tbl_kategori';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kategori'];
    protected $primaryKey = 'id_kategori';

    public function getkategori($id_kategori = false)
    {
        if ($id_kategori == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id_kategori])->first();
    }
    public function instertKategori($kategori)
    {
        $query = $this->db->table($this->table)->insert($kategori);
        if ($query) {
            return true;
        } else
            return false;
    }
}
