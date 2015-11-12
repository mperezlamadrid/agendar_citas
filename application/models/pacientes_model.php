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


//
// <?php
// if (!defined('BASEPATH'))
// 	exit('No direct script access allowed');
//
// class Mcrud extends CI_Model {
//
// 	function add() {
// 		$fn = $this->input->post('fn');
// 		$ln = $this->input->post('ln');
// 		$ag = $this->input->post('ag');
// 		$ad = $this->input->post('ad');
// 		$data = array(
// 			'firstname' => $fn,
// 			'lastname' => $ln,
// 			'age' => $ag,
// 			'address' => $ad
// 		);
// 		$this->db->insert('crud', $data);
// 	}
// 	function view() {
// 		$ambil = $this->db->get('crud');
// 		if ($ambil->num_rows() > 0) {
// 			foreach ($ambil->result() as $data) {
// 				$hasil[] = $data;
// 			}
// 			return $hasil;
// 		}
// 	}
// 	function edit($a) {
// 		$d = $this->db->get_where('crud', array('idcrud' => $a))->row();
// 		return $d;
// 	}
// 	function delete($a) {
// 		$this->db->delete('crud', array('idcrud' => $a));
// 		return;
// 	}
// 	function update($id) {
// 		$fn = $this->input->post('fn');
// 		$ln = $this->input->post('ln');
// 		$ag = $this->input->post('ag');
// 		$ad = $this->input->post('ad');
// 		$data = array(
// 			'firstname' => $fn,
// 			'lastname' => $ln,
// 			'age' => $ag,
// 			'address' => $ad
// 		);
// 		$this->db->where('idcrud', $id);
// 		$this->db->update('crud', $data);
// 	}
// }
//
