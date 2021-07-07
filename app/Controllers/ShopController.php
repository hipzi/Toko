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

    public function update($id)
    {
        if (!$this->validate([
			'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
			'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
			'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        
        if (filesize($this->request->getFile('foto')) == false){ 
            $this->produk->update($id, [
                'nama' => $this->request->getVar('nama'),
                'jumlah' => $this->request->getVar('jumlah'),
                'harga' => $this->request->getVar('harga'),
                'keterangan' => $this->request->getVar('keterangan')
            ]);
        } else {
            $this->produk->update($id, [
                'nama' => $this->request->getVar('nama'),
                $datafoto = $this->request->getFile('foto'),
                $filename = $datafoto->getRandomName(),
                'foto' => $filename,
                'jumlah' => $this->request->getVar('jumlah'),
                'harga' => $this->request->getVar('harga'),
                'keterangan' => $this->request->getVar('keterangan')
            ]);
            $datafoto->move('uploads/foto/', $filename);
        }
        session()->setFlashdata('message', 'Update Data Produk Berhasil');
        return redirect()->to('/seller/create');
    }
}
