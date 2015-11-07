<?php
class Doctores_model extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function get_doctores(){
    $query = $this->db->get('doctores');
    return $query->result_array();
  }

  public function get_doctores_by_id($id){
    $query = $this->db->from('doctores')->where('id', $id)->limit(1)->get();
    return $query->result_array()[0];
  }
}
