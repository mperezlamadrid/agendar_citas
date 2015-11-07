<?php
class Home extends CI_Controller {
	public function index(){
		$this->load->helper('url');
		
		$data['title'] = 'Agenda tu cita';

		$this->load->view('templates/header', $data);
    $this->load->view('home/index');
    $this->load->view('templates/footer');
	}
}
