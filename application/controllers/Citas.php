<?php
class Citas extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Citas_model');
  }

	public function index(){
		$this->load->helper('url');

		$data['title'] = 'Citas';

		$this->load->view('templates/header', $data);
    $this->load->view('citas/index');
    $this->load->view('templates/footer');
	}

	public function all(){
		$this->load->helper('url');

		$data['citas'] = $this->Citas_model->get_citas();
		$data['title'] = 'Todos las Citas';

		$this->load->view('templates/header', $data);
    $this->load->view('citas/all', $data);
    $this->load->view('templates/footer');
	}

	public function get_data_doctor($doctor_id){
    $this->load->model('Doctores_model');

		$data['doctor'] = $this->Doctores_model->get_doctores_by_id($doctor_id);
    return $data['doctor']['nombre'].' '.$data['doctor']['apellido'];
  }

	public function get_data_paciente($paciente_id){
    $this->load->model('Pacientes_model');

		$data['paciente'] = $this->Pacientes_model->get_paciente_by_id($paciente_id);
    return $data['paciente']['nombre'].' '.$data['paciente']['apellido'];
  }
}
