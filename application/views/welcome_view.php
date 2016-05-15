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



<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight:bold;color:white">Boards<span class="caret"></span></a>
          <ul class="dropdown-menu" style="padding: 15px;min-width: 100px;">
			<?php 
			echo '<table>';
				
			$arrlength = count($board);	
			
			for($x = 0; $x < $arrlength; $x++) {
			 
			
			
			$data = array(
				'name'          => 'button',
				'type'            => 'submit',        
				'class'=> 'btn btn-success  btn-block ',
				'style'=> 'color:white;background-color:#003b46;'
				
			);
			
			echo '<tr>';
			echo form_open('show/board_show'); 
			
				$data['value'] = $board[$x]['title'];	
				echo '<td>';	
				echo form_submit($data);
				echo '</td>';	 				
							
					
			echo form_close(); 	
			
			echo form_open('board/delete_board'); 
			
			$data = array(
				'name'          => 'button_del_board',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs  btn-primary '        
			);
			
				$data['value'] = $board[$x]['id_board'];	
				echo '<td>';				
				echo form_button($data, '<span class="glyphicon glyphicon-remove"></span>','style="color:black;background-color:white"');	; 				
				echo '</td>';						
				echo form_close();				
				echo '</tr>';
				echo '<tr>';
				echo '<td>';
				echo '<br>';
				echo '</td>';				
				echo '</tr>';
								
			}
			echo '</table>';
			
			?> 
          </ul>
        </li>
		
		<!--ALL TEAMS  -->
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight:bold;color:white">Teams<span class="caret"></span></a>
          <ul class="dropdown-menu" style="padding: 15px;min-width: 100px;">
		  
			<?php 
			echo '<table>';
				
			$arrlength = count($my_team);	
			$data = array(							
				'style' => 'color:#ee4b28;' 
			);
			
			echo form_label("My teams:", 'my_teams',$data);	
			
			for($x = 0; $x < $arrlength; $x++) {
			
			
			$data = array(
				'name'          => 'my_teams',
				'type'            => 'submit',        
				'class'=> 'btn btn-success  btn-block ',
				'style' => 'color:white;background-color:#003b46;' 
			);
			
			echo '<tr>';
			
			echo form_open('show/board_show');  //ZMENIT """"""""""""""""""""""""
			
				$data['value'] = $my_team[$x]['name'];	
				echo '<td>';	
				echo form_submit($data);
				echo '</td>';	 				
							
					
			echo form_close(); 	
			
			
			echo form_open('team/delete_team');  
			
			$data = array(
				'name'          => 'button_del_team',
				'type'            => 'submit',        
				'class'=> 'btn btn-xs  btn-primary '        
			);
			
				$data['value'] = $my_team[$x]['id_team'];	
				echo '<td>';				
				echo form_button($data, '<span class="glyphicon glyphicon-remove"></span>','style="color:black;background-color:white"');	; 				
				echo '</td>';						
				echo form_close();				
				echo '</tr>';
				echo '<tr>';
				echo '<td>';
				echo '<br>';
				echo '</td>';				
				echo '</tr>';
								
			}			
			echo '</table>';
			echo '<li role="separator" class="divider"></li>';
			$data = array(							
				'style' => 'color:#ee4b28;' 
			);
			echo form_label("Member in:", 'other_teams',$data);
			$arrlength = count($other_team);	
			for($x = 0; $x < $arrlength; $x++) {
			
			
			$data = array(
				'name'          => 'other_teams',
				'type'            => 'submit',        
				'class'=> 'btn btn-success  btn-block ', 
				'style' => 'color:white;background-color:#003b46;'
			);
			
			
			echo form_open('show/board_show');  //ZMENIT """"""""""""""""""""""""			
				$data['value'] = $other_team[$x]['name'];					
			echo form_submit($data);					
			echo form_close();  
			echo "<br>";
			}
		
			
			?>   
		  
            
          </ul>
        </li>		
		
		
		<li>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight:bold;color:white;font-size:20px"><span class="fa fa-plus-square fa-lg" ></span></a>
        <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
		
		
			<?php  			
			echo form_open('board/create_board'); 
			echo form_input(array(
			  'name' => 'title',
			  'value' => '',
			  'placeholder' => 'Title',
			  'class'  => 'form-control',
			));				
			echo '<br>';
			echo form_input(array(
			  'name' => 'description',
			  'value' => '',
			  'placeholder' => 'Description',
			  'class'  => 'form-control',
			));	
			//echo form_input('description', 'Description','class="form-control"');
			echo '<br>';		
			echo form_submit(array(
			  'name' => 'submit',
			  'value' => 'Create board',
			  'class'=>'btn btn-success',
			  'style'=>'background-color:#ee4b28'			 
			));	
			
			echo form_close(); 	
			?> 	
      </ul>	  
	  </li>		
      </ul>
	    
	
	  
	  
     
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight:bold;color:white"><?php echo $name . " " . $surname; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
		  
		  
           		
			<?php  		
			echo form_open('team/create_team'); 
			echo form_input(array(
			  'name' => 'team_name',
			  'value' => '',
			  'placeholder' => 'Name of team',
			  'class'  => 'form-control',
			));	
			//echo form_input('team_name', 'Name of team','class="form-control"');
			echo '<br>';
			echo form_input(array(
			  'name' => 'team_description',
			  'value' => '',
			  'placeholder' => 'Description',
			  'class'  => 'form-control',
			));	
			//echo form_input('team_description', 'Description','class="form-control"');
			echo '<br>';	
			echo form_submit(array(
			  'name' => 'submit',
			  'value' => 'Create team',
			  'class'=>'btn btn-success',
			  'style'=>'background-color:#ee4b28'			 
			));	
			
			//echo form_submit('submit','create','class="btn btn-success"');
			echo form_close();
			echo '<li role="separator" class="divider"></li>';	
			echo '<br>';
			?>  
			
			<?php  	
			
			echo form_open('board/assign_member'); 
			echo form_input(array(
			  'name' => 'choosen_team2',
			  'value' => '',
			  'placeholder' => 'Name of team',
			  'class'  => 'form-control',
			));	
			//echo form_input('choosen_team2', 'Name of team','class="form-control"');
			echo '<br>';
			echo form_input(array(
			  'name' => 'new_member',
			  'value' => '',
			  'placeholder' => 'Name of user',
			  'class'  => 'form-control',
			));	
			//echo form_input('new_member', 'Name of user assign to team','class="form-control"');			
			echo '<br>';		
			echo form_submit(array(
			  'name' => 'submit',
			  'value' => 'Add member',
			  'class'=>'btn btn-success',
			  'style'=>'background-color:#ee4b28;'			 
			));		
			
			echo form_close(); 
			?> 
		
			
			
				
			
			
			
				
			
			
			
            
          </ul>
        </li>
		
		
		
		
		 
	
		 <?php
		 echo '<li><a href="">';
		 echo form_open('auth/logout');      			
		$data = array(    
			'type' => 'submit',
			'class' => 'btn btn-success '
			
		);	
		
		echo form_button($data, '<span class="glyphicon glyphicon-log-out"></span>','style="background-color:#ee4b28"');
	
		echo form_close(); 
			echo '</a></li>';
			?>
		 
		 
		 
		 
		 
		 
		 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>









	
	
	
	
	
	<?php $this->load->view('board_view'); ?>
	
	
	
	
	
	
	
	<!-- CREATE TEAM ----------------------------------------
	<div class="btn-group" >
		<button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-user"></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  		
			/*echo form_open('team/create_team'); 
			echo form_input('team_name', 'Name of team','class="form-control"');
			echo '<br>';
			echo form_input('team_description', 'Description','class="form-control"');
			echo '<br>';					
			echo form_submit('submit','create','class="btn btn-success"');
			echo form_close(); 	*/
			?>  
		</ul>
   </div>
   <!---------------------------------------------------------->
	
	
	
	 <!-- ASSIGN BOARD TO TEAM ----------------------------------------->
	<div class="btn-group" >
		<button type="button" class="btn btn-success  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#003b46;">
		<span class="fa fa-users fa-lg" ></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  			
			echo form_open('board/assign_team'); 
			
		
			
			echo form_input(array(
			  'name' => 'choosen_team',
			  'value' => '',
			  'placeholder' => 'Name of team',
			  'class'  => 'form-control',
			));
			//echo form_input('choosen_team', 'Name of team assign to board','class="form-control"');
			
			echo '<br>';	
			echo form_submit(array(
			  'name' => 'submit',
			  'value' => 'Assign to board',
			  'class'=>'btn btn-success',
			  'style'=>'background-color:#ee4b28'		 
			 
			));		
			
			echo form_close(); 	
			?> 
		</ul>
   </div>
   <!---------------------------------------------------------->
   
   
    <!-- ASSIGN USER TO TEAM ----------------------------------------
	<div class="btn-group" >
		<button type="button" class="btn btn-success  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-sunglasses"></span>
		</button>
		<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
			<?php  			
			/*echo form_open('board/assign_member'); 
			echo form_input('choosen_team2', 'Name of team','class="form-control"');
			echo '<br>';	
			echo form_input('new_member', 'Name of user assign to team','class="form-control"');			
			echo '<br>';					
			echo form_submit('submit','create','class="btn btn-success"');
			echo form_close(); 	*/
			?> 
		</ul>
   </div>
   <!---------------------------------------------------------->
       
	
	
	
	
	
	<?php $this->load->view('task_view'); ?>
	
	
	 
		
		
	</div>


	<footer style="position:absolute;bottom:0;width:100%;text-align:center"><h1 style="opacity:0.5">TaskBlock<h1> </footer>

</body>

</html>