<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Tutor_model', 'm');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index(){

		// load view
		$this->load->view('index');
	}

	public function ambilData()
	{
		$dataUser = $this->m->ambilData('users')->result();
		echo json_encode($dataUser);
	}


}
