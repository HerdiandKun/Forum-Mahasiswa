<?PHP
	$this->load->view('header_v');
?>
	<div class="container">
    	<div class="panel panel-default">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="glyphicon glyphicon-log-in"></i> Masuk</h3>
             </div>
             <div class="panel-body">
			 <?php
			if($this->uri->segment(3)=="error")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Username atau password salah
            </div>
        <?php
        }?>
             	<form method="post" role="form" action="<?PHP echo site_url(); ?>masuk/login" id="form_login">
                	<div class="form-group">
                    	<label for="username" class="visible-lg visible-md">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    
                    <div class="form-group">
                    	<label for="password">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password" required>
                    </div>
                </form>
                <div class="panel-footer">
                	<button type="submit" class="btn btn-primary btn-block" form="form_login">
                    <i class="glyphicon glyphicon-log-in"></i> Login
                    </button>
                </div>
             
            	</div>
           </div>
           </div>

<?PHP
	$this->load->view('footer_v');
?>