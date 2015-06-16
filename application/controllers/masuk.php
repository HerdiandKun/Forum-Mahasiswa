<?PHP
	class Masuk extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			
			$this->load->model('pengguna_m');
			}
		public function index()
			{
				$this->load->view('masuk_v');
				}
		public function login()
			{
				$this->pengguna_m->set_username($this->input->post('username'));
				$this->pengguna_m->set_password($this->input->post('password'));
				$query = $this->pengguna_m->view_by_username_password();
				
				if($query->num_rows())
				{
					$row = $query->row();
					$this->session->set_userdata('username',$row->username);
					$this->session->set_userdata('status',$row->status);
					//echo "Ada";
					redirect(site_url());
				}
				else
					redirect(site_url().'masuk/index/error');
			}
		public function logout()
			{
					//$this->session->set_userdata('username','');
					//$this->session->unset_userdata('username');
					$this->session->sess_destroy();
					redirect(site_url());
			}
		}
?>