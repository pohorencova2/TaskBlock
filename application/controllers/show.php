<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller{
	
	

	function __construct(){
	
		parent::__construct();
		
		$this->load->model('auth_model');
		$this->load->model('board_model');
		$this->load->model('task_model');
		$this->load->model('team_model');
		$this->info = $this->session->userdata;
		
		//all boards id,title,description 
		$this->info['board'] = $this->board_model->board_info_zatial($this->session->userdata('id_user'));
		
		//all teams
		$this->info['my_team'] = $this->team_model->my_team($this->session->userdata('id_user'));
		//other teams
		$ids = $this->team_model->other_team_id($this->session->userdata('id_user'));
		for ($i=0;$i<count($ids);$i++){
			$this->info['other_team'][$i] = $this->team_model->team_info($ids[$i]['team']);			
		}
	
		
		
		$this->info['name'] = $this->session->userdata('name');
		$this->info['surname'] = $this->session->userdata('surname');		
		
		$this->info['board_description'] =  "";
		$this->info['board_title'] = "Welcome";			
		$this->info['task'] = "";          //aby na zaciatku nebolo nic			
		
	}
	
	
	
	//START welcome board
	function welcome_board(){	
		$this->load->view('welcome_view',$this->info);			
	}
	
	//Show choosen board
	function board_show(){
		$result = $this->board_model->board_id($this->input->post("button"));
		$data['id_board'] =  $result->id_board;		
		$this->session->set_userdata($data);
		$this->update();		
	}
	
	
	function update(){	
		
		$result = $this->board_model->board_info($this->session->userdata('id_board'));
		$this->info['board_description'] = $result->description;	
		$this->info['board_title'] = $result->title;
		//$this->info['id_board'] =  $this->session->userdata('id_board');
		$this->tasks_show();		
	}
	
	//Show task for choosen board
	function tasks_show(){	    
		$this->info['task'] = $this->task_model->all_tasks($this->session->userdata('id_board'));		
		$this->load->view('welcome_view',$this->info);			
	}
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	


}