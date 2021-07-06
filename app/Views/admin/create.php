<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>
<div class="right_col booking" role="main">
		<div class="col-md-12 col-sm-12">
            <div class="card">
			    <div class="card-header" style="font-size:15px;" >Produk</div>

			        <div class="card-body">
                        <a href="<?php echo base_url(); ?>/seller/formCreate" class="btn btn-success">Tambah</a>
                        <br/>
                        <br/>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                                
                            </table>
			        </div>
		        </div>
            </div>
        </div>
</div>
<?= $this->endSection('content'); ?>