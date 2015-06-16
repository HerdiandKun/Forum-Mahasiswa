<?php class Thread_M extends CI_Model
{
	private $id_thread;
	private $id_topik;
	private $judul;
	private $isi;
	private $username;
	private $idi_komen;
	private $jumlah_komen;
	private $viewer;

	public function set_id_topik($value)
	{
		$this->id_topik=$value;
	}
	public function set_id_komen($value)
	{
		$this->id_komen=$value;
	}
	public function set_id_thread($value)
	{
		$this->id_thread=$value;
	}
	public function set_judul($value)
	{
		$this->id_judul=$value;
	}		
	public function set_isi($value)
	{
		$this->id_isi=$value;
	}
	public function set_username($value)
	{
		$this->id_username=$value;
	}
	public function set_jumlah_komen($value)
	{
		$this->jumlah_komen=$value;
	}
	public function set_viewer($value)
	{
		$this->viewer=$value;
	}	
	
	
	
	public function get_id_topik()
	{
		return $this->id_topik;
	}
	public function get_id_thread()
	{
		return $this->id_thread;
	}
	public function get_judul()
	{
		return $this->id_judul;
	}
	public function get_isi()
	{
		return $this->id_isi;
	}
	public function get_username()
	{
		return $this->id_username;
	}
	public function get_id_komen()
	{
		return $this->id_komen;
	}
	public function get_jumlah_komen()
	{
		return $this->jumlah_komen;
	}
	public function get_viewer()
	{
		return $this->viewer;
	}
	
	public function view($j)
		{
			$sql = "SELECT * FROM thread WHERE id_thread='".$j."'";	
			return $this->db->query($sql);
		}

	public function view_coment($j)
		{
			$sql = "SELECT * FROM komentar WHERE id_thread='".$j."' order by tanggal_komentar asc";	
			return $this->db->query($sql);
		}
	public function tambah()
		{
			$sql = "insert into thread values('','".$this->get_judul()."','".$this->get_isi()."','".$this->get_id_topik()."',now(),'".$this->get_username()."','','')";	
			 $this->db->query($sql);
		}
	public function ubah()
		{
			$sql = "update thread set judul='".$this->get_judul()."' , isi_thread='".$this->get_isi()."',tanggal=now() where id_thread='".$this->get_id_thread()."'";	
			 $this->db->query($sql);
		}
	public function komen()
		{
			$sql = "Insert into komentar values('','".$this->get_isi()."','".$this->get_id_thread()."',now(),'".$this->get_username()."')";	
			 $this->db->query($sql);
		}
	public function delete()
		{
			$sql = "DELETE FROM thread where id_thread='".$this->get_id_thread()."'";	
			 $this->db->query($sql);
		}
	public function delete_k()
		{
			$sql = "DELETE FROM komentar where id_thread='".$this->get_id_thread()."'";	
			 $this->db->query($sql);
		}
	public function delete_kom()
		{
			//echo $this->get_id_komen();
			$sql = "DELETE FROM komentar where id_komentar='".$this->get_id_komen()."'";	
			 $this->db->query($sql);
		}
		public function max_kom()
		{
			$sql = "SELECT MAX(jml_komen) as jml FROM thread where id_thread='".$this->get_id_thread()."'";	
			return $this->db->query($sql);
		}
		public function viewer()
		{
			$sql = "SELECT MAX(viewer) as jml FROM thread where id_thread='".$this->get_id_thread()."'";	
			return $this->db->query($sql);
		}
		public function update_view()
		{
			$sql = "update thread set viewer='".$this->get_viewer()."' where id_thread='".$this->get_id_thread()."'";	
			return $this->db->query($sql);
		}
		public function update_kom()
		{
			$sql = "update thread set jml_komen='".$this->get_jumlah_komen()."' where id_thread='".$this->get_id_thread()."'";	
			return $this->db->query($sql);
		}
		public function jumlah_thread()
		{
			$sql = "SELECT id_topik, judul, (SELECT COUNT( * )FROM thread
					WHERE thread.id_topik = topik.id_topik) AS jum FROM topik";
			return $this->db->query($sql);
		}
		
}

?>