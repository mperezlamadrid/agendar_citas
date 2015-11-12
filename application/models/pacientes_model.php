<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");
class Pacientes_model extends CI_Model{

  public function listar(){
		$this->db->select("id, nombre, apellido, direccion, cedula");
		$this->db->order_by("apellido ASC");
		$this->db->from("pacientes");
		$retorno = $this->db->get();

		return $retorno->result_array();
	}

  public function cargar($id){

		$this->db->select("id, nombre, apellido, direccion, cedula");
		$this->db->from("pacientes");
		$this->db->where("id",$id);
		$retorno = $this->db->get();

		return $retorno->row();

	}

  public function guardar($nombre, $apellido, $direccion, $cedula){

		$this->db->select("count(*) as cantidad");
		$this->db->from("pacientes");
		$this->db->where("cedula",$cedula);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->insert("pacientes",array(
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"direccion"=>$direccion,
        "cedula"=>$cedula
			));

			return true;

		}

		return false;

	}

  public function actualizar($id, $nombre, $apellido, $direccion, $cedula){

		$this->db->select("count(*) as cantidad");
		$this->db->from("pacientes");
		$this->db->where("cedula",$cedula);
		$this->db->where("id<>",$id);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->where("id",$id);
			$this->db->update("pacientes",array(
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"direccion"=>$direccion,
        "cedula"=>$cedula
			));

			return true;

		}

		return false;

	}

  public function eliminar($id){
		$this->db->where("id",$id);
		$this->db->delete("pacientes");
	}

  public function get_paciente_by_id($id){
    $query = $this->db->from('pacientes')->where('id', $id)->limit(1)->get();
    return $query->result_array()[0];
  }
}
