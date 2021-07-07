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
        $data['cart'] = $this->transaksi->getCart();
        return view('toko/cart', $data);
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

    public function change_quantity($id)
	{
        $this->transaksi->update($id, [
			'jumlah' => $this->request->getVar('jumlah')
        ]);
        session()->setFlashdata('message', 'Update Jumlah Produk Berhasil');
        return redirect()->to('/buyer/cart');
	}

    public function checkout($items)
	{
        $data['id_transaksi'] = json_decode($items);
        return view('toko/checkout', $data);
	}

    public function bukti_pembayaran($items)
	{
        $data['id_transaksi'] = json_decode($items);
        $foto = new TransaksiModel();
		$datafoto = $this->request->getFile('bukti_pembayaran');
		$filename = $datafoto->getRandomName();
        foreach ($data['id_transaksi'] as $row) {
            $int_row = (int)$row;
            $this->transaksi->update($int_row, [
                'bukti_pembayaran' => $filename
            ]);
        }
        $datafoto->move('uploads/bukti/', $filename);
        session()->setFlashdata('message', 'Berhasil mengupload bukti pembayaran');
        return redirect()->to('/');
	}

    public function delete($id)
    {
        $dataTransaksi = $this->transaksi->find($id);
        if (empty($dataTransaksi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Transaksi Tidak ditemukan !');
        }
        $this->transaksi->delete($id);
        session()->setFlashdata('message', 'Delete Data  Transaksi Berhasil');
        return redirect()->to('/buyer/cart');
    }
}
