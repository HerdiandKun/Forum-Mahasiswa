<?PHP
	$this->load->view('header_v');
?>
       
<div class="container" >

<div class="panel panel-default">
        <div class="panel-heading">
<select class="image-picker show-html">
  <option data-img-src="<?php echo base_url();?>assets/img/banner1.jpg" value="1">  Page 1  </option>
  <option data-img-src="<?php echo base_url();?>assets/img/banner2.jpg" value="2">  Page 2  </option>
  <option data-img-src="<?php echo base_url();?>assets/img/banner3.png" value="3">  Page 3  </option>
  <option data-img-src="<?php echo base_url();?>assets/img/banner4.png" value="4">  Page 4  </option>
  </select>
		<h4>Thread Terpopuler</h4>
		</div>
        	<div class="panel-body">
            <table class="table table-responsive">
            <thead>
            	<tr>
                	<th width="5%">No</th>
                    <th>Judul Thread</th>
                    <th width="35%">Jumlah Komentar</th>
					<th width="10%">Viewer</th>			
                </tr>
               </thead>
               <tbody>
			   
			   <?php
					//echo $this->input->get('id_topik');
					$query = $this->beranda_m->view_pop();
					$no=0;
					foreach($query->result() AS $row) :
					$id_thread = $row->id_thread;
					$no++;					
				?>
				
				<tr>
				<td width="5%">
				<?php echo $no;?>
                </td>
                <td width="75%">
				<input type="hidden" name="id_thread" id="id_thread">
				<a  href="thread?id_thread=<?php echo $row->id_thread; ?>"><b><?php echo $row->Judul;?></b></a>
				</td>
                <td width="35%"><?php echo $row->jml_komen; ?></td>
				<td width="10%"><?php echo $row->viewer; ?></td>    
                </tr>
                
                <?PHP 
				endforeach;
				?>
			   
               </tbody>
            </table>      
            </div>
        </div>
		




			<div class="modal fade" id="modal_topik">
				<div class="modal-dialog">
									<div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Tambah Topik</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_topik" >
                                   <div class="form-group">
                                 	<label>Judul Topik</label>
                                    <input type="text" class="form-control" name="topik" id="topik" placeholder="Judul Topik" required>
                                    <input type="hidden" class="form-control" name="id_kategori" id="id_kategori" placeholder="Judul Topik" required>  
                                    </div>
								   </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-small" id="tambah_topik" type="submit" form="form_topik">Tambah</button>
                                   <button class="btn btn-primary btn-sm" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
					</div>

	<?PHP 
		$i=0;
		$query = $this->beranda_m->view_by_kategori(); 
			foreach($query->result() AS $row) :
			$i++;
	?>
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h3><?php echo $row->Nama_Kategori?></h3>
            </div>
            <div class="pull-right">
					<?PHP if($this->session->userdata('status') == 1) 
						{
						?>
						   <button class="btn btn-default topik" id="tambah_<?php echo $row->id_kategori?>" data-toggle="modal" data-target="#modal_topik">Tambah Topik</button>
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
                	<th>No</th>
                    <th>Topik</th>
                    <th>Jumlah Thread</th>
					<?PHP if($this->session->userdata('status') == 2) 
						{
						?>
						<th>Hapus Thread</th>
					<?PHP
						}
					?>	
                    
                </tr>
               </thead>
               <tbody>
                <?PHP 
					$query = $this->beranda_m->view_by($i); 
					$no=0;
					foreach($query->result() AS $row) :
					$no++;
				?>
                <tr>
				<td width="5%">
				<?php echo $no;?>
                </td>
                <td width="75%">
				<input type="hidden" name="id_topik" id="id_topik">
				<a  href="topik?id_topik=<?php echo $row->id_topik; ?>&id_kat=<?php echo $i;?>"><b><?php echo $row->Judul;?></b></a>
				</td>
                <td width="20%"><?php echo $row->jumlah_thread; ?></td>
				<td>
				<?PHP
						if($this->session->userdata('status') == 2) 
						{
						?>
						<button class="btn btn-danger btn-md delete" title="tambah" id="hapus_<?php echo $row->id_topik;?>" 
						data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
						<?PHP
						}
						?></td>
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
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
		 <?PHP 
				endforeach;
		?>
         </div>
<?PHP
	$this->load->view('footer_v');
?>
        
<script type="text/javascript">
$(document).ready(function(e) {
	
	$('.topik').click(function(){
		var id = this.id.substr(7);
		//alert(id);
		$('#id_kategori').val(id);
		$('#form_topik').attr('action','<?php echo site_url(); ?>topik/tambah');
		});
		
	$('.delete').click(function(){
		var id = this.id.substr(6);
		//alert(id);
		$('#id_topik').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		$('#delete').show();
		});
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>beranda/delete_top/' + $('#id_topik').val();
		});	
		
		
});

</script>