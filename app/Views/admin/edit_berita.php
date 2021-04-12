<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content_admin'); ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Masukkan Berita</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/admin/save" method="post" enctype="multipart/form-data">

                <div class="card-body">
                    <div class="input-group-prepend">

                        <img src="/images/berita/default.png" class="img-thumbnail img-preview"><br>
                    </div>
                    <label for="exampleInputEmail1">Masukkan Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                        <?= $validation->getError('sampul'); ?><p class="help-block"></p>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">judul</label>
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" placeholder="Judul" name="judul" value="<?= (old('judul')) ? old('judul') : $berita['judul'] ?>">
                        <?= $validation->getError('judul'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">id_kategori</label>
                        <select class="form-control" name="id_kategori">
                            <?php foreach ($kategori as $ka) :  ?>
                                <option value="<?= $ka['id_kategori']; ?>"><?= $ka['nama_kategori']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Isi</label>
                        <input type="text" class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" id="Isi" placeholder="Isi" name="isi" value="<?= (old('isi')) ? old('isi') : $berita['isi'] ?>">
                        <?= $validation->getError('isi'); ?>
                    </div>
                    <div class="form-group">

                        <label for="exampleInputPassword1">Pengirim</label>
                        <input type="text" class="form-control <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" id="Pengirim" placeholder="Pengirim" name="pengirim" value="<?= session()->get('name') ?>">
                        <?= $validation->getError('pengirim'); ?>
                    </div>

                    <!-- <div class="form-group">
                                    <label for="exampleInputFile">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div> -->

                </div>
                <!-- /.card-body -->


                <!-- jQuery -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <?= $this->endSection(); ?>