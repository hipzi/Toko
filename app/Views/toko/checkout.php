<?= $this->extend('layout/toko'); ?>

<?= $this->section('content'); ?>
<!-- Start Checkout Area -->
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="ckeckout-left-sidebar">
                    <!-- Start Checkbox Area -->
                    <div class="checkout-form">
                        <h2 class="section-title-3">Bukti Pembayaran</h2>
                        <div class="checkout-form-inner">
                        <form method="post" action="<?= base_url('/buyer/bukti_pembayaran/' . json_encode($id_transaksi)) ?>" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="bukti_pembayaran" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" value="<?= old('bukti_pembayaran'); ?>">
                            </div>
                            <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-outline-dark" style="color:white; background-color:#d67f7d" />
                        </div>
                        </form>
                            
                        </div>
                    </div>
                    <!-- End Checkbox Area -->
                    <!-- Start Payment Box -->
                    
                    <!-- End Payment Box -->
                    <!-- Start Payment Way -->
                    
                    <!-- End Payment Way -->
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- End Checkout Area -->
<?= $this->endSection('content'); ?>