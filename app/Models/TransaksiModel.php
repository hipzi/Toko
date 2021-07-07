<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class TransaksiModel extends Model
{
	// protected $DBGroup              = 'default';
	protected $table                = 'transaksi';
	protected $primaryKey           = 'id';
	// protected $useAutoIncrement     = true;
	// protected $insertID             = 0;
	protected $returnType           = 'object';
	// protected $useSoftDeletes       = false;
	// protected $protectFields        = true;
	protected $allowedFields        = ['id_produk',"id_users","status",'jumlah','bukti_pembayaran'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function wishlist($id_produk)
	{
		$db = Database::connect();
		$builder = $db->table($this->table);

		$kondisi = array(
			'id_produk' => $id_produk,
			'id_users' => session()->get('id'),
			'status' => 1
		);

		$builder->where($kondisi);
		$result = $builder->countAllResults();

		if ( $result > 0 ) 
		{
			$this->where($kondisi)->delete();
		} 
		else 
		{
			$this->insert([
				'id_produk' => $id_produk,
				'id_users' => session()->get('id'),
				'status' => 1,
				'jumlah' => 1,
			]);
		}
	}

	public function getCart()
    {
        return $this->db->table('transaksi')
        ->select('transaksi.id as idTransaksi')
		->select('transaksi.jumlah as jmlTransaksi')
		->select('transaksi.*')
		->select('users.id as idUser')
		->select('users.nama as namaUser')
		->select('users.*')
		->select('produk.id as idProduk')
		->select('produk.nama as namaProduk')
		->select('produk.jumlah as jmlProduk')
		->select('produk.*')
		->join('users','users.id=transaksi.id_users')
        ->join('produk', 'produk.id=transaksi.id_produk')
		->where('users.id', session()->get('id'))
        ->get()->getResultArray();  
    }	

}
