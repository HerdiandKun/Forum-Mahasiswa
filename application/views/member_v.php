<?PHP
	$this->load->view('header_v');
?>

<div class="container">
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Member</h4>
            </div>
            <div class="pull-right">
		</div>
        <div class="clearfix"></div>
        </div>
		<?PHP
		if($this->uri->segment(3)=="error_save")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Disimpan
            </div>
        <?php
        }
		?>
         
       
        	<div class="panel-body">
            <table class="table table-responsive">
            <thead>
            	<tr>
                	<th>Username</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Program Keahlian</th>
                    <th>Jenis Kelamin</th>
					<th>Tanggal Lahir</th>
					<th>Tanggal Daftar</th>
                    <?PHP if($this->session->userdata('status') == 0) 
					{
					?>
                    <th>Modifikasi</th>
                    <?PHP
					}
					?>
                </tr>
               </thead>
               <tbody>
                <?PHP 
					$query = $this->pengguna_m->view(); 
					
					foreach($query->result() AS $row) :
				?>
                <tr>
				<td>
				<a href="<?php echo base_url();?>profil?username=<?php echo $row->username;?>"><?php echo $row->username; ?></a>
                <input type="hidden" id="nama_<?php echo $row->NIM;?>" value="<?php echo $row->Nama;?>">
				<input type="hidden" id="nim" value="">
                </td>
                <td><?php echo $row->Nama;?></td>
				<td><?php echo $row->NIM;?></td>
				<td><?php echo $row->PK;?></td>
                <td><?php echo $row->JenisKelamin == "L" ? "Pria" : "Wanita";?></td>
                <td><?php echo $row->ttl;?></td>
				<td><?php echo $row->daftar;?></td>
                <?PHP if($this->session->userdata('status') == 2) {?>
                    <td>
                    	<button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->NIM;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
                    </td>
                    </td>
                    <?PHP
					}
					?>    
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
    </div>

<?PHP
	$this->load->view('footer_v');
?>
        
<script type="text/javascript">
	$(document).ready(function()
	{
		$('.delete').click(function(){
		var id = this.id.substr(6);
		//alert(id);
		$('#nim').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		$('#delete').show();
		});
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>member/delete/' + $('#nim').val();;
		});
		
		$('.excel').click(function(){
			window.location = '<?php echo site_url();?>member/excel';
		});
		$('.pdf').click(function(){
			window.location = '<?php echo site_url();?>member/pdf';
		});
		$('.table').dataTable();
	});
</script>
        
