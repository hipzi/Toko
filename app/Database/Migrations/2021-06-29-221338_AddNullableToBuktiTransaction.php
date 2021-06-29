<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNullableToBuktiTransaction extends Migration
{
	public function up()
	{
		$fields = [
			'bukti_pembayaran' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'null'       	 => true,
			],
		];
		$this->forge->modifyColumn('transaksi', $fields);
	}

	public function down()
	{
		//
	}
}
