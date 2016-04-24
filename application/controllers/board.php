<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller{

	public $info="a";

	
	

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('board_model');
		$this->info = $this->session->userdata;
		$this->info['email'] = $this->session->userdata('e-mail');		
		$this->info['board'] = $this->board_model->board_title($this->session->userdata('id_user'));	
		$this->info['description'] =  $this->session->userdata('description');
		$this->info['title'] =  $this->session->userdata('title');	
		$this->info['task'] =  $this->session->userdata('task');
		
		
		
			
		
		
	}
	
	
	function board_show(){
		$result = $this->board_model->board_info($this->input->post("button"));
		$this->info['description'] = $result->description;	
		$this->info['title'] = $this->input->post("button");
		
		$data['title'] = $this->input->post("button");      //SAVE IN SESSION
		$data['id_board'] = $result->id_board;	
		$data['description']  = $result->description;
		$this->session->set_userdata($data);				
		
		$this->tasks_show($data['id_board']);		
	}
	
	
	function tasks_show($board){
	     
		 $data['task'] = $this->board_model->all_tasks($board);
		 //print_r($data['task']);
		 $this->session->set_userdata($data);
		// print_r($this->session->userdata('task'));
		 //print_r($this->board_model->all_tasks($board));
		 //$this->load->view('welcome_view',$this->info);
		redirect('board/welcome_board');
	
	}
	
	
	

	function welcome_board(){			
		$this->load->view('welcome_view',$this->info);	
	}
	
	function create_board(){
		$this->board_model->insert_board($this->session->userdata('id_user'));		
		redirect('board/welcome_board');		
	
	}
	
	function create_task(){
		$this->board_model->insert_task($this->session->userdata('id_board'),$this->session->userdata('id_user'));			
		$this->tasks_show($this->session->userdata('id_board'));	
		//$this->load->view('welcome_view',$this->info);
		//redirect('board/welcome_board');
	
	
	
	
	
	//print_r($this->session->userdata('id_board'));
	
	
	
	}
	
	function delete_task(){
		//print_r("delete");
		$this->board_model->del_task($this->input->post("button_task"));
		$this->tasks_show($this->session->userdata('id_board'));
		//print_r($this->input->post("button_task"));
	}
	
	function set_deadline(){
		print_r("deadline");
		print_r($this->input->post("button_task"));
	}
	
	function set_check(){		
		$this->board_model->check_task($this->input->post("button_task"));	
		$this->tasks_show($this->session->userdata('id_board'));
	}
	
	function do_task(){
		$this->board_model->do_task($this->input->post("button_task"),$this->session->userdata('id_user'));	
		$this->tasks_show($this->session->userdata('id_board'));
	}
	
	
	
	function delete_board(){
		
	}


}