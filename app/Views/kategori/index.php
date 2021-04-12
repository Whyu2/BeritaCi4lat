<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content_admin'); ?>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col">

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('pesan_danger')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesan_danger'); ?>
                    </div>
                <?php endif; ?>
                <table>
                    <tr>
                        <th>
                            <a href="/kategori/tambah" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i> Tambah Kategori</a>
                        </th>
                        <th>
                            <form class="form-inline ml-3 col-20" action="" method="post">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="text" placeholder="Masukkan Pencarian" aria-label="Search" name="keyboard">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit" name="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </th>
                    </tr>
                </table>

                <br>
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col" width="100px">No</th>
                            <th scope="col">Nama</th>

                            <th scope="col" width="100px" colspan="2" contenteditable="2" width="130px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (3 * ($awal - 1)); ?>
                        <?php

                        foreach ($kategori as $k) :  ?> <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td>
                                    <p><?= $k['nama_kategori']; ?></p>
                                </td>

                                <td width="50px">
                                    <a href="/kategori/edit/<?= $k['id_kategori'] ?>" class="btn btn-success">Edit</a><br>
                                </td>
                                <td width="50px">

                                    <form action="/kategori/<?= $k['id_kategori']; ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>

                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?= $pager->links('kategori', 'kategori_page'); ?>











            </div>
        </div>

        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<?= $this->endSection(); ?>