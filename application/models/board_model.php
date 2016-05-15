<?php if(! defined('BASEPATH')) exit('No direct script access allowed');


class Board_model extends CI_Model{
	

	function insert_board($id){
	
		$data = array(			
				'title' => $_POST['title'],
				'description' => $_POST['description'],
				'user' => $id,				
			);
			$this->db->insert('board',$data);
	}
	
	function board_info_zatial($idu){
		$select = $this->db->select('id_board,title,description,team')
							->where('user',$idu)
							->get('board');
		if ($select->num_rows() >0) return $select->result_array();    
		else return false;
							
	}
	
	function board_team_info($idb){
		$select = $this->db->select('title,description,team')
							->where('id_board',$idb)
							->get('board');
		if ($select->num_rows() >0) return $select->row_array();    
		else return false;							
	}
	
	
	function board_info($id){
		$select = $this->db->select('title,description')
							->where('id_board',$id)
							->get('board');
		if ($select->num_rows() >0) return $select->row();    
		else return false;							
	}
	
	function board_id($title){
		$select = $this->db->select('id_board')
							->where('title',$title)
							->get('board');
		if ($select->num_rows() >0) return $select->row();    
		else return false;							
	}
	
	//Assign board to team 
	function assign($idb){
		$data = array(			
				'team' => $_POST['choosen_team'],								
			);
			$this->db->where('id_board', $idb);
			$this->db->update('board',$data);
	}
	
	function team_boards(){
		$select = $this->db->select('title,description,team')
							->where('team',$_POST['choosen_team2'])
							->get('board');
		return $select->result_array();    
		
	
	}
	
	function insert_team_board($data){		
		$this->db->insert('board',$data);
	}
	
	function team_member(){
		$data = array(			
				'team' => $_POST['choosen_team2'],
				'member' => $_POST['new_member'],
								
			);
			$this->db->insert('members',$data);
	
	}
	
	function team_users(){
		$select = $this->db->select('member')
							->where('team',$_POST['choosen_team'])
							->get('members');
		return $select->result_array();  
	}
	
	function get_owner($idt){
		$select = $this->db->select('owner')
							->where('id_team',$idt)
							->get('team');
		return $select->row();  
		
		
	}
	
	function has_team($idb){
		$select = $this->db->select('team')
							->where('id_board',$idb)
							->get('board');
		return $select->row();
	}
	
	


////////////////////////////////////////////////////////////////	

	
	function board_info2($idu){
		$select = $this->db->select('id_board,title,description')
							->where('user',$idu)
							->get('board');
		if ($select->num_rows() >0) return $select->result_array();    
		else return false;
							
	}
	
	function board_title($id){
		$select = $this->db->select('title')
							->where('user',$id)
							->get('board');
		
		if ($select->num_rows() >0) return $select->result_array();    //$select->result() - array objektov z databazy
		else return false;                                    //$select->row() - iba jeden objekt z databazy
																//$select->row_array() - da mi to do array, lebo array berie v session	
	}


	
	
	
	
	function del_board($idb){
		$this->db->where('id_board', $idb);
		$this->db->delete('board'); 	
		
		$this->db->where('board', $idb);
		$this->db->delete('task'); 
		
	}
	
	function del_team_board($team,$title){
		$this->db->where('team', $team);
		$this->db->where('title', $title);
		$this->db->delete('board');
	
	}
	

	
	

	
	

}