<div class="log" style="text-align:center;margin-top:20px">

<?php $this->load->view('header'); ?>

      
	<?php 
		echo '<br>';   
		echo form_open('auth/login');      //pri stlaceni tlacidla ma hodi na 
		echo form_input('nickname',set_value('nickname','Nickname')); echo '<br><br>';    //set_value - ak nieco vyplni do policka a potom spravi chybu, tak aby nemusel znova vyplnat, 'Meno' - default, ak tam nic nezada
		echo form_input('password',set_value('password','Password'));  echo '<br><br>';
			
		echo form_submit('submit','Log in','class="btn btn-primary btn-xl page-scroll"');
		echo form_close();
	
	
	?>
	
	
	
<?php $this->load->view('footer'); ?>
</div>
	


