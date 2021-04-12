<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content_admin'); ?>


<!-- /.content-header -->

<!-- Main content -->
<section class="content">

    <div class="container-fluid">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- Small boxes (Stat box) -->
        <table>
            <tr>
                <th>
                    <a href="/admin/tambah" class="btn btn-primary"> <i class="nav-icon fas fa-edit"></i> Tambah Berita</a>
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
        <div class="card-columns">


            <?php foreach ($berita as $b) :  ?>
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="/images/berita/<?= $b['sampul']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><?= $b['judul']; ?></p>
                            </div>

                            <a href="/berita/<?= $b['slug']; ?>" class="btn btn-primary"> Detail</a>

                            <form action="/berita/<?= $b['id_berita']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>


                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="/berita/edit/<?= $b['slug']; ?>" class="btn btn-success"> Edit</a>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <?= $this->endSection(); ?>