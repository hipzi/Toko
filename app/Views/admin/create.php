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
                                <?php
                                    $no  = 1;
                                    foreach ($produk as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><img width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/foto/" . $row->foto; ?>"></td>
                                            <td><?= $row->jumlah; ?></td>
                                            <td><?= $row->harga; ?></td>
                                            <td><?= $row->keterangan; ?></td>
                                            <td>
                                                <a title="Edit" href="<?= base_url("/seller/edit/$row->id"); ?>" class="btn btn-info"><i style="font-size: 11pt;" class="fa fa-pencil"></i></a>
                                                <a title="Delete" href="<?= base_url("/seller/delete/$row->id") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i style="font-size: 11pt;" class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                            </table>
			        </div>
		        </div>
            </div>
        </div>
</div>
<?= $this->endSection('content'); ?>