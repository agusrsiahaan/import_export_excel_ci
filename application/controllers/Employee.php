<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Employee_model', 'm');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		// load view
		$this->load->view('employee/index');
	}

	public function showAllEmployee()
	{
		$this->db->order_by('id', 'desc');
		$result = $this->m->showAllEmployee();
		echo json_encode($result);
	}

	public function addEmployee()
	{
		$result = $this->m->addEmployee();
		$msg['success']	= false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editEmployee()
	{
		$result = $this->m->editEmployee();
		echo json_encode($result);
	}

	public function updateEmployee()
	{
		$result = $this->m->updateEmployee();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteEmployee()
	{
		$result = $this->m->deleteEmployee();
		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

}
