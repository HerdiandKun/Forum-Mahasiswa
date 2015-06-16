<! DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>assets/img/background.png" rel="shortcut icon" rev="shortcut icon">
        <title>Forum Mahasiswa | Program Diploma IPB</title>
        
        <!-- CSS -->
        <link href="<?PHP echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?PHP echo base_url(); ?>assets/css/image-picker.css" rel="stylesheet">
         <link href="<?PHP echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
        <style type="text/css">
		 .navbar,  .well
		 {
			 margin-bottom : 30px;
			 }
		.jumbotron
			{
			margin-bottom: 20px;	
			}
        </style>
    </head>
    <body>    
		<nav class="navbar navbar-inverse" style="overflow" role="navigation">
        	<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?PHP echo base_url(); ?>">
                        Forum Mahasiswa
                    </a>
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    	<span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
                	<li <?PHP 
					if($this->uri->segment(1)=='') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>"> Beranda </a>
                    </li>
                    <?PHP 
						if($this->session->userdata('status') != '')
						{
					?>
                  	<li <?PHP if($this->uri->segment(1)=='member') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>member"> Member </a>
                    </li>
           
                    <?PHP 
						} 
					if($this->session->userdata('status') == 2)
						{
					?>
                  	<li <?PHP if($this->uri->segment(1)=='statistik') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>statistik"> Statistik </a>
                    </li>
           
                    <?PHP 
						} 
					?>
                </ul>
                	<ul class="nav navbar-nav  navbar-right">
                    <?PHP 
						if($this->session->userdata('username') == '')
						{
					?>
                    	<li>
                        	<a href="<?PHP echo site_url();?>masuk">
                            	<i class="glyphicon glyphicon-log-in"></i> Masuk
                            </a>
                        </li>
						<li>
                        	<a href="<?PHP echo site_url();?>daftar">
                            	<i class="glyphicon glyphicon-plus"></i> Daftar
                            </a>
                        </li>
                    	
                        <?PHP 
						} else{
						?>
                        	<li>
                            	<a href="<?PHP echo site_url();?>profil?username=<?php echo $this->session->userdata("username");?>"><i class="glyphicon glyphicon-user"></i> <?PHP echo $this->session->userdata('username');?></a>
                            </li>
                            <li>
                            	<a href="<?PHP echo site_url(); ?>masuk/logout"><i class="glyphicon glyphicon-log-out"></i>Keluar</a>
                            </li>
                        <?PHP 
						}
						?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="jumbotron">
        	<div class="container">
			<h2>Forum Mahasiswa 
			</h2>
			<h1>Program Diploma IPB</h1>
				<p>
                	Mencari dan Memberi yang Terbaik
                </p>
				
            </div>
        </div>
        