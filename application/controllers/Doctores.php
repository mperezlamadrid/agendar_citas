<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");
class Doctores extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Doctores_model');
  }

	public function index(){
		$doctores = $this->Doctores_model->listar();

		$this->load->view("templates/header", array(
			"title" => "Listado de Doctores"
		));

		$this->load->view("doctores/listado", array(
			"doctores" => $doctores
		));

		$this->load->view("templates/footer");
	}

	public function crear(){
		$this->load->view("templates/header", array(
			"title" => "Listado de Doctores"
		));

		$doctor = new stdClass();

		$doctor->nombre = "";
		$doctor->apellido = "";
		$doctor->direccion = "";
		$doctor->cedula = "";
		$doctor->especialidad = "";
		$doctor->id = false;

		$datos = array( "usu"=> $doctor );

		$this->load->view('doctores/formulario', $datos);

		$this->load->view("templates/footer");
  }

	public function editar($id="0"){
		if ($id == 0){
	    show_404();
		}else{
			$datos["usu"] = $this->Doctores_model->cargar($id);

			$this->load->view("templates/header", array(
				"title" => "Listado de Doctores"
			));

	    $this->load->view('doctores/formulario', $datos);

	    $this->load->view("templates/footer");
		}
  }

	public function guardar(){
    $nombre=$this->input->post("nombre");
    $apellido=$this->input->post("apellido");
    $direccion=$this->input->post("direccion");
		$cedula=$this->input->post("cedula");
		$especialidad=$this->input->post("especialidad");
    $id=$this->input->post("id");

    if($id == false){
  		$resultado=$this->Doctores_model->guardar(
	      $nombre,
	      $apellido,
	      $direccion,
				$cedula,
				$especialidad
    	);
    }else{
      $resultado=$this->Doctores_model->actualizar(
        $id,
        $nombre,
        $apellido,
				$direccion,
				$cedula,
				$especialidad
    	);
    }

    //listado
    $this->load->view("templates/header", array(
			"title" => "Listado de Doctores"
		));

    $doctores = $this->Doctores_model->listar();

    $this->load->view('doctores/listado', array(
      "doctores"=>$doctores,
      "resultado"=>$resultado
    ));

		$this->load->view("templates/footer");
  }

	function eliminar() {
		$u = $this->uri->segment(3);
		$this->Doctores_model->eliminar($u);
		redirect('/doctores/index');
	}
}
