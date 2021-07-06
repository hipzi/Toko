<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class AdminController extends BaseController
{
	public function __construct()
    {
        if (session()->get('role') != 'Penjual') {
            echo 'Access denied';
            exit;
        }
        $this->produk = new ProdukModel();
    }
	public function index()
	{
		return view("layout/admin");
	}
    public function create()
    {
        $data['produk'] = $this->produk->findAll();
        return view('admin/create', $data);
    }
    public function formCreate()
    {
        return view('admin/formCreate');
    }

    public function save()
	{
		if (!$this->validate([
			'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'foto' => [
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
            return redirect()->back()->withInput();
        }

        $this->produk->insert([
			'nama' => $this->request->getVar('nama'),
            'foto' => $this->request->getVar('foto'),
			'jumlah' => $this->request->getVar('jumlah'),
			'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        session()->setFlashdata('message', 'Tambah Data produk Berhasil');
        return redirect()->to('/seller/create');
	}

    function delete($id)
    {
        $dataProduk = $this->produk->find($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produk Tidak ditemukan !');
        }
        $this->produkk->delete($id);
        session()->setFlashdata('message', 'Delete Data  Produk Berhasil');
        return redirect()->to('/seller');
    }
}
