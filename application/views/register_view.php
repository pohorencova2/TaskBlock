
<div class="reg" style="text-align:center;margin-top:20px">
<?php $this->load->view('header'); ?>

      REGISTRATION<br>
	<?php 
		   
		echo form_open('auth/register');      //az pri stlaceni tlacidla ma hodi na add
		echo form_input('nickname',set_value('nickname','Nickname')); echo '<br><br>';    //set_value - ak nieco vyplni do policka a potom spravi chybu, tak aby nemusel znova vyplnat, 'Meno' - default, ak tam nic nezada
		echo form_input('password',set_value('password','Password'));  echo '<br><br>';
		echo form_input('password2',set_value('password2','Password2'));  echo '<br><br>';
		echo form_input('name',set_value('name','Name'));  echo '<br><br>';
		echo form_input('surname',set_value('surname','Surname'));  echo '<br><br>';
		echo form_input('e-mail',set_value('e-mail','E-mail'));  echo '<br><br>';		
		echo form_submit('submit','sign in','class="btn btn-primary btn-xl page-scroll"');
		echo form_close();
	
	
	?>
	
	<div class="errors">
		<?= validation_errors() //vypise errors
		?>  
	
	
	
	</div>
	
<?php $this->load->view('footer'); ?>
</div>
	


