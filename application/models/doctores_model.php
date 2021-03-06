<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");
class Doctores_model extends CI_Model{
  public function listar(){
		$this->db->select("id, nombre, apellido, direccion, cedula, especialidad");
		$this->db->order_by("apellido ASC");
		$this->db->from("doctores");
		$retorno = $this->db->get();

		return $retorno->result_array();
	}

  public function cargar($id){

		$this->db->select("id, nombre, apellido, direccion, cedula, especialidad");
		$this->db->from("doctores");
		$this->db->where("id",$id);
		$retorno = $this->db->get();

		return $retorno->row();

	}

  public function guardar($nombre, $apellido, $direccion, $cedula, $especialidad){

		$this->db->select("count(*) as cantidad");
		$this->db->from("doctores");
		$this->db->where("cedula",$cedula);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->insert("doctores",array(
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"direccion"=>$direccion,
        "cedula"=>$cedula,
        "especialidad"=>$especialidad
			));

			return true;

		}

		return false;

	}

  public function actualizar($id, $nombre, $apellido, $direccion, $cedula, $especialidad){

		$this->db->select("count(*) as cantidad");
		$this->db->from("pacientes");
		$this->db->where("cedula",$cedula);
		$this->db->where("id<>",$id);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->where("id",$id);
			$this->db->update("doctores",array(
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"direccion"=>$direccion,
        "cedula"=>$cedula,
        "especialidad"=>$especialidad
			));

			return true;

		}

		return false;

	}

  public function eliminar($id){
		$this->db->where("id",$id);
		$this->db->delete("doctores");
	}

  public function get_doctores_by_id($id){
    $query = $this->db->from('doctores')->where('id', $id)->limit(1)->get();
    return $query->result_array()[0];
  }
}
