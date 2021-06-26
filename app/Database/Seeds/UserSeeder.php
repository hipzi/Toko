<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama'          =>  'Anton Wibowo',
				'username'      =>  'tonton',
				'role'          =>  'Penjual',
				'email'         =>  'tonton123@gmail.com',
				'no_hp'       	=>  '081234555678',
				'alamat'		=>  'Jl. Mawar Putih No. 190, Waru Sidoarjo',
				'password'		=>  password_hash('password', PASSWORD_BCRYPT),
				'created_at' 	=> 	Time::now(),
				'updated_at' 	=> 	Time::now()
			]
		];
		$this->db->table('users')->insertBatch($data);
	}
}
