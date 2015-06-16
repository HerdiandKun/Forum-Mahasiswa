<?PHP
	$this->load->view('header_v');
?>
<div  class = "container">
	<div id="chartcont">
	
	</div>
</div>

<?PHP
	$this->load->view('footer_v');
?>

<script src="<?php echo base_url(); ?>assets/js/plugins/fusioncharts/fusioncharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/fusioncharts/themes/fusioncharts.theme.carbon.js"></script>
<script type="text/javascript">
	FusionCharts.ready(function() {
		var chart = new FusionCharts({
			//type: 'doughnut2d',
			//type: 'column2d',
			//type: 'doughnut2d',
			type: 'column3d',
			randerAt : 'chartcont',
			width: '100%',
			height: '400',
			//dataFormat: 'xml',
			dataFormat: 'json',
			dataSource: {
				'chart': {
					'caption': 'Grafik Jumlah Thread',
					'subCaption': 'Berdasarkan Topik',
					'xAxsisName': 'Topik',
					'yAxsisName': 'Jumlah Thread',
					'theme': 'carbon'
					},
				'data': [
				
				<?php 
					$query = $this->thread_m->jumlah_thread();
					$i = 0;
					
					foreach($query->result() as $row) :
						if($i++)
							echo ',';
				?>
						{'label': '<?php echo $row->judul; ?>', 'value': '<?php echo $row->jum; ?>'}
				<?php
					endforeach;
				?>
					]
			}
		});
		chart.render('chartcont');
	});
</script>