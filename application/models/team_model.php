<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Team_model extends CI_Model{

	function insert_team($idu){
		$data = array(			
				'name' => $_POST['team_name'],
				'description' => $_POST['team_description'],
				'owner' => $idu,				
			);
			$this->db->insert('team',$data);	
	}
	
	function my_team($idu){
		$select = $this->db->select('id_team,name,description')
							->where('owner',$idu)
							->get('team');
		if ($select->num_rows() >0) return $select->result_array();    
		else return false;	
	}
	
	function other_team_id($idu){
		$select = $this->db->select('team')
							->where('member',$idu)
							->get('members');
		if ($select->num_rows() >0) return $select->result_array();    
		else return false;
	}
	
	function team_info($idt){
		$select = $this->db->select('id_team,name,description')
							->where('id_team',$idt)
							->get('team');
		if ($select->num_rows() >0) return $select->row_array();    
		else return false;
	}
	
	function delete_team($idt){	
		$this->db->where('id_team', $idt);
		$this->db->delete('team'); 	
		
		$this->db->where('team', $idt);
		$this->db->delete('members'); 
		
	
	}


}