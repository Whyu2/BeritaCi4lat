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
        <div class="card-columns">

            <?php foreach ($berita as $b) :  ?>
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="/images/berita/<?= $b['sampul']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><?= $b['judul']; ?></p>
                            </div>
                        </div>
                        <a href="/berita/<?= $b['slug']; ?>" class="btn-lg btn-primary"> Detail</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <?= $this->endSection(); ?>