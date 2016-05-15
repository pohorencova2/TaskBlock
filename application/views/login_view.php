<div class="log" style="text-align:center;margin-top:20px">

<?php $this->load->view('header'); ?>

      
	
	
	<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4 style="font-family: Papyrus, fantasy;font-weight:bold;font-size:25px">Welcome back!</h4>
			
			
	<?php 
		echo '<br>';   
		echo form_open('auth/login');      //pri stlaceni tlacidla ma hodi na 
		echo form_input(array(
		  'name' => 'nickname',
		  'value' => '',
		  'placeholder' => 'Username',
		  'class'  => 'form-control input-sm chat-input',
		));
		echo '<br>';    
		echo form_input(array(
		  'name' => 'password',
		  'value' => '',
		  'placeholder' => 'Password',
		  'class'  => 'form-control input-sm chat-input',
		));
		echo '<br>'; 	
		
	?>
		<div class="wrapper">
			<span class="group-btn">
	<?php 			
		echo form_submit('submit','Log in','class="btn btn-primary btn-xl"');
		echo form_close();
	
	
	?>     
               
               
            </span>
            </div>
            </div>
        
        </div>
    </div>
</div>
	
	<footer style="position:absolute;bottom:0;width:100%;"><h1 style="opacity:0.2">TaskBlock<h1> </footer>
	
<?php $this->load->view('footer'); ?>



</div>
	


