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

//
// class Ccrud extends CI_Controller {
//
// 	public function index()
// 	{
// 		$data['data_get'] = $this->mcrud->view();
// 		$this->load->view('header');
// 		$this->load->view('vcrud', $data);
// 		$this->load->view('footer');
// 	}
// 	function add() {
// 		$this->load->view('header');
// 		$this->load->view('vcrudnew');
// 		$this->load->view('footer');
// 	}
// 	function edit() {
// 		$kd = $this->uri->segment(3);
// 		if ($kd == NULL) {
// 			redirect('ccrud');
// 		}
// 		$dt = $this->mcrud->edit($kd);
// 		$data['fn'] = $dt->firstname;
// 		$data['ln'] = $dt->lastname;
// 		$data['ag'] = $dt->age;
// 		$data['ad'] = $dt->address;
// 		$data['id'] = $kd;
// 		$this->load->view('header');
// 		$this->load->view('vcrudedit', $data);
// 		$this->load->view('footer');
// 	}
// 	function delete() {
// 		$u = $this->uri->segment(3);
// 		$this->mcrud->delete($u);
// 		redirect('ccrud');
// 	}
// 	function save() {
// 		if ($this->input->post('mit')) {
// 			$this->mcrud->add();
// 			redirect('ccrud');
// 		} else{
// 			redirect('ccrud/tambah');
// 		}
// 	}
// 	function update() {
// 		if ($this->input->post('mit')) {
// 			$id = $this->input->post('id');
// 			$this->mcrud->update($id);
// 			redirect('ccrud');
// 		} else{
// 			redirect('ccrud/edit/'.$id);
// 		}
// 	}
// }
