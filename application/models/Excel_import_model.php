<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('CustomerID', 'DESC');
		$query = $this->db->get('customer');
		return $query;
	}

	function view(){
		return $this->db->get('customer')->result(); // Tampilkan semua data yang ada di tabel siswa
	}

	function insert($data)
	{
		$this->db->insert_batch('customer', $data);
	}
}