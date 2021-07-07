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
        $this->produk = new ProdukModel();
        $this->transaksi = new TransaksiModel();
    }

    private $session = null;
	public function index()
	{
        $this->session = session();
        $data['get_session_id'] = $this->session->get('id');
        $data['produk'] = $this->produk->findAll();
        return view('toko/shop', $data);
	}
    public function cart()
	{
        return view('toko/cart');
		// return view("toko/shop");
	}

    public function add_cart()
	{

        $this->transaksi->insert([
			'id_produk' => $this->request->getVar('id_produk'),
            'id_users' => $this->request->getVar('id_users'),
			'status' => $this->request->getVar('status'),
			'jumlah' => $this->request->getVar('jumlah')
        ]);
        session()->setFlashdata('message', 'Berhasil Memasukan Produk ke Keranjang');
        return redirect()->to('/buyer/cart');
	}
}
