<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content_admin'); ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Masukkan Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/kategori/save" method="post" enctype="multipart/form-data">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Kategori</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_kategori')) ? 'is-invalid' : ''; ?>" id="Nama Kategori" placeholder="Nama Kategori" name="nama_kategori">
                        <?= $validation->getError('nama_kategori'); ?>
                    </div>

                </div>
                <!-- /.card-body -->
                <!-- jQuery -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <?= $this->endSection(); ?>