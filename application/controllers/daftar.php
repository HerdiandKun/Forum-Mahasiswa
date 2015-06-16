<?PHP
	class Daftar extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			
			$this->load->model('pengguna_m');
			}
			public function index()
			{
				$this->load->view('daftar_v');
			}
			public function tambah() 
			{	
				if($this->input->post('password')== $this->input->post('konf_password'))
				{
					if(strtolower($this->input->post('captcha'))!=$this->input->post('captcha_tmp'))
					{ 
					redirect(site_url().'daftar/index/error_cap');
					}else{
						$this->pengguna_m->set_username($this->input->post('username'));
						$this->pengguna_m->set_nim($this->input->post('nim'));
						$query = $this->pengguna_m->view_by_username();
						if($query->num_rows())
						{
							redirect(site_url().'daftar/index/error_save');
						}else
						{					
							$this->pengguna_m->set_password($this->input->post('password'));
							$this->pengguna_m->set_nama($this->input->post('nama'));
							$this->pengguna_m->set_pk($this->input->post('pk'));
							$this->pengguna_m->set_jk($this->input->post('jk'));
							$this->pengguna_m->set_tgl($this->input->post('tgl'));
							$query = $this->pengguna_m->daftar();
							redirect(site_url().'daftar/index/simpan');
						}
					}
				}
				else
				redirect(site_url().'daftar/index/error_pass');
			}
		}
?>