
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/creative.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>" />	
	<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<title>TaskBlock</title>
	
	
</head>


<body id="page-top">

       
        <div class="container text-center" style="padding-bottom:50px;padding-top:50px">
            
                <h1> TaskBlock  </h1> 
            
                <hr><br><br>
            <h3 class="section-heading">Does your team need administrative control? TaskBlock is the best way to organize tasks!</h3>
			<?php
				echo form_open('auth/login');      //az pri stlaceni tlacidla ma hodi na login	
				echo '<br>';
				echo form_submit('submit','Log in!','class="btn btn-primary btn-xl page-scroll"');
				echo form_close(); 
			?>
			

</div>
       
   
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Make your work more organized. You'll see everything about your project in one place. Not registered yet? Don't hesited and sing up! It's fast, free and simple.</p>
                    <?php
						echo form_open('auth');      //az pri stlaceni tlacidla ma hodi na login			
						echo form_submit('submit','Sing Up - It is free!','class="btn btn-default btn-xl"');
						echo form_close(); 
					?>
					
					
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">You can organize:</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-tasks wow bounceIn text-primary"></i>
                        <h3>Tasks</h3>
                        <p class="text-muted">Add tasks on your board and make them visible for team.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-edit wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Bookmarks</h3>
                        <p class="text-muted">Write bookmarks for better understanding.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-bell wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Time</h3>
                        <p class="text-muted">Set deadlines and do tasks on time!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-user wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Team</h3>
                        <p class="text-muted">Schedule tasks for all members.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
            </div>
        </div>
    </aside>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with TaskBlock? That's great! Have you a problem? Send us an email and we will get back to you as soon as possible!</p>
                
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">pohi128@gmail.com</a></p>
                </div>
               
                
                   
               
            </div>
        </div>
    </section>

</body>

</html>
