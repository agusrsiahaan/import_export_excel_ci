<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tutor_model extends CI_Model {

	function ambilData($table)
	{
		return $this->db->get($table);
	}

    
}