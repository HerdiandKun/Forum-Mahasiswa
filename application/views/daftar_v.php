<?PHP
	$this->load->view('header_v');
?>
	<div class="container">
    	<div class="panel panel-default">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> Daftar </h3>
             </div>
             <?PHP
		if($this->uri->segment(3)=="error_save")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Username atau nim telah digunakan
            </div>
        <?php
        } else if($this->uri->segment(3)=="error_pass")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Password dan konfirmasi password tidak sama
            </div>
        <?php
        }  else if($this->uri->segment(3)=="simpan")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Berhasil disimpan
            </div>
        <?php
        }
		 else if($this->uri->segment(3)=="error_cap")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Captcha yang anda masukkan salah
            </div>
        <?php
        }
		?>
		
        
             <div class="panel-body">
             	<form method="post" role="form" action="<?PHP echo site_url(); ?>daftar/tambah" id="form_signup">
                	<div class="form-group">
                    	<label for="username" class="visible-lg visible-md">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    
                    <div class="form-group">
                    	<label for="password">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password" required>
                    </div>
                    <div class="form-group">
                    	<label for="konf_password">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="konf_password"  placeholder="Konfirmasi Password" required>
                    </div>
                    <div class="form-group">
                    	<label for="nama" class="visible-lg visible-md">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
					<div class="form-group">
                    	<label for="nim" class="visible-lg visible-md">NIM</label>
                        <input type="text" class="form-control" name="nim" placeholder="NIM" required>
                    </div>
					<div class="form-group">
                                 	<label>Program Keahlian</label>
                                    <select name="pk" class="form-control" id="pk" required>
                                    
										<?PHP
                                            $query = "SELECT * FROM tbl_program_keahlian";
                                            
                                            $result = mysql_query($query);
                                            
                                            while($row_pk = mysql_fetch_object($result))
                                            {
                                        ?>
                                        
                                        <option value="<?PHP echo $row_pk->nama_pk; ?>"><?PHP echo $row_pk->nama_pk; ?></option>
                                        
                                        <?PHP
                                            }
                                        ?>
                                        
                                    </select>
                                    <!--<input type="text" class="form-control" name="id_pk" id="id_pk" placeholder="ID Program Keahlian" required>  -->
                                   </div>
								   <div class="form-group">
								   <label>Jenis Kelamin</label>
                                    <input type="radio"  name="jk" id="pria" value="L" checked /> Pria
                					<input type="radio"  name="jk" id="wanita" value="P" /> Wanita
                                    <!--<input type="text" class="form-control" name="jk" id="jk" placeholder="L/P" required>  -->
                                   </div>
                    <div class="form-group">
                    	<label for="Tanggal Lahir" class="visible-lg visible-md">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl" placeholder="(yyyy-mm-dd)" required>
                    </div>               
                    <div class="form-group">
                        <?php
                        $this->load->helper('captcha');
						
						$str='abcdefghijklmnopqrstuvwxyz0123456789';
						
						$vals = array(
						'word'	 => substr(str_shuffle($str),0,5),
						'img_path'	 => './assets/img/captcha/',
						'img_url'	 => base_url().'assets/img/captcha/',
						'font_path'	 => './path/to/fonts/texb.ttf',
						'img_width'	 => '150',
						'img_height' => 30,
						'expiration' => 7200
						);
					
					$cap = create_captcha($vals);
					echo $cap['image'];
						
						?>
                        </div>
                        <div class="form-group">
                    <label for="status">Captcha</label>
                         <input type="text" class="form-control" name="captcha"  placeholder="Captcha" required>
                         <input type="hidden" class="form-control" name="captcha_tmp"  value="<?php echo $vals['word']?>">
                        </div>
                </form>
                <div class="panel-footer">
                	<button type="submit" class="btn btn-primary btn-block" form="form_signup">
                    <i class="glyphicon glyphicon-log-in"></i> Daftar
                    </button>
                </div>
             
            	</div>
           </div>
           </div>

<?PHP
	$this->load->view('footer_v');
?>