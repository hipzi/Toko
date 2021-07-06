<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>
<div class="right_col booking" role="main">
		<div class="col-md-12 col-sm-12">
            <div class="card">
			    <div class="card-header">Data Siswa</div>
			        <div class="card-body">
                        <a href="<?php echo base_url(); ?>siswa/create" class="btn btn-success">Create</a>
                        <br/>
                        <br/>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Telp</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                                
                            </table>
			        </div>
		        </div>
            </div>
        </div>
</div>
<?= $this->endSection('content'); ?>