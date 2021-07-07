<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>
<div class="right_col booking" role="main">
		<div class="col-md-12 col-sm-12">

<div class="container">
            <div class="section-heading" >
                <div class="line-dec"></div>
            </div>
            <div class="card">
            <div class="card-header" style="font-size:15px;" >Tambah Produk</div>
                <div class="card-body" style="color:black">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url('/seller/update/' . $produk->id) ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk->nama; ?>">
                        </div>

                        <div class="form-group">
                            <label for="foto" class="form-label">Foto</label>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <img src="<?= base_url('uploads/foto/' . $produk->foto) ?>" id="foto" width="400px">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    Ubah Foto<input type="file" name="foto" class="form-control" id="foto" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $produk->jumlah; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $produk->harga; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea style="resize: none;" class="form-control" name="keterangan" id="keterangan"><?= $produk->keterangan; ?></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-block" style="color:white; background-color:#3b413c" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
</div>
<?= $this->endSection('content'); ?>