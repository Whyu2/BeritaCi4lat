<?php

namespace App\Controllers;

class Admin extends BaseController
{

    protected $beritaModel, $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new \App\Models\KategoriModel();
        $this->beritaModel = new \App\Models\BeritaModel();
    }
    public function index()
    {
        if (session()->get('name') == '') {
            session()->setFlashdata('pesan_login', ' Gagal Login, Anda belum login');
            return redirect()->to('/login/index');
        }

        $keyboard = $this->request->getVar('keyboard');

        if ($keyboard) {
            $berita = $this->beritaModel->search($keyboard);
        } else {
            $berita = $this->beritaModel;
        }

        $data = [
            'berita' => $berita->getberita(),
            'nama' => 'List Berita'

        ];
        // $row = $this->beritaModel->get_count();
        // dd($row);


        return view('admin/index', $data);
    }

    public function tambah()
    {
        if (session()->get('name') == '') {
            session()->setFlashdata('pesan_login', ' Gagal Login, Anda belum login');
            return redirect()->to('/login/index');
        }
        $data = [
            'validation' => \Config\Services::validation(),
            'nama' => 'Tambah Berita',
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('admin/tambah_berita', $data);
    }



    public function save()
    {
        if (!$this->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'pengirim' => 'required',
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukurun gambar terlalu besar',
                    'is_image' => 'Yang dipilih bukan gambar',
                    'mime_in' => 'Yang dipilih bukan gambar'
                ]
            ]
        ]))
            return redirect()->to('/admin/tambah')->withInput();

        $filesampul = $this->request->getFile('sampul');

        if ($filesampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            $namaSampul = $filesampul->getRandomName();

            $filesampul->move('images/berita', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->beritaModel->save([
            'id_kategori' => $this->request->getVar('id_kategori'),
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'isi' => $this->request->getVar('isi'),
            'pengirim' => $this->request->getVar('pengirim'),
            'sampul' => $namaSampul
        ]);


        session()->setFlashdata('pesan', ' Berita berhasil ditambahkan');
        return redirect()->to('/admin/index');
    }

    public function detail($slug)
    {
        if (session()->get('name') == '') {
            session()->setFlashdata('pesan_login', ' Gagal Login, Anda belum login');
            return redirect()->to('/login/index');
        }
        $berita = $this->beritaModel->getberita($slug);

        $data = [

            'berita' => $this->beritaModel->getberita($slug),
            'nama' => 'Detail Berita',
            'kategori' => $this->kategoriModel->getkategori($berita['id_kategori'])
        ];
        return view('admin/detail_berita', $data);
    }


    public function edit($slug)
    {
        if (session()->get('name') == '') {
            session()->setFlashdata('pesan_login', ' Gagal Login, Anda belum login');
            return redirect()->to('/login/index');
        }
        $berita = $this->beritaModel->getberita($slug);

        $data = [
            'validation' => \Config\Services::validation(),
            'berita' => $this->beritaModel->getberita($slug),
            'nama' => 'Edit Berita',
            'kategori' => $this->kategoriModel->findAll()
            // 'kategori' => $this->kategoriModel->getkategori($berita['id_kategori'])
        ];
        return view('admin/edit_berita', $data);
    }

    public function delete($id)
    {


        // $berita = $this->beritaModel->find($slug);
        $this->beritaModel->delete($id);


        // $row = $this->beritaModel->get_count();
        // dd($row);



        session()->setFlashdata('pesan', ' Berita berhasil dihapus');
        return redirect()->to('/admin/index');
    }
    //--------------------------------------------------------------------

}
