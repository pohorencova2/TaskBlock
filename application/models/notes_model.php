<?php

class Notes_model extends CI_Model{

	function getNotes(){		
		$q = $this->db->get('user');
		return $q->result();
	}
	
	function addNote($data){
		$this->db->insert('user',$data);
	}
	
}