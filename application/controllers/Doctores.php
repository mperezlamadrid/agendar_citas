<?php
class Doctores extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Doctores_model');
  }

	public function index(){
		$this->load->helper('url');

		$data['title'] = 'Medicos';

		$this->load->view('templates/header', $data);
    $this->load->view('doctores/index');
    $this->load->view('templates/footer');
	}

	public function all(){
		$this->load->helper('url');

		$data['doctores'] = $this->Doctores_model->get_doctores();
		$data['title'] = 'Todos los Doctores';

		$this->load->view('templates/header', $data);
    $this->load->view('doctores/all', $data);
    $this->load->view('templates/footer');
	}
}
