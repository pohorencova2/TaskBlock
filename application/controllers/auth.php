<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
//aaaaaaaaaaaaaaaaaaaaa


	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		
	}
	
	function home(){
		$this->load->view('home_view');
	
	}
	
	function index(){
		$this->load->view("register_view");
	}

	
	
	
	function register()
	{		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nickname','Wrong nickname','trim|required');  //trim- osekame prazdne znaky, required - musi byt zadane, xss_clean - osekame skarede znaky
		$this->form_validation->set_rules('password','Wrong password','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('password2','Wrong password2','trim|required|matches[password]');  //matches - musi sa zhodovat
		$this->form_validation->set_rules('name','Wrong name','trim|required'); 
		$this->form_validation->set_rules('surname','Wrong surname','trim|required'); 
		$this->form_validation->set_rules('e-mail','Wrong e-mail','trim|required|valid_email'); 
		$this->form_validation->set_error_delimiters('<p class="validation_error">', '</p>');
		
		
	
		//ak prejde validaciou a uspesne vlozi do db   
		if ($this->form_validation->run() && $this->auth_model->register()){
					    
			redirect("auth/login");                  //vlozi do db a moze sa po registracii prihlasit
		}
		else{
			
		}
		$this->load->view("register_view");
		
	}
	
	function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nickname','Wrong nickname','trim|required');  //trim- osekame prazdne znaky, required - musi byt zadane, xss_clean - osekame skarede znaky
		$this->form_validation->set_rules('password','Wrong password','trim|required'); 
		
		
		
		
		//ak prejde validaciou  
		if ($this->form_validation->run() ){
			if ($this->auth_model->check()){
				//vytvorime session
				
				$data = $this->auth_model->getUserData($_POST['nickname']);				
				$data['logged_in'] = true;
				$this->session->set_userdata($data);
				
				redirect('show/welcome_board');
			}
			else{
				echo 'nie si zaregistrovany';
			}
					    
		
		}
		else{
			
			
		}
		$this->load->view("login_view");
	}
	
	function logout(){
		//$this->session->unset_userdata(array('nickname'=>'','name'=>'','surname'=>'','e-mail'=>'','logged_in'=>''));  //vymaze zo session 
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('title');
		//print_r($this->session->userdata); //vypise session
		//$this->login();		
		redirect("auth/home");
	}
	
	

}