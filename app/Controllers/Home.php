<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('layout/toko');
	}

	public function login()
	{
		return view('toko/login-register');
	}

	public function shop()
	{
		return view('toko/shop');
	}

	public function cart()
	{
		return view('toko/cart');
	}

	public function wishlist()
	{
		return view('toko/wishlist');
	}
	
	public function checkout()
	{
		return view('toko/checkout');
	}
}
