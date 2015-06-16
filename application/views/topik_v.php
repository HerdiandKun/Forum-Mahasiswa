<?PHP
	$this->load->view('header_v');
?>
       
<div class="container">

			

    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
			<?php
			$user =$this->session->userdata('username');
			//echo $user;
				$i = $this->input->get('id_kat');
				$j = $this->input->get('id_topik');
				$query1 = $this->topik_m->view_kat($i); 
					foreach($query1->result() AS $row1) :
				$query2 = $this->topik_m->view_top($j); 
				foreach($query2->result() AS $row2) :
			?>
            <h3><?php echo $row1->nama_kategori;?>--><?php echo $row2->Judul;?></h3>
            </div>
            <div class="pull-right">
			<?PHP if($this->session->userdata('status') == 1) 
						{
						?>
						   <button class="btn btn-default thread" id="tambah_<?php echo $j?>" data-toggle="modal" data-target="#modal_thread">Tambah Thread</button>
						<?PHP
						}
						?>	
       </div>
        <div class="clearfix"></div>
        </div>      
        	<div class="panel-body">
            <table class="table table-responsive">
            <thead>
            	<tr>
                	<th width="5%">No</th>
                    <th>Judul Thread</th>
                    <th width="35%">Jumlah Komentar</th>
					<th width="10%">Viewer</th>
					<?PHP if($this->session->userdata('status') == 2) 
						{
						?>
						<th width="10%">Modifikasi</th>
						<?PHP
						}
						?>	
					
                    
                </tr>
               </thead>
               <tbody>
			   
			   <?php
					//echo $this->input->get('id_topik');
					$query3 = $this->topik_m->view($j);
					$no=0;
					foreach($query3->result() AS $row) :
					$id_thread = $row->id_thread;
					$no++;					
				?>
				
				<tr>
				<td width="5%">
				<?php echo $no;?>
                </td>
                <td width="75%">
				<input type="hidden" name="id_thread" id="id_thread">
				<a  href="thread?id_thread=<?php echo $row->id_thread; ?>">
				<b><?php echo $row->Judul;?></b></a><br />
				<font size="-1">Oleh : <a href="<?php echo base_url();?>profil?username=<?php echo $row->username;?>"><?php echo $row->username; ?></a> waktu : <?php echo $row->tanggal; ?></font>
				
				</td>
                <td width="35%"><?php echo $row->jml_komen; ?></td>
				<td width="10%"><?php echo $row->viewer; ?></td>
				<?PHP if($this->session->userdata('status') == 2) 
				
				{?>
                    <td>
						
                    	<button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->id_thread;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
                    </td>
                   
                    <?PHP
					}
					
					?>    
                </tr>
                
                <?PHP 
				endforeach;
				?>
			   
               </tbody>
            </table>
			<div class="modal fade" id="modal_thread">
				<div class="modal-dialog">
									<div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Tambah Thread</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_thread" >
                                   <div class="form-group">
                                 	<label>Judul Thread</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Topik" required>
                                    <input type="hidden" class="form-control" name="id_topik" id="id_topik" placeholder="Judul Topik"  value="<?php echo $j?>">
									<input type="hidden" class="form-control" name="id_kat" id="id_kat" placeholder="Judul Topik"  value="<?php echo $i?>">
									  <input type="hidden" class="form-control" name="username" id="username" placeholder="Judul Topik" value="<?php echo $user?>">
                                   </div>
								   <div class="form-group">
                                 	<label>Isi</label>
                                   <textarea class="ckeditor" name="thread" id="thread"></textarea>
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
				endforeach;
				endforeach;
		?>
		
<?PHP
	$this->load->view('footer_v');
?>

<script type="text/javascript">
$(document).ready(function(e) {
	$('.thread').click(function(){
		var id = this.id.substr(7);
		//alert(id);
		$('#form_thread').attr('action','<?php echo site_url(); ?>thread/tambah');
		});
	$('.delete').click(function(){
		var id = this.id.substr(6);
		//alert(id);
		$('#id_thread').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		$('#delete').show();
		});
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>thread/delete/' + $('#id_thread').val();;
		});
		
});


</script>