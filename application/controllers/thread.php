<?php 
class Thread extends CI_Controller{

	public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('thread_m');
			$this->load->model('topik_m');
			$this->load->model('pengguna_m');
		}
	public function index()
	{	
		if ($this->session->userdata('status')=='2')
		{
		$this->load->view('thread_v');
		}else{
		$j = $this->input->get('id_thread');
		$this->thread_m->set_id_thread($j);
		$query=$this->thread_m->viewer();
		foreach($query->result() AS $row) :
			$jml_awal = $row->jml;
		endforeach;
			$jml=$jml_awal + 1;
			$jml;
			$this->thread_m->set_viewer($jml);
			$this->thread_m->update_view();
		$this->load->view('thread_v');
		}
	}
	
	public function tambah()
	{	$kat = $this->input->post('id_kat');
		//echo $kat;
		
		$this->thread_m->set_id_topik($this->input->post('id_topik'));
		$this->topik_m->set_id_topik($this->input->post('id_topik'));
		$query=$this->topik_m->thread();
		foreach($query->result() AS $row) :
			$jml_awal = $row->jml;
		endforeach;
			$jml=$jml_awal + 1;
			$this->topik_m->set_jumlah_thread($jml);
			$this->topik_m->update_topik();
		$this->thread_m->set_judul($this->input->post('judul'));
		$this->thread_m->set_isi($this->input->post('thread'));
		$this->thread_m->set_username($this->input->post('username'));
			$this->pengguna_m->set_username($this->input->post('username'));
			$query2=$this->pengguna_m->jumlah_post();
			foreach($query2->result() AS $row) :
			$jml_awal = $row->jml;
			endforeach;
			$jml=$jml_awal + 1;
			$this->pengguna_m->set_jumlah_post($jml);
			$this->pengguna_m->update_jumlah();
		$this->thread_m->tambah();
		
		redirect(base_url().'topik?id_topik='.$this->input->post('id_topik').'&id_kat='.$kat);
	}
	public function ubah()
	{	
		$this->input->post('thread');
		$this->thread_m->set_id_thread($this->input->post('id_thread'));
		$this->thread_m->set_judul($this->input->post('judul'));
		$this->thread_m->set_isi($this->input->post('thread'));
		$this->thread_m->ubah();
		redirect(base_url().'thread?id_thread='.$this->input->post('id_thread'));
	}
	public function komen()
	{	
		$user = $this->session->userdata('username');
		//echo $user;
		$this->thread_m->set_id_thread($this->input->post('id_thread'));
		$query = $this->thread_m->max_kom();
		foreach($query->result() AS $row) :
			$jml_awal = $row->jml;
		endforeach;
			$jml=$jml_awal + 1;
			$this->thread_m->set_jumlah_komen($jml);
		//$this->thread_m->set_judul($this->input->post('judul'));
		$this->thread_m->set_isi($this->input->post('komen'));
		$this->thread_m->set_username($user);
		$this->thread_m->update_kom();
			$this->pengguna_m->set_username($user);
			$query2=$this->pengguna_m->jumlah_post();
			foreach($query2->result() AS $row) :
			$jml_awal = $row->jml;
			endforeach;
			$jml=$jml_awal + 1;
			$this->pengguna_m->set_jumlah_post($jml);
			$this->pengguna_m->update_jumlah();
		$this->thread_m->komen();
		redirect(base_url().'thread?id_thread='.$this->input->post('id_thread'));
	}
	public function delete()
		{
			$kat = $this->input->post('id_kat');	
			$this->thread_m->set_id_thread($this->uri->segment(3));
			$this->thread_m->delete();
			$this->thread_m->delete_k();
			redirect(base_url().'topik?id_topik='.$this->input->post('id_topik').'&id_kat='.$kat);
		}
	public function delete_kom()
		{
			$id_thread = $this->uri->segment(4);
			$this->thread_m->set_id_komen($this->uri->segment(3));
			$this->thread_m->delete_kom();
			redirect(base_url().'thread?id_thread='.$id_thread);
		}
}
?>