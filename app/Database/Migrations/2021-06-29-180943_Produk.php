<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'foto'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'jumlah'          => [
				'type'           => 'INT',
				'unsigned'       => true,
			],
			'harga'          => [
				'type'           => 'INT',
				'unsigned'       => true,
			],
			'keterangan'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '250',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]

		]);
		$this->forge->addPrimaryKey('id', true);
		
		$this->forge->createTable('produk',true);
	}

	public function down()
	{
		$this->forge->dropTable('produk',true);
	}
}
