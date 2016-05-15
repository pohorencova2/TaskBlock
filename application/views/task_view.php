 <!-- CREATE TASK----------------------------------------------->
<div class="btn-group">
		<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#003b46;">
		<span class="glyphicon glyphicon-pencil"></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  		
			
			echo form_open('task/create_task'); 
			echo form_input(array(
			  'name' => 'title_task',
			  'value' => '',
			  'placeholder' => 'Title',
			  'class'  => 'form-control',
			));			
			
			echo '<br>';
			echo form_input(array(
			  'name' => 'description_task',
			  'value' => '',
			  'placeholder' => 'Description',
			  'class'  => 'form-control',
			));	
			
			echo '<br>';	
			echo form_submit(array(
			  'name' => 'submit',
			  'value' => 'Add task',
			  'class'=>'btn btn-success',
			  'style'=>'background-color:#ee4b28'
			 
			 
			));	
			
			
			echo form_close(); 	
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
             <div class="panel-heading" style="background-color:#ee4b28;border-color:#ee4b28";>
                 <h5 class="panel-title" >'; 
					echo $task[$x]['name']; 
					echo " ";
					
					
				if ($task[$x]['executed'] == 1){
					 echo'<span class="glyphicon glyphicon-check" style="color:black"></span></h5>';
				
				};
				
				if ($task[$x]['do_task'] != 0){
					 echo'<abbr title=';echo $task[$x]['do_task_name'];echo '><span class="glyphicon glyphicon-user" style="color:black"></span></h5></abbr>';
				
				};
				
			
             echo '</div>
            <div class="panel-body"  >';
			
				$data = array(
				'name'          => 'del_task',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs  btn-primary '        
			);
				
				echo form_open('task/delete_task'); 			
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
				
				echo form_open('task/set_check'); 			
				$data['value'] = $task[$x]['id_task'];
				echo '<td>';
				echo form_button($data, '<span class="glyphicon glyphicon-check"></span>','style="background-color:grey"');	
				echo '</td>';				
				echo form_close(); 
				echo '</td>';
				
				
				
				$data = array(
				'name'          => 'button_task',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs btn-hover btn-danger'        
			);
				
				echo form_open('task/do_task'); 			
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
