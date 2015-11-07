<?php
class Pacientes_model extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function get_paciente_by_id($id){
    $query = $this->db->from('pacientes')->where('id', $id)->limit(1)->get();
    return $query->result_array()[0];
  }

  public function get_pacientes(){
    $query = $this->db->get('pacientes');
    return $query->result_array();
  }

  public function set_paciente(){
    $this->load->helper('url');
    // $this->load->library('session');

    // $slug = url_title($this->input->post('title'), 'dash', TRUE);
    $data = array(
      'nombre'=> $this->input->post('nombre'),
      'apellido'=> $this->input->post('apellido'),
      'direccion'=> $this->input->post('direccion'),
      'cedula'=> $this->input->post('cedula')
    );

    // $this->session->set_userdata('ultima_noticia', $data['title']);

    return $this->db->insert('pacientes', $data);
  }

}
