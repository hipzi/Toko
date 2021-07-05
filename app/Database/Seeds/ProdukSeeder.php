<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProdukSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama'          =>  'lorem_ipsum',
				'foto'      =>  '\images\product\1.png',
				'jumlah'          =>  '100',
				'harga'         =>  '10000',
				'keterangan'       	=>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id condimentum turpis. ',
				'created_at' 	=> 	Time::now(),
				'updated_at' 	=> 	Time::now()
			]
		];
		for ($i=0; $i < 5; $i++) { 
			$this->db->table('produk')->insertBatch($data);

		}
	}
}
