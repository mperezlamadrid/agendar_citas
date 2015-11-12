<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");
class Pacientes extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Pacientes_model');
  }

	public function index(){
		$pacientes = $this->Pacientes_model->listar();

		$this->load->view("templates/header", array(
			"title" => "Pacientes"
		));

		$this->load->view("pacientes/listado", array(
			"pacientes" => $pacientes
		));

		$this->load->view("templates/footer");
	}

	public function crear(){
		$this->load->view("templates/header", array(
			"title" => "Crear Paciente"
		));

		$paciente = new stdClass();

		$paciente->nombre = "";
		$paciente->apellido = "";
		$paciente->direccion = "";
		$paciente->cedula = "";
		$paciente->id = false;

		$datos = array( "usu"=> $paciente );

		$this->load->view('pacientes/formulario', $datos);

		$this->load->view("templates/footer");
  }

	public function editar($id="0"){
		if ($id == 0){
	    show_404();
		}else{
			$datos["usu"] = $this->Pacientes_model->cargar($id);

			$this->load->view("templates/header", array(
				"title" => "Editar Paciente"
			));

	    $this->load->view('pacientes/formulario', $datos);

	    $this->load->view("templates/footer");
		}
  }

	public function guardar(){
    $nombre=$this->input->post("nombre");
    $apellido=$this->input->post("apellido");
    $direccion=$this->input->post("direccion");
		$cedula=$this->input->post("cedula");
    $id=$this->input->post("id");

    if($id==false){
  		$resultado=$this->Pacientes_model->guardar(
	      $nombre,
	      $apellido,
	      $direccion,
				$cedula
    	);
    }else{
      $resultado=$this->Pacientes_model->actualizar(
        $id,
        $nombre,
        $apellido,
				$direccion,
				$cedula
    	);
    }

    //listado
    $this->load->view("templates/header", array(
			"title" => "Paciente Guardado"
		));

    $pacientes = $this->Pacientes_model->listar();

    $this->load->view('pacientes/listado', array(
      "pacientes"=>$pacientes,
      "resultado"=>$resultado
    ));

		$this->load->view("templates/footer");
  }

	function eliminar() {
		$u = $this->uri->segment(3);
		$this->Pacientes_model->eliminar($u);
		redirect('/pacientes/index');
	}
}
