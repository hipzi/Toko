<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up()
	{
		try{
			$this->forge->addField([
				'id'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => true,
					'auto_increment' => true,
				],
				'id_produk'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => true,
				],
				'id_users'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => true,
				],
				'status'          => [
					'type'           => 'INT',
					'unsigned'       => true,
				],
				'jumlah'          => [
					'type'           => 'INT',
					'unsigned'       => true,
				],
				'bukti_pembayaran'    => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
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
	
			$this->forge->addForeignKey('id_produk','produk','id');
			$this->forge->addForeignKey('id_users','users','id');
			$this->forge->createTable('transaksi',true);
		}
		catch (\Exception $e){
			echo $e->getMessage();
		}
		
	}

	public function down()
	{
		$this->forge->createTable('transaksi',true);
	}
}
