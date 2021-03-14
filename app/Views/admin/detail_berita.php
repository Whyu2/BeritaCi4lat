<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content_admin'); ?>



<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card-header  " style="width: 50rem;">
                        <img class=" card-img-top" src="/images/berita/<?= $berita['sampul']; ?>" alt="Card image cap" width="50%">
                    </div>

                    <div class="card-body">

                        <p class="card-text"><b>Judul : <?= $berita['judul']; ?> </b></p>
                        <p class="card-text"><b>Kategori : <?= $kategori['nama_kategori']; ?> </b></p>
                        <p class="card-text"><b>Pengirim : <?= $berita['pengirim']; ?> </b></p>
                        <p class="card-text"><b>Isi :</b><br> <?= $berita['isi']; ?></p>

                    </div>



                </div>
            </div>
        </div>

        <!-- /.row -->
        <!-- Main row -->



        <!-- jQuery -->

        <?= $this->endSection(); ?>