<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    protected $users;

    function __construct()
    {
        $this->users = new UsersModel();
    }

    public function register()
	{
		return view('toko/login-register');
	}

	public function data_register()
	{
		if (!$this->validate([
			'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
			'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
			'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->users->insert([
            'nama' => $this->request->getVar('nama'),
			'username' => $this->request->getVar('username'),
			'role' => 'Pembeli',
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
			'alamat' => $this->request->getVar('alamat'),
			'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ]);
        session()->setFlashdata('message', 'Registrasi Berhasil');
        return redirect()->to('/buyer/shop');
	}

    public function login()
	{
		return view('toko/login-register');
	}

    public function data_login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Username or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                return view('toko/login-register', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UsersModel();
                $user = $model->where('username', $this->request->getVar('username'))->first();
                $this->setUserSession($user);

                if($user['role'] == 'Penjual'){
                    return redirect()->to(base_url('/seller'));
                }elseif($user['role'] == 'Pembeli'){
                    return redirect()->to(base_url('/buyer/shop'));
                }
            }
        }
        return view('toko/login-register');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'nama' => $user['nama'],
            'username' => $user['username'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            'role' => $user['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
