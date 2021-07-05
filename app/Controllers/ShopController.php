<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class ShopController extends BaseController
{
	public function __construct()
    {
        if (session()->get('role') != 'Pembeli') {
            echo 'Access denied';
            exit;
        }
    }
	public function index()
	{
        $produk = new ProdukModel();
        
        $data['produk'] = $produk->findAll();

		return view("toko/shop", $data);
	}

    public function wishlist($id_produk)
    {
        $transaksi = new TransaksiModel();
        $transaksi->wishlist($id_produk);

        return redirect()->to('/buyer/shop');

    }
}
