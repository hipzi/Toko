<?= $this->extend('layout/toko'); ?>

<?= $this->section('content'); ?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../images/bg/2.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Shop</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Shop</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area --> 
<!-- Start Our Product Area -->
<section class="htc__product__area shop__page ptb--130 bg__white">
    <div class="container">
        <div class="htc__product__container">
            <!-- Start Product MEnu -->
            <div class="row">
                <div class="col-md-12">
                    <div class="filter__menu__container">
                        <div class="product__menu">
                            <button data-filter="*"  class="is-checked">All</button>
                            <a href="<?php echo base_url('/user/logout');?>">Logout</a>
                        </div>
                        <div class="filter__box">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Filter Menu -->
            <div class="filter__wrap">
                <div class="filter__cart">
                    <div class="filter__cart__inner">
                        <div class="filter__menu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        <div class="filter__content">
                            <!-- Start Single Content -->
                            <div class="fiter__content__inner">
                                <div class="single__filter">
                                    <h2>Sort By</h2>
                                    <ul class="filter__list">
                                        <li><a href="#default">Default</a></li>
                                        <li><a href="#accessories">Accessories</a></li>
                                        <li><a href="#bags">Bags</a></li>
                                        <li><a href="#chair">Chair</a></li>
                                        <li><a href="#decoration">Decoration</a></li>
                                        <li><a href="#fashion">Fashion</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Size</h2>
                                    <ul class="filter__list">
                                        <li><a href="#xxl">XXL</a></li>
                                        <li><a href="#xl">XL</a></li>
                                        <li><a href="#x">X</a></li>
                                        <li><a href="#l">L</a></li>
                                        <li><a href="#m">M</a></li>
                                        <li><a href="#s">S</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Tags</h2>
                                    <ul class="filter__list">
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Bags</a></li>
                                        <li><a href="#">Chair</a></li>
                                        <li><a href="#">Decoration</a></li>
                                        <li><a href="#">Fashion</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Price</h2>
                                    <ul class="filter__list">
                                        <li><a href="#">$0.00 - $50.00</a></li>
                                        <li><a href="#">$50.00 - $100.00</a></li>
                                        <li><a href="#">$100.00 - $150.00</a></li>
                                        <li><a href="#">$150.00 - $200.00</a></li>
                                        <li><a href="#">$300.00 - $500.00</a></li>
                                        <li><a href="#">$500.00 - $700.00</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Color</h2>
                                    <ul class="filter__list sidebar__list">
                                        <li class="black"><a href="#"><i class="zmdi zmdi-circle"></i>Black</a></li>
                                        <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i>Blue</a></li>
                                        <li class="brown"><a href="#"><i class="zmdi zmdi-circle"></i>Brown</a></li>
                                        <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i>Red</a></li>
                                        <li class="orange"><a href="#"><i class="zmdi zmdi-circle"></i>Orange</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Filter Menu -->
            <!-- End Product MEnu -->
            <div class="row">
                <div class="product__list another-product-style">
                    <!-- Start Single Product -->
                    <?php
                    foreach ($produk as $row) {
                    ?>
                    <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                        <div class="product foo">
                            <div class="product__inner">
                                <div class="pro__thumb">
                                    <a href="#">
                                        <img width="270px" height="270px" src="<?= base_url() . "/uploads/foto/" . $row->foto; ?>" alt="product images">
                                        <!-- <img src="images/product/1.png" alt="product images"> -->
                                    </a>
                                </div>
                                <div class="product__hover__info">
                                    <!-- <ul class="product__action"> -->
                                        <!-- <div class="mb-3 hidden" id="<?= $row->id; ?>"></div> -->
                                        <!-- <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li> -->
                                        <form method="post" action="<?= base_url('/buyer/add_cart') ?>">
                                            <?= csrf_field(); ?>
                                            <!-- <li><a title="Add TO Cart" href="<?php //echo base_url('/buyer/cart');?>"><span class="ti-shopping-cart"></span> -->
                                            <li><a title="Add TO Cart">
                                                <!-- <span class="ti-shopping-cart"></span> -->
                                                <input type="hidden" id="id_produk" name="id_produk" value="<?= $row->id; ?>" />
                                                <input type="hidden" id="id_users" name="id_users" value="<?= $get_session_id; ?>" />
                                                <input type="hidden" id="status" name="status" value="1" />
                                                <input type="hidden" id="jumlah" name="jumlah" value="1" />
                                                <input type="submit" value="Add to Cart" style="margin-top:-20px;z-index:99;padding:10px;border-radius: 5px;border-color:transparent"/>
                                                <!-- style="display: none;" -->
                                            </a></li>
                                            <!-- <div class="form-group">
                                                <input type="submit" value="Simpan" class="btn btn-block" style="color:white; background-color:#d67f7d" />
                                            </div> -->
                                        </form>
                                        <!-- <li><a title="Wishlist" href="<?php //echo base_url('/wishlist');?>"><span class="ti-heart"></span></a></li> -->
                                    <!-- </ul> -->
                                </div>
                            </div>
                            <div class="product__details">
                                <h2><a href="product-details.html"><?= $row->nama; ?></a></h2>
                                <ul class="product__price">
                                    <!-- <li class="old__price"></li> -->
                                    <li class="new__price"><?= $row->harga; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- End Single Product -->
                </div>
            </div>
            <!-- Start Load More BTn -->
            <div class="row mt--60">
                <div class="col-md-12">
                    <div class="htc__loadmore__btn">
                        <a href="#">load more</a>
                    </div>
                </div>
            </div>
            <!-- End Load More BTn -->
        </div>
    </div>
</section>
<!-- End Our Product Area -->
<?= $this->endSection('content'); ?>

<?= $this->section('quickview-product'); ?>
<!-- QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__container" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <!-- Start product images -->
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="big images" src="images/product/big-img/1.jpg">
                            </div>
                        </div>
                        <!-- end product images -->
                        <div class="product-info">
                            <h1>Simple Fabric Bags</h1>
                            <div class="rating__and__review">
                                <ul class="rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <div class="review">
                                    <a href="#">4 customer reviews</a>
                                </div>
                            </div>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">$17.20</span>
                                    <span class="old-price">$45.00</span>
                                </div>
                            </div>
                            <div class="quick-desc">
                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                            </div>
                            <div class="addtocart-btn">
                                <a href="#">Add to cart</a>
                            </div>
                        </div><!-- .product-info -->
                    </div><!-- .modal-product -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
</div>

<?= $this->endSection('quickview-product'); ?>

<?= $this->section('script'); ?>

<?= $this->endSection('script'); ?>
