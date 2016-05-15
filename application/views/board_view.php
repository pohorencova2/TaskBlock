

  
	
	
	
	
	<!-- CREATE BOARD --------------------------------------
	<div class="btn-group" >
		<button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-blackboard"></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  			
			/*echo form_open('board/create_board'); 
			echo form_input('title', 'Title','class="form-control"');
			echo '<br>';
			echo form_input('description', 'Description','class="form-control"');
			echo '<br>';					
			echo form_submit('submit','create','class="btn btn-success"');
			echo form_close(); */	
			?> 
		</ul>
   </div>
   <!---------------------------------------------------------->
   
   
   
   
<br>
<!-- DESCRIPTION ----------------------------------------------->
<div class="btn-group" style="padding-left:10px">

		<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:30px;background-color:#5bc8ac;font-family: Papyrus, fantasy;font-weight: bold;">
		 <span class="glyphicon glyphicon-blackboard" ></span>
		 <?php echo "  "; 
		 echo $board_title;?>
		</button>
		
		
		<ul class="dropdown-menu" style="padding: 15px;min-width:250px;min-height:150px;background-color:#003b46;color:white; ">
			<?php  
			$data = array(							
				'style' => '' 
			);
			echo form_label($board_description, 'description',$data);			
			?> 
		</ul>
   </div>
 <!---------------------------------------------------------->



   