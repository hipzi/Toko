<?= $this->extend('layout/toko'); ?>

<?= $this->section('content'); ?>
<!-- Start Cart Panel -->
<div class="shopping__cart">
    <div class="shopping__cart__inner">
        <div class="offsetmenu__close__btn">
            <a href="#"><i class="zmdi zmdi-close"></i></a>
        </div>
        <div class="shp__cart__wrap">
            <div class="shp__single__product">
                <div class="shp__pro__thumb">
                    <a href="#">
                        <img src="images/product/sm-img/1.jpg" alt="product images">
                    </a>
                </div>
                <div class="shp__pro__details">
                    <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                    <span class="quantity">QTY: 1</span>
                    <span class="shp__price">$105.00</span>
                </div>
                <div class="remove__btn">
                    <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                </div>
            </div>
            <div class="shp__single__product">
                <div class="shp__pro__thumb">
                    <a href="#">
                        <img src="images/product/sm-img/2.jpg" alt="product images">
                    </a>
                </div>
                <div class="shp__pro__details">
                    <h2><a href="product-details.html">Brone Candle</a></h2>
                    <span class="quantity">QTY: 1</span>
                    <span class="shp__price">$25.00</span>
                </div>
                <div class="remove__btn">
                    <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                </div>
            </div>
        </div>
        <ul class="shoping__total">
            <li class="subtotal">Subtotal:</li>
            <li class="total__price">$130.00</li>
        </ul>
        <ul class="shopping__btn">
            <li><a href="cart.html">View Cart</a></li>
            <li class="shp__checkout"><a href="<?php echo base_url('/checkout');?>">Checkout</a></li>
        </ul>
    </div>
</div>
<!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
<div class="ht__bradcaump__wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Cart</h2>
                    <nav class="bradcaump-inner">
                        <a class="breadcrumb-item" href="index.html">Home</a>
                        <span class="brd-separetor">/</span>
                        <span class="breadcrumb-item active">Cart</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--120 bg__white">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <form action="#">               
                <div class="table-content table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total_harga = 0;
                        $items = array();  
                        foreach ($cart as $row) {
                        ?>
                            <tr>
                                <td class="product-thumbnail"><a href="#"><img width="270px" height="270px" src="<?= base_url() . "/uploads/foto/" . $row['foto']; ?>" alt="product images"></a></td>
                                <td class="product-name"><a href="#"><?=$row['namaProduk'];?></a></td>
                                <td class="product-price"><span class="amount"><?=$row['harga'];?></span></td>
                                <td class="product-quantity"><input type="number" name="jumlah" value="<?= $row['jmlTransaksi']; ?>"/>
                                    <br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Ubah</button>
                                    <!-- <a href="#" type="button" class="btn btn-success btn-md" class="btn btn-info" style="font-size: 10pt;" data-toggle="modal" data-target="#myModal<?php echo $row['idTransaksi']; ?>">Ubah</a> -->
                                </td>
                                <td class="product-subtotal"><?=$harga_perbarang = $row['jmlTransaksi']*$row['harga'];?></td>
                                <td class="product-remove"><a href="<?= base_url("/buyer/delete/" . $row['idTransaksi']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">X</a></td>          
                                </tr>
                        <?php
                        $total_harga += $harga_perbarang;
                        $items[] = $row['idTransaksi'];
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="cart_totals">
                            <h2>Cart Totals</h2>
                            <br>
                            <table>
                                <tbody>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">
                                            <?php
                                            echo $total_harga;
                                            ?>
                                            </span></strong>
                                        </td>
                                    </tr>                                           
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="<?= base_url("/buyer/checkout/". json_encode($items)); ?>"> Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>
</div>

    <!-- Modal Edit Product-->
    <form action="<?= base_url("/buyer/change_quantity/". $row['idTransaksi']); ?>" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="padding-top:10px;">Edit Jumlah Produk : <?=$row['namaProduk'];?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-20px;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Jumlah Produk</label>
                    <input type="number" class="form-control jml_name" name="jumlah" placeholder="Product Name" value="<?=$row['jmlTransaksi'];?>">
                </div>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

<!-- cart-main-area end -->
<?= $this->endSection('content'); ?>