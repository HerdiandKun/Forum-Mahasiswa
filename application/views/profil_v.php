<?PHP
	$this->load->view('header_v');
?>

<div class="container">
	<?PHP
		if($this->uri->segment(3)=="error_save")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Disimpan
            </div>
        <?php
        }else if($this->uri->segment(3)=="error_pass")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Password tidak Cocok
            </div>
        <?php
        }
		?>   

		<?PHP
				$user = $this->input->get('username');
				$this->pengguna_m->set_username($user);
				$query = $this->pengguna_m->view_by_uname();
				//$row = fetch_object($query->result());
				foreach($query->result() as $row) :
			
				?>
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Profil Pengguna</h4>
            </div>
            <div class="pull-right">
			<?php if ($this->session->userdata('username') == $user){
			?>
             <button class="btn btn-warning btn-default edit" title="ubah" data-toggle="modal" data-target="#modal_profil" id="edit_<?php echo $row->username;?>" name="edit_<?php echo $row->username;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>  
                 <button class="btn btn-danger btn-default edit_pass" title="ubah" data-toggle="modal" data-target="#modal_password"><i class="glyphicon glyphicon-edit"> Ubah Username dan Password</i></button>  
        	<?php
			}
			?>
			
			</div>
        <div class="clearfix"></div>
        </div> 
        	<div class="panel-body">
            <table class="table">
            <head>
            	<tr>
                	<th>username</th>
					<td><?php echo $row->username;?></td>
                	
                </tr>
			   	<tr>
                	<th>Nama Mahasiswa</th>
					<td><?php echo $row->Nama;?></td>
                </tr>
                <tr>
                	<th>NIM</th>
					<td><?php echo $row->NIM;?></td>
                </tr>
             	<tr>
                	<th>Program Keahlian</th>
					<td><?php echo $row->PK;?></td>
                </tr>
                <tr>
                	<th>Jenis Kelamin</th>
					<td><?php echo $row->JenisKelamin == "L" ? "Pria" : "Wanita";?></td>
                </tr>  
                <tr>
                	<th>Tanggal Lahir</th>
					<td><?php echo $row->ttl;?></td>
                </tr>  
				<tr>
                	<th>Tanggal Daftar</th>
					<td><?php echo $row->daftar;?></td>
                </tr>
				<tr>
                	<th>Jumlah Post</th>
					<td><?php echo $row->JumlahPost;?></td>
                </tr>
				<?php if ($this->session->userdata('username') == $user){
				?>
				<tr>
                	<form method="post" id="form_edit_member"  enctype="multipart/form-data" role="form" action="<?php echo site_url(); ?>member/upload">
                                    <div class="form-group">
                                 	<label for="photo">Upload Foto</label>
                                    <input type="file" name="photo" id="photo" />  
                                   </div>
								   <button type="submit" >Ganti Foto</button>
                    </form>
                </tr>
				<?php
					}
				?>
				<tr>
                	<td colspan="2" align="center">
					<img src="<?php echo site_url()?>assets/photo/<?PHP echo $row->photo; ?>">
					</td>
				</tr>				
               </head>
			<div class="modal fade" id="modal_profil">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Ubah Data Mahasiswa</h4>
                                </div>
                                <div class="modal-body">
                    			  <form method="post" id="form_edit_member"  role="form" action="<?php echo site_url(); ?>member/update_m">
                                   <div class="form-group">
                                 	<label>NIM</label>
                                    <input type="text" disabled="disabled" class="form-control" name="nim" id="nim" placeholder="NIM" value="<?php echo $row->NIM;?>" required>  
                                    <input type="hidden" name="nim_tmp" id="nim_tmp" value="<?php echo $row->NIM;?>"/>
                                   </div>
                                   <div class="form-group">
                                 	<label>Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $row->Nama;?>"required>  
                                   </div>
                                    <div class="form-group">
                                 	<label>Jenis Kelamin</label>
                                    <input type="radio"  name="jk" id="pria" value="L" checked /> Pria
                					<input type="radio"  name="jk" id="wanita" value="P" /> Wanita
                                    <!--<input type="text" class="form-control" name="jk" id="jk" placeholder="L/P" required>  -->
                                   </div>
                                   <div class="form-group">
                                 	<label>Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="tl" id="tl" placeholder="(yyyy-mm-dd)" value="<?php echo $row->ttl;?>" required>  
                                   </div>
                                    
                                    </form>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-primary btn-small" type="submit" form="form_edit_member" id="update">Perbaharui</button>
                                   <button class="btn btn-primary btn-small"data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                </div>   
				<?php
			   endforeach;
			   ?>
               <body>
               </body>
            </table>
            
         	
                <div class="modal fade" id="modal_password">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Ubah Username dan Password </h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_edit_password" action="<?php echo site_url(); ?>member/password">
                                   <div class="form-group">
                                 	<label>username baru</label>
                                    <input type="text" class="form-control" name="user" id="user" placeholder="Username" required>  
                                    </div>
                                   <div class="form-group">
                                 	<label>Password Lama</label>
                                    <input type="password" class="form-control" name="pass_lama" id="pass_lama" placeholder="Password Lama" required>  
                                   </div>
                                                                      <div class="form-group">
                                 	<label>Password Baru</label>
                                    <input type="password" class="form-control" name="pass_baru" id="pass_baru" placeholder="Password Baru" required>  
                                   </div>
                                   <div class="form-group">
                                   <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="konf_password" id="konf_password" placeholder="Konfirmasi Password" required>  
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-primary btn-small" type="submit" form="form_edit_password" id="update">Perbaharui</button>
                                   <button class="btn btn-primary btn-small"data-dismiss="modal">Batal</button>
                                	</div>
                            	</div>
                        	</div>
                		</div>        
                    </div>
 		       </div>
          </div>
        </div>
    </div>

<?PHP
	$this->load->view('footer_v');
?>
        
        