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

	function board_info($title){
		$select = $this->db->select('id_board,description')
							->where('title',$title)
							->get('board');
		if ($select->num_rows() >0) return $select->row();    
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
	
	
	function insert_task($idb,$idu){
		$data = array(			
			'name' => $_POST['title_task'],
			'description' => $_POST['description_task'],
			'board' => $idb,	
			'task_owner' => $idu,
		);
		$this->db->insert('task',$data);
	}	
	
	function all_tasks($idb){
		$select = $this->db->select('id_task,name,description,executed,do_task')
							->where('board',$idb)
							->get('task');
		if ($select->num_rows() >0) return $select->result_array();    
		else return false;
							
	}
	
	function del_task($idt){
		$this->db->where('id_task', $idt);
		$this->db->delete('task'); 		
	}
	
	function check_task($idt){
		$select = $this->db->select('executed')
							->where('id_task',$idt)
							->get('task');
	     if ($select->row_array()['executed'] == 1){
			$data = array(
               'executed' => 0,
               
            );		 
		 }
		 else{
			$data = array(
               'executed' => 1,);	
		 }
		$this->db->where('id_task', $idt);
		$this->db->update('task', $data); 	
	}
	
	function do_task($idt,$idu){
		$select = $this->db->select('do_task')
							->where('id_task',$idt)
							->get('task');
	     if ($select->row_array()['do_task'] == 0){
			$data = array(
               'do_task' => $idu,
               
            );		 
		 }
		 else{
			$data = array(
               'do_task' => 0,
			);	
		 }
		$this->db->where('id_task', $idt);
		$this->db->update('task', $data); 	
	
	}

	
	

}