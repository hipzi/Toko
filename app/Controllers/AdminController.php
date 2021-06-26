<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
	public function __construct()
    {
        if (session()->get('role') != 'Penjual') {
            echo 'Access denied';
            exit;
        }
    }
	public function index()
	{
		return view("layout/admin");
	}
}
