<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/creative.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>" />	
	<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/style.css"); ?>" />
	<title>Welcome</title>
</head>
<body>

 
<div id="main">



<?php

echo '<h3 style="color:white;padding-left:10px">';

echo $name;
echo " ";
echo $surname;
echo '</h3>';



//echo $email;





?>
	<!-- LOG OUT -->	
	<?php
		echo form_open('auth/logout');      			
		$data = array(    
			'type' => 'submit',
			'class' => 'btn btn-success btn-lg'
			
		);		
		echo form_button($data, '<span class="glyphicon glyphicon-log-out"></span>','style="background-color:#10a615;position:absolute;right:0;top:0"');
		echo form_close(); 		
	?>
	
	<!-- SHOW BOARD ----------------------------------------------->
	<div class="btn-group" style="padding-left:10px">
		<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Boards <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 100px;">
			<?php  
			$data = array(
				'name'          => 'button',
				'type'            => 'submit',        
				'class'=> 'btn btn-success  btn-block '        
			);
			$arrlength = count($board);	
			echo form_open('board/board_show'); 
			for($x = 0; $x < $arrlength; $x++) {
				$data['value'] = $board[$x]['title'];		
				echo form_submit($data); 				
				echo '<br>';				
			}		
			echo form_close(); 	
			
			
			












			
			?> 
		</ul>
   </div>
  <!---------------------------------------------------------->
  
  
	
	
	
	
	<!-- CREATE BOARD ----------------------------------------->
	<div class="btn-group" >
		<button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-blackboard"></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  
			
			echo form_open('board/create_board'); 
			echo form_input('title', 'Title','class="form-control"');
			echo '<br>';
			echo form_input('description', 'Description','class="form-control"');
			echo '<br>';					
			echo form_submit('submit','create','class="btn btn-success"');
			echo form_close(); 	
			?> 
		</ul>
   </div>
   <!---------------------------------------------------------->
   
   
  
     
   
  


  
 
 
 
 
 
   <!-- CREATE TASK----------------------------------------------->
<div class="btn-group">
		<button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-tasks"></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  
			
			echo form_open('board/create_task'); 
			echo form_input('title_task', 'Title','class="form-control"');
			echo '<br>';
			echo form_input('description_task', 'Description','class="form-control"');
			echo '<br>';					
			echo form_submit('submit','add','class="btn btn-success"');
			echo form_close(); 	
			?> 
		</ul>
   </div>
 <!---------------------------------------------------------->



  
  
   


</div>



 
 
 				

<br>
<!-- DESCRIPTION ----------------------------------------------->
<div class="btn-group">

		<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:30px;background-color:#41c074;">
		 <span class="glyphicon glyphicon-blackboard"></span>
		 <?php echo "  "; 
		 echo $title;?>
		</button>
		
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  
			echo form_label($description, 'description');			
			?> 
		</ul>
   </div>
 <!---------------------------------------------------------->


<br>
<br>


<!-- SHOW TASKS ----------------------------------------------->


<?php 

	$arrlength = count($task);	
	if ($task != ""){
			
			for($x = 0; $x < $arrlength; $x++) {

 echo '<div class="col-lg-2">
         <div class="panel panel-primary" style="border-color:#80c48d">
             <div class="panel-heading" style="background-color:#10a615;border-color:#80c48d";>
                 <h5 class="panel-title" >'; 
					echo $task[$x]['name']; 
					echo " ";
					
					
				if ($task[$x]['executed'] == 1){
					 echo'<span class="glyphicon glyphicon-check" style="color:red"></span></h5>';
				
				};
				
				if ($task[$x]['do_task'] != 0){
					 echo'<span class="glyphicon glyphicon-user" style="color:black"></span></h5>';
				
				};
				
			
             echo '</div>
            <div class="panel-body" >';
			
				$data = array(
				'name'          => 'button_task',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs  btn-primary '        
			);
				
				echo form_open('board/delete_task'); 			
				$data['value'] = $task[$x]['id_task'];	
				echo '<table><tr>';
				echo '<td>';
				echo form_button($data, '<span class="glyphicon glyphicon-remove"></span>','style="background-color:#e64017"');	
				echo '</td>';				
				echo form_close(); 	
				
				
				
				$data = array(
				'name'          => 'button_task',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs btn-hover btn-danger'        
			);
				
				echo form_open('board/set_deadline'); 			
				$data['value'] = $task[$x]['id_task'];
				echo '<td>';
				echo form_button($data, '<span class="glyphicon glyphicon-time"></span>','style="background-color:#41b9b1"');	
				echo '</td>';				
				echo form_close(); 
				echo '</td>';
				
				
				$data = array(
				'name'          => 'button_task',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs btn-hover btn-danger'        
			);
				
				echo form_open('board/set_check'); 			
				$data['value'] = $task[$x]['id_task'];
				echo '<td>';
				echo form_button($data, '<span class="glyphicon glyphicon-check"></span>','style="background-color:#35e73b"');	
				echo '</td>';				
				echo form_close(); 
				echo '</td>';
				
				
				
				$data = array(
				'name'          => 'button_task',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs btn-hover btn-danger'        
			);
				
				echo form_open('board/do_task'); 			
				$data['value'] = $task[$x]['id_task'];
				echo '<td>';
				echo form_button($data, '<span class="glyphicon glyphicon-user"></span>','style="background-color:#070108"');	
				echo '</td>';				
				echo form_close(); 
				echo '</td>';
				
				
				
				
			
			
             
               
			echo '</tr></table>								
	 			<br><br>';
			echo $task[$x]['description'];
			echo '			
           </div>
        </div>
     </div>
 </div>';
	}  }
?> 


 <!---------------------------------------------------------->




	 





</body>

</html>