<?PHP
	$this->load->view('header_v');
?>
       
	<div class="container">
    	<div class="panel panel-default">
			<?php
					$j = $this->input->get('id_thread');
					$query3 = $this->thread_m->view($j);
					foreach($query3->result() AS $row) :
				
			?>
            
		<div class="panel-heading">
			<h3><?php echo $row->Judul?></h3>
  
        </div>      
        	<div class="panel-body">
            <table background="transparent" width="100%" >
            
            	<tr>
                	<th width="25%">Empunya<br><hr></th>
                	<th ><?php echo $row->Judul;?><br><hr></th>
                </tr>
               
            <?php
					$user = $row->username;
					$query1 = $this->pengguna_m->view_detail($user);
					foreach($query1->result() AS $row1) :
					$post = $row1->JumlahPost;
					if($post < 15)
						$status = "Newbie";
					else if ($post >= 15 && $post<=30)
						$status = "Moderate";
					else if ($post >= 30)
						$status = "Master";
			?>
				<tr>
					<td  align="center" height="200px" valign="top" >
					
					<table width="100%" >
					  <tr>
						<td colspan="3" align="center"><img height="180" width="120" src="<?php echo site_url()?>assets/photo/<?PHP echo $row1->photo; ?>"></td>
					  </tr>
					  <tr>
						<td colspan="3" align="center"><br><a href="<?php echo base_url();?>profil?username=<?php echo $row->username;?>"><?php echo $row->username; ?></a></td>
					  </tr>
					  <tr>
						<td colspan="3"><?php echo $status;?></td>
					  </tr>
					  <tr>
						<td colspan="3"><hr></td>
					  </tr>
					  <tr>
						<td width="35%">UserID</td>
						<td width="5%">:</td>
						<td width="60%"><?php echo $row1->userID;?></td>
					  </tr>
					  <tr>
						<td>Jumlah Pos</td>
						<td>:</td>
						<td><?php echo $row1->JumlahPost;?></td>
					  </tr>
					  <tr>
						<td>Join</td>
						<td>:</td>
						<td><?php echo $row1->daftar;?></td>
					  </tr>
					</table>					
					</td>
					<td height="200px" valign="top" style="padding-left:10"><?php echo $row->isi_thread;?></td>
				</tr>
				<?php 
					endforeach;
				?>
				<tr>
					<td colspan="3"><hr>
					<div class="pull-left">
					 update terakhir = <?php echo $row->tanggal;?>
				</div>
					 <div class="pull-right">
						 <?PHP 
						 
						 if($this->session->userdata('username') == $row->username) 
						{
						?>
						   <button class="btn btn-primary  btn-md ubah_thread" title="tambah" data-toggle="modal" data-target="#modal_thread"><i class="glyphicon glyphicon-edit"> Ubah</i></button>
						<?PHP
						}
						?>
						 <?PHP if($this->session->userdata('status') == 1) 
						{
						?>
						   <button class="btn btn-primary btn-md komen"  title="tambah" data-toggle="modal" data-target="#modal_komentar"> <i class="glyphicon">Komentar</i></button>
						<?PHP
						}
						?>
				</div>
					</td>
				</tr>
            </table>
			<div class="modal fade" id="modal_thread">
				<div class="modal-dialog">
									<div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title" id="title">Tambah Thread</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_thread" >
                                   <div class="form-group" id="grup_judul">
                                 	<label>Judul Thread</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Thread" value="<?php echo $row->Judul;?>" required>
                                    <input type="hidden" class="form-control" name="id_topik" id="id_topik" placeholder="Judul Topik"  value="<?php echo $row->id_topik?>">
									<input type="hidden" class="form-control" name="id_thread" id="id_thread" placeholder="Judul Topik"  value="<?php echo $row->id_thread?>">									
									</div>
								   <div class="form-group" >
                                 	<label>Isi</label>
									
                                   <textarea class="ckeditor" name="thread" id="isi_thread"><?php echo $row->isi_thread;?></textarea>
                                  </div>
								   </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-sm" id="tambah_topik" type="submit" form="form_thread">Submit</button>
                                   <button class="btn btn-primary btn-sm" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
					</div>
					
					<div class="modal fade" id="modal_komentar">
				<div class="modal-dialog">
									<div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title" id="title">Komentar</h4>
                                </div>
                                <div class="modal-body">
								<form method="post" id="form_komen" action="<?php echo site_url(); ?>thread/komen">
								   <div class="form-group" >
                                 	<label>Isi</label>
                                   <input type="hidden" class="form-control" name="id_thread" id="id_thread" placeholder="Judul Topik"  value="<?php echo $row->id_thread?>">									
								   <textarea class="ckeditor" name="komen"></textarea>
                                  </div>
								   </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-sm" id="tambah_topik" type="submit" form="form_komen">Submit</button>
                                   <button class="btn btn-primary btn-sm" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
					</div>
			
            </div>
			  <div class="panel-heading">
			 
            <h3>Komentar</h3>
            
        <div class="clearfix"></div>
        </div> 
			<div class="panel-body">
            <table class="table table-responsive">
            <thead>
            	<tr>
                	<th width="20%">Empunya</th>
                	<th>Komentar</th>
					<th width="15%">Tanggal</th>
					<td width="17%">
						 <?PHP 
						if($this->session->userdata('status') == 1) 
						{
						?>
						 
						 <?PHP
						}
						?>
					</td>
                </tr>
               </thead>
		
               <tbody>	 
			   <?php 
			endforeach;
			$query3 = $this->thread_m->view_coment($j);
			foreach($query3->result() AS $row) :
			?>
			
		<?php
					$user = $row->username;
					$query1 = $this->pengguna_m->view_detail($user);
					foreach($query1->result() AS $row1) :
					$post = $row1->JumlahPost;
					if($post < 15)
						$status = "Newbie";
					else if ($post >= 15 && $post<=30)
						$status = "Moderate";
					else if ($post >= 30)
						$status = "Master";
					
			?>
				<tr>
					<td  align="center"  valign="top" width="25%">
					
					<table width="100%" >
					  <tr>
						<td colspan="3" align="center"><img height="150" width="120" src="<?php echo site_url()?>assets/photo/<?PHP echo $row1->photo; ?>"></td>
					  </tr>
					  <tr>
						<td colspan="3" align="center"><a href="<?php echo base_url();?>profil?username=<?php echo $row->username;?>"><?php echo $row->username; ?></a></td>
						<input type="hidden" id="id_kom" name="id_kom">
						
					  </tr>
					  <tr>
						<td colspan="3"><?php echo $status;?></td>
					  </tr>
					  <tr>
						<td width="35%">UserID</td>
						<td width="2%">:</td>
						<td width="60%"><?php echo $row1->userID;?></td>
					  </tr>
					  <tr>
						<td>Jumlah Pos</td>
						<td>:</td>
						<td><?php echo $row1->JumlahPost;?></td>
					  </tr>
					  <tr>
						<td>Join</td>
						<td>:</td>
						<td><?php echo $row1->daftar;?></td>
					  </tr>
					</table>					
					</td>
					<td height="200px" valign="top" style="padding-left:10" ><?php echo $row->isi_komentar;?></td>
				
					<td width="20%"><?php echo $row->tanggal_komentar;?></td>
					<td width="10%">
						<?PHP
						if($this->session->userdata('username') == $row->username || $this->session->userdata('status') == 2) 
						{
						?>
						<button class="btn btn-danger btn-md delete" title="tambah" id="hapus_<?php echo $row->id_komentar;?>" 
						data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
						<?PHP
						}
						?>
					</td>
					
				</tr>
				<?php 
					endforeach;
				?>
							<div class="modal fade" id="modal_ubah_komentar">
				<div class="modal-dialog">
									<div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title" id="title">Komentar</h4>
                                </div>
                                <div class="modal-body">
								<form method="post" id="form_ubah_komen" action="<?php echo site_url(); ?>thread/ubah_komen">
								   <div class="form-group" >
                                 	<label>Isi</label>
                                   <input type="text" class="form-control" name="id_komen" id="id_komen" placeholder="Judul Topik"  value="<?php echo $row->id_komentar?>">									
								   <textarea class="ckeditor" name="komen"><?php echo $row->isi_komentar;?></textarea>
                                  </div>
								   </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-sm" id="tambah_topik" type="submit" form="form_ubah_komen">Submit</button>
                                   <button class="btn btn-primary btn-sm" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
					</div>
					
				
			
		   <?php
				endforeach;
			?>
               </tbody>
            </table>
			    <div class="modal fade" id="modal_konfirmasi">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Konfirmasi</h4>
                                </div>
                                <div class="modal-body">
                    			   <p id="confirm_str">Apakah Anda Yakin Menghapus Semua</p>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-sm" id="delete">Ya</button>
                                   <button class="btn btn-primary btn-sm" data-dismiss="modal">Tidak</button>
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
	
<script type="text/javascript">
$(document).ready(function(e) {
	
	$('.ubah_thread').click(function(){
	//alert('KOMEN');
	$('#tread_s').hide();
	$('#isi_thread').val($('#tread_s').val());
	$('#title').html('Ubah Thread');
	$('#judul').attr('disabled',false);
	$('#grup_judul').show();
		$('#form_thread').attr('action','<?php echo site_url(); ?>thread/ubah');	
	});
	$('.delete').click(function(){
		var id = this.id.substr(6);
		//alert(id);
		$('#id_kom').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		$('#delete').show();
		});
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>thread/delete_kom/' + $('#id_kom').val()+ '/' + <?php echo $j; ?>;
		});
	
	
});
</script>