<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");
class Citas_model extends CI_Model{

  public function listar(){
		$this->db->select("id, fecha, hora, doctor_id, paciente_id");
		$this->db->order_by("fecha ASC");
		$this->db->from("citas");
		$retorno = $this->db->get();

		return $retorno->result_array();
	}

  public function cargar($id){
		$this->db->select("id, fecha, hora, doctor_id, paciente_id");
		$this->db->from("citas");
		$this->db->where("id",$id);
		$retorno = $this->db->get();

		return $retorno->row();
	}

  public function guardar($fecha, $hora, $doctor_id, $paciente_id){
		$this->db->select("count(*) as cantidad");
		$this->db->from("citas");
		$this->db->where("doctor_id",$doctor_id);
    $this->db->where("fecha",$fecha);
    $this->db->where("hora",$hora);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->insert("citas",array(
				"fecha"=>$fecha,
				"hora"=>$hora,
				"doctor_id"=>$doctor_id,
        "paciente_id"=>$paciente_id
			));

			return true;

		}

		return false;

	}

  public function actualizar($id, $fecha, $hora, $doctor_id, $paciente_id){
		$this->db->select("count(*) as cantidad");
		$this->db->from("citas");
    $this->db->where("doctor_id",$doctor_id);
    $this->db->where("fecha",$fecha);
    $this->db->where("hora",$hora);
		$this->db->where("id<>",$id);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->where("id",$id);
			$this->db->update("citas",array(
				"fecha"=>$nombre,
				"hora"=>$apellido,
				"doctor_id"=>$doctor_id,
        "paciente_id"=>$paciente_id
			));

			return true;

		}

		return false;

	}

  public function eliminar($id){
		$this->db->where("id",$id);
		$this->db->delete("citas");
	}
}
