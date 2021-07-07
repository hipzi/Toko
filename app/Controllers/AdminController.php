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
				'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
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
        $foto = new ProdukModel();

        $this->produk->insert([
			'nama' => $this->request->getVar('nama'),
            $datafoto = $this->request->getFile('foto'),
            $filename = $datafoto->getRandomName(),
            'foto' => $filename,
			'jumlah' => $this->request->getVar('jumlah'),
			'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        $datafoto->move('uploads/foto/', $filename);
        session()->setFlashdata('message', 'Tambah Data produk Berhasil');
        return redirect()->to('/seller/create');
	}

    function edit($id)
    {
        $dataProduk = $this->produk->find($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produk Tidak ditemukan !');
        }
        $data['produk'] = $dataProduk;
        return view('admin/edit', $data);
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

    function delete($id)
    {
        $dataProduk = $this->produk->find($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produk Tidak ditemukan !');
        }
        $this->produk->delete($id);
        session()->setFlashdata('message', 'Delete Data  Produk Berhasil');
        return redirect()->to('/seller/create');
    }
}