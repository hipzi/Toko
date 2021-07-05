<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('toko/homepage');
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
