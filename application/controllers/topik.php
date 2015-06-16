<?php 
class Topik extends CI_Controller{

	public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('topik_m');
		}
	public function index()
	{	
		$this->load->view('topik_v');
	}
	public function tambah()
	{
		$this->topik_m->set_id_kategori($this->input->post('id_kategori'));
		$this->topik_m->set_judul($this->input->post('topik'));
		$this->topik_m->tambah();
		redirect(base_url());
	}
}
?>