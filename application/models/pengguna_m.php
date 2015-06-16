<?PHP
	class Pengguna_M extends CI_Model
	{
		//Properti
		
		private $username;
		private $password;
		private $nama;
		private $nim;
		private $jk;
		private $tgl;
		private $pk;
		private $status;
		private $jumlah_post;
		private $photo;
		private $password_baru;
		
		//Method
		
		public function set_username($value)
		{
			$this->username = $value;	
		}
		
		public function set_password($value)
		{
			$this->password = $value;	
		}
		
		public function set_status($value)
		{
			$this->status = $value;	
		}
		public function set_nama($value)
		{
			$this->nama = $value;	
		}
		public function set_nim($value)
		{
			$this->nim = $value;	
		}
		public function set_pk($value)
		{
			$this->pk = $value;	
		}
		public function set_jk($value)
		{
			$this->jk = $value;	
		}
		public function set_tgl($value)
		{
			$this->tgl = $value;	
		}
		public function set_jumlah_post($value)
		{
			$this->jumlah_post = $value;	
		}
		public function set_photo($value)
		{
			$this->photo = $value;	
		}		
		public function set_password_baru($value)
		{
			$this->password_baru = $value;	
		}				
		//Method Setter - Getter
		
		public function get_username()
		{
			return $this->username;
		}
		
		public function get_password()
		{
			return $this->password;
		}
		
		public function get_status()
		{
			return $this->status;
		}
		public function get_nama()
		{
			return $this->nama;
		}
		public function get_nim()
		{
			return $this->nim;
		}
		public function get_pk()
		{
			return $this->pk;
		}
		public function get_jk()
		{
			return $this->jk;
		}
		public function get_tgl()
		{
			return $this->tgl;
		}
		public function get_jumlah_post()
		{
			return $this->jumlah_post;
		}
		public function get_photo()
		{
			return $this->photo;
		}
		public function get_password_baru()
		{
			return $this->password_baru;
		}
		
		//Method
		
		public function view_by_username()
		{
			$sql = "SELECT * FROM pengguna WHERE username = '".$this->get_username()."' or nim = '".$this->get_nim()."'";	
			return $this->db->query($sql);
			
		}
	
		public function view_by_username_password()
		{
			$sql = 'SELECT * FROM pengguna WHERE username = "'.$this->get_username().'" AND password= md5("' .$this->get_password().'")';	
			return $this->db->query($sql);
			
		}
				public function view_by_password()
		{
			$sql = "SELECT * FROM pengguna WHERE password= md5('" .$this->get_password()."')";	
			return $this->db->query($sql);
			
		}
		public function daftar()
		{
			$sql = "INSERT INTO pengguna values('','"
					.$this->get_username()."' ,
					md5('".$this->get_password()."'),'"
					.$this->get_nama()."','"
					.$this->get_nim()."','"
					.$this->get_pk()."','"
					.$this->get_jk()."','1','"
					.$this->get_tgl()."',now(),'','gambar_burung_garuda.png')";	
			return $this->db->query($sql);
		}
		public function view()
		{
			$sql = "SELECT * FROM pengguna WHERE status = '1'";	
			return $this->db->query($sql);	
		}
		public function view_by_uname()
		{
			$sql = "SELECT * FROM pengguna WHERE username = '".$this->get_username()."'";	
			return $this->db->query($sql);	
		}
		public function view_detail($user)
		{
			$sql = "SELECT * FROM pengguna WHERE username = '".$user."'";	
			return $this->db->query($sql);	
		}
		public function delete()
		{
			$sql = "DELETE FROM pengguna where nim='".$this->get_nim()."'";	
			$this->db->query($sql);
		}
		public function jumlah_post()
		{
			$sql = "SELECT MAX(jumlahPost) as jml from pengguna where username='".$this->get_username()."'";	
			return $this->db->query($sql);
		}
		public function update_jumlah()
		{
			$sql = "UPDATE pengguna set jumlahPost='".$this->get_jumlah_post()."' where username='".$this->get_username()."'";	
			 $this->db->query($sql);
		}
		public function update()
		{
			$sql = "UPDATE pengguna set nama='".$this->get_nama()."',JenisKelamin='".$this->get_jk()."',ttl='".$this->get_tgl()."' where username='".$this->get_username()."'";	
			 $this->db->query($sql);
		}
		public function update_p()
		{
			$sql = "UPDATE pengguna set photo='".$this->get_photo()."' where username='".$this->session->userdata('username')."'";	
			 $this->db->query($sql);
		}
		public function update_u()
		{
			$sql = "UPDATE pengguna set username='".$this->get_username()."',password=md5('".$this->get_password_baru()."') where username='".$this->session->userdata('username')."'";	
			 $this->db->query($sql);
		}
		public function update_k()
		{
			$sql = "UPDATE komentar set username='".$this->get_username()."' where username='".$this->session->userdata('username')."'";	
			 $this->db->query($sql);
		}
				public function update_t()
		{
			$sql = "UPDATE thread set username='".$this->get_username()."' where username='".$this->session->userdata('username')."'";	
			 $this->db->query($sql);
		}
	}
?>