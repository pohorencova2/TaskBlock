<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model{

	function all_tasks($idb){
		$select = $this->db->select('id_task,name,description,executed,do_task,do_task_name')
							->where('board',$idb)
							->get('task');
		if ($select->num_rows() >0) return $select->result_array();    
		else return false;
							
	}
	
	
	function del_task($idt){
		$this->db->where('id_task', $idt);
		$this->db->delete('task'); 		
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
	
	function do_task($idt,$idu,$user){
	
		$select = $this->db->select('do_task')
							->where('id_task',$idt)
							->get('task');
	     if ($select->row_array()['do_task'] == 0){
			$data = array(
               'do_task' => $idu,
			   'do_task_name' => $user,               
            );	

			$this->db->where('id_task', $idt);
			$this->db->update('task', $data);
		 }
		 else{
			if ($select->row_array()['do_task'] == $idu){
				$data = array(
               'do_task' => 0,
			   'do_task_name' => "",
				);	
			$this->db->where('id_task', $idt);
			$this->db->update('task', $data);
				
			}
		 }
	}
	
	function is_free($idt){
		$select = $this->db->select('do_task')
							->where('id_task',$idt)
							->get('task');
		return $select->row();
	
	}
	
	function get_owner($idt){
		$select = $this->db->select('task_owner')
							->where('id_task',$idt)
							->get('task');
		return $select->row();
	}
	
	function get_board($idt){
		$select = $this->db->select('board')
							->where('id_task',$idt)
							->get('task');
		return $select->row();
	}


}