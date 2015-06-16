<?php 
class Member extends CI_Controller{

	public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('pengguna_m');
		}
	public function index()
	{
		$this->load->view('member_v');	
	}
	public function delete()
		{
			
			$this->pengguna_m->set_nim($this->uri->segment(3));
			$this->pengguna_m->delete();
			redirect(site_url().'member');
		}
	public function update_m()
		{	
			$this->pengguna_m->set_username($this->session->userdata('username'));
			
			
				$this->pengguna_m->set_nama($this->input->post("nama"));
				$this->pengguna_m->set_jk($this->input->post("jk"));
				$this->pengguna_m->set_tgl($this->input->post("tl"));
				//$this->pengguna_m->set_photo($this->input->post("photo"));
				$this->pengguna_m->update();
				redirect(site_url().'profil?username='.$this->session->userdata('username'));
		}
		public function upload()
		{
			$config['upload_path'] = './assets/photo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '3000';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';
			
			$this->load->library("upload", $config);
			
			if($this->upload->do_upload("photo"))
			{
				$data = $this->upload->data();
				
				$this->pengguna_m->set_photo($data["file_name"]);
				
				$this->pengguna_m->update_p();
				$this->load->view("profil_v");
			}
			else
			{
				echo $this->upload->display_errors();
			}
		}
		public function password()
			{
			if($this->input->post('pass_baru')== $this->input->post('konf_password'))
				{
					$this->pengguna_m->set_password($this->input->post('pass_lama'));
					
					$query = $this->pengguna_m->view_by_password();
					
					if($query->num_rows())
					{
					$this->pengguna_m->set_username($this->input->post('user'));
					$this->pengguna_m->set_password_baru($this->input->post('pass_baru'));
					$this->pengguna_m->update_u();
					$this->pengguna_m->update_k();
					$this->pengguna_m->update_t();
					$this->session->set_userdata('username',$this->input->post('user'));
					redirect(site_url().'profil?username='.$this->session->userdata('username'));
					}else
						redirect(site_url().'profil/index/error_save');
					}else
					redirect(site_url().'profil/index/error_pass');
				}
}
?>