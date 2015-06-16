<?php 
class Statistik extends CI_Controller{

	public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('thread_m');
	}
	public function index()
	{	
		$this->load->view('statistik_v');
	}
}
?>