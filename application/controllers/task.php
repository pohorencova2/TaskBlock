<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller{


	function __construct(){
		parent::__construct();		
		$this->load->model('task_model');
		$this->load->model('board_model');
		$this->info = $this->session->userdata;
	}

	function delete_task(){
	    $owner = $this->task_model->get_owner($this->input->post("del_task"));
		//Is owner of task
		if ($owner->task_owner == $this->session->userdata('id_user')){
		
			$this->task_model->del_task($this->input->post("del_task"));
		}
		//Is not owner but maybe admin of team
		else{
			$board = $this->task_model->get_board($this->input->post("del_task"));
			$team = $this->board_model->has_team($board->board);
			$owner = $this->board_model->get_owner($team->team);
			//IS ADMIN
			if ($owner->owner == $this->session->userdata('id_user')){
				$this->task_model->del_task($this->input->post("del_task"));							
			}
			else{		
				//NEMOZES DELETE TASK NIE SI ADMIN ANI SI MAJITEL TASK	
				
			}
		}		 
		
		redirect('show/update');
	}
	
	function create_task(){
		$this->task_model->insert_task($this->session->userdata('id_board'),$this->session->userdata('id_user'));		
		redirect('show/update');		
		
	}
	
	function set_check(){
	    $free = $this->task_model->is_free($this->input->post("button_task"));
		if ($free->do_task == 0 || $free->do_task == $this->session->userdata('id_user')){
			$this->task_model->check_task($this->input->post("button_task"));		
		}		
		redirect('show/update');				
	}
	
	function do_task(){	 
		$this->task_model->do_task($this->input->post("button_task"),$this->session->userdata('id_user'),$this->session->userdata('nickname'));
		redirect('show/update');
		
	}
	
	/*function set_deadline(){
		print_r("deadline");
		print_r($this->input->post("button_task"));
	}*/

}