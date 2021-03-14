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

                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col" width="100px">No</th>
                            <th scope="col">Nama</th>

                            <th scope="col" width="100px" colspan="2" contenteditable="2" width="130px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;
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
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-rc
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<?= $this->endSection(); ?>