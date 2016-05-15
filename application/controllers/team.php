<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('team_model');
		$this->info = $this->session->userdata;
	}
	
	function create_team(){
		$this->team_model->insert_team($this->session->userdata('id_user'));	
		redirect('show/welcome_board');	
	}
	
	function delete_team(){
		$this->team_model->delete_team($this->input->post("button_del_team"));	
		redirect('show/welcome_board');	
	
	}
	
	



}