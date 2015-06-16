<?php 
class Beranda extends CI_Controller{

	public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('beranda_m');
		}
	public function index()
	{
		$this->load->view('beranda_v');
		
	}
	public function delete_top()
	{
			$this->beranda_m->set_id_topik($this->uri->segment(3));
			$this->beranda_m->delete_top();
			redirect(base_url());
	}
}
?>