<?PHP
	class Profil extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			
			$this->load->model('pengguna_m');
			}
		public function index()
			{
				$this->load->view('profil_v');
			}
		public function view()
		{
			$this->pengguna_m->set_username($this->session->userdata('username'));
			$this->pengguna_m->view_by_uname();
			redirect(site_url().'profil');
		}/*
		public function update()
		{
			$this->pengguna_m->set_nim($this->input->post('nip_tmp'));
			$this->pengguna_m->set_nama($this->input->post('nama'));
			$this->pengguna_m->update();
			if($this->session->userdata('status') == 1)
			redirect(site_url().'profil');
			else
			redirect(site_url().'');
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
					$this->pengguna_m->update_p();
					$this->session->set_userdata('username',$this->input->post('user'));
					redirect(site_url().'profil_mhs');
					}else
						redirect(site_url().'profil_mhs/index/error_save');
					}else
					redirect(site_url().'profil_mhs/index/error_pass');
				}*/
				
		}
?>