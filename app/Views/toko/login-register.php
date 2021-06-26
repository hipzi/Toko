<?= $this->extend('layout/toko'); ?>

<?= $this->section('content'); ?>
<!-- Start Login Register Area -->
<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <?php if (isset($validation)) : ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form class="login" method="post" action="<?= base_url('/user/data_login') ?>">
                            <?= csrf_field(); ?>
                            <input type="text" placeholder="Username*" id="username" name="username" value="<?= old('username'); ?>">
                            <input type="password" placeholder="Password*" id="password" name="password">
                        
                            <div class="htc__login__btn mt--30">
                                <a>
                                <input type="submit" value="Login" style="border-style: none;"/>
                                </a>
                            </div>

                        </form>
                    </div>
                    <!-- End Single Content -->
                    
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form class="login" method="post" action="<?= base_url('/user/data_register') ?>">
                            <?= csrf_field(); ?> 
                            <input type="text" placeholder="Nama*" id="nama" name="nama" value="<?= old('nama'); ?>">
                            <input type="text" placeholder="Username*" id="username" name="username" value="<?= old('username'); ?>">
                            <input type="email" placeholder="Email*" id="email" name="email" value="<?= old('email'); ?>">
                            <input type="text" placeholder="No Hp*" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>">
                            <input type="text" placeholder="Alamat*" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                            <input type="password" placeholder="Password*" id="password" name="password">

                            <div class="htc__login__btn">
                                <a>
                                <input type="submit" value="Register" style="border-style: none"/>
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>
<!-- End Login Register Area -->
<?= $this->endSection('content'); ?>