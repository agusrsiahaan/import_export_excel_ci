<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function showAllEmployee()
	{
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function addEmployee()
	{
		$field = array(
			'username'=>$this->input->post('username'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'gender'=>$this->input->post('gender')
		);

		$this->db->insert('users', $field);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editEmployee()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateEmployee()
	{
		$id = $this->input->post('txtId');
		$field = array(
			'username'=>$this->input->post('username'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'gender'=>$this->input->post('gender')
		);
		$this->db->where('id', $id);
		$this->db->update('users', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteEmployee()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('users');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
    
}