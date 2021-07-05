<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
		return view("toko/shop");
	}
}
