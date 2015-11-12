<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");
class Citas extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Citas_model');
		$this->load->model('Doctores_model');
		$this->load->model('Pacientes_model');
  }

	public function index(){
		$citas = $this->Citas_model->listar();

		$this->load->view("templates/header", array(
			"title" => "Listado de Citas"
		));

		$this->load->view("citas/listado", array(
			"citas" => $citas
		));

		$this->load->view("templates/footer");
	}

	public function crear(){
		$this->load->view("templates/header", array(
			"title" => "Listado de Citas"
		));

		$cita = new stdClass();

		$cita->fecha = "";
		$cita->hora = "";
		$cita->doctor_id = "";
		$cita->paciente_id = "";
		$cita->id = false;

		$doctores = $this->Doctores_model->listar();
		$pacientes = $this->Pacientes_model->listar();

		$datos = array( "usu"=> $cita, 'doctores'=>$doctores, 'pacientes'=>$pacientes );

		$this->load->view('citas/formulario', $datos);

		$this->load->view("templates/footer");
  }

	public function editar($id="0"){
		if ($id == 0){
	    show_404();
		}else{
			$datos["usu"] = $this->Citas_model->cargar($id);
			$datos['doctores'] = $this->Doctores_model->listar();
			$datos['pacientes'] = $this->Pacientes_model->listar();

			$this->load->view("templates/header", array(
				"title" => "Listado de Citas"
			));

	    $this->load->view('citas/formulario', $datos);

	    $this->load->view("templates/footer");
		}
  }

	public function guardar(){
    $fecha=$this->input->post("fecha");
    $hora=$this->input->post("hora");
    $doctor_id=$this->input->post("doctor_id");
		$paciente_id=$this->input->post("paciente_id");
    $id=$this->input->post("id");

    if($id==false){
  		$resultado=$this->Citas_model->guardar(
	      $fecha,
	      $hora,
	      $doctor_id,
				$paciente_id
    	);
    }else{
      $resultado=$this->Citas_model->actualizar(
				$fecha,
				$hora,
				$doctor_id,
				$paciente_id
    	);
    }

    //listado
    $this->load->view("templates/header", array(
			"title" => "Listado de Citas"
		));

    $citas = $this->Citas_model->listar();

    $this->load->view('citas/listado', array(
      "citas"=>$citas,
      "resultado"=>$resultado
    ));

		$this->load->view("templates/footer");
  }

	public function eliminar() {
		$u = $this->uri->segment(3);
		$this->Citas_model->eliminar($u);
		redirect('/citas/index');
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
