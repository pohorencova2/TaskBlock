<?php if(! defined('BASEPATH')) exit('No direct script access allowed');


class Auth_model extends CI_Model{

	function register(){
		$data = array(
			'nickname' => $_POST['nickname'],
			'password' => sha1($_POST['password']),
			'name' => $_POST['name'],
			'surname' => $_POST['surname'],
			'e-mail' => $_POST['e-mail'],	
		);
		return $this->db->insert('user',$data);
	
	}
	
	function check(){
		$select = $this->db->where('nickname',$_POST['nickname'])
							->where('password',sha1($_POST['password']))
							->get('user');
		return $select->num_rows();   //vrati pocet riadkov ktore nasiel
	}
	
	function getUserData($nickname){
	
		$select = $this->db->select('id_user,nickname,name,surname,e-mail')
							->where('nickname',$nickname)
							->get('user');
		
		if ($select->num_rows() >0) return $select->row_array();    //$select->result() - array objektov z databazy
		else return false;                                    //$select->row() - iba jeden objekt z databazy
																//$select->row_array() - da mi to do array, lebo array berie v session					
	}



}