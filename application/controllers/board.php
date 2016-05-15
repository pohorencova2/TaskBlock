<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('board_model');
		$this->info = $this->session->userdata;
	}
	
	//Form for create board, insert data into db - title, description, user
	function create_board(){          
		$this->board_model->insert_board($this->session->userdata('id_user'));		
		redirect('show/welcome_board');	
	}
	
	//Delete board
	function delete_board(){
		//Is admin of board
		
		$team = $this->board_model->has_team($this->input->post("button_del_board"));
		
		
		if ($team->team == 0){
			$this->board_model->del_board($this->input->post("button_del_board"));
		}
		else{
			$owner = $this->board_model->get_owner($team->team);
			if ($owner->owner == $this->session->userdata('id_user')){
			    //find and delete board in team
			    $inf = $this->board_model->board_info($this->input->post("button_del_board"));
				$this->board_model->del_team_board($team->team,$inf->title);
				
				//delete my board
				$this->board_model->del_board($this->input->post("button_del_board"));
				
				
			}
			else{
				//DOPISAT NIE SI ADMIN NEMOZES MAZAT TUTO BOARD		
			}
		}		
	
		redirect('show/welcome_board');
	
	}
	 
	//Assign board to team 
	function assign_team(){
		$this->board_model->assign($this->session->userdata('id_board'));
		//find users that are in team and add them board
		$dataU = $this->board_model->team_users();   //users
		$dataB = $this->board_model->board_team_info($this->session->userdata('id_board'));  //board
		print_r($dataB);
		//add board to members
		$length = count($dataU);
		for ($i=0;$i<$length;$i++){
			$dataB['user'] = $dataU[$i]['member'];
			//print_r($dataB[$i]);
			$this->board_model->insert_team_board($dataB);
		}		
		
	redirect('show/welcome_board');	
	}
	
	
	
	//assign board to member  OKULIARE
	function assign_member(){
		$data = $this->board_model->team_boards();
		$length = count($data);
		for ($i=0;$i<$length;$i++){
			$data[$i]['user'] = $_POST['new_member'];
			$this->board_model->insert_team_board($data[$i]);
		}
		// add to table members 
		$this->board_model->team_member();
		
		redirect('show/welcome_board');	
		
		
	
	}



}