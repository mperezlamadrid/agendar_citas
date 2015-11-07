<?php
class Pacientes extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Pacientes_model');
  }

	public function index(){
		$this->load->helper('url');

		$data['title'] = 'Pacientes';

		$this->load->view('templates/header', $data);
    $this->load->view('pacientes/index', $data);
    $this->load->view('templates/footer');
	}

	public function all(){
		$this->load->helper('url');

		$data['pacientes'] = $this->Pacientes_model->get_pacientes();
		$data['title'] = 'Todos los pacientes';

		$this->load->view('templates/header', $data);
    $this->load->view('pacientes/all', $data);
    $this->load->view('templates/footer');
	}

	public function nuevo(){
		$this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');

    $data['title'] = "Crear Nuevo Paciente";

    $this->form_validation->set_rules('nombre', 'Nombre', 'required');
    $this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required');
		$this->form_validation->set_rules('cedula', 'Cedula', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('pacientes/nuevo');
      $this->load->view('templates/footer');
    }else{
      $this->Pacientes_model->set_paciente();
      redirect('/pacientes');
    }
	}
}
