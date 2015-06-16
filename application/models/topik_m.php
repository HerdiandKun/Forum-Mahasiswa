<?php class Topik_M extends CI_Model
{
	private $id_topik;
	private $id_kategori;
	private $judul;
	private $jumlah_thread;
	
	public function set_id_topik($value)
	{
		$this->id_topik=$value;
	}	
	public function set_id_kategori($value)
	{
		$this->id_kategori=$value;
	}
	public function set_judul($value)
	{
		$this->judul=$value;
	}	
	public function set_jumlah_thread($value)
	{
		$this->jumlah_thread=$value;
	}		
	public function get_id_topik()
	{
		return $this->id_topik;
	}
	public function get_id_kategori()
	{
		return $this->id_kategori;
	}
	public function get_judul()
	{
		return $this->judul;
	}
	public function get_jumlah_thread()
	{
		return $this->jumlah_thread;
	}
	
	public function view_kat($i)
		{
			$sql = "SELECT nama_kategori FROM Kategori WHERE id_kategori='".$i."'";	
			return $this->db->query($sql);
		}
		public function view_top($j)
		{
			$sql = "SELECT Judul FROM Topik WHERE id_topik='".$j."'";	
			return $this->db->query($sql);
		}
	
	public function view($j)
		{
			$sql = "SELECT *  FROM thread WHERE id_topik='".$j."'";	
			return $this->db->query($sql);
		}
	public function jml_komen($id_thread)
		{
			$sql = "SELECT * FROM komentar WHERE id_thread='".$id_thread."'";	
			return $this->db->query($sql);
		}
	public function tambah()
		{
			$sql="INSERT INTO topik values('','".$this->get_judul()."','".$this->get_id_kategori()."','')";
			$this->db->query($sql);
		}
	public function thread()
		{
			$sql="SELECT MAX(jumlah_thread) as jml from topik where id_topik='".$this->get_id_topik()."'";
			return $this->db->query($sql);
		}
	public function update_topik()
		{
			$sql="update topik set jumlah_thread='".$this->get_jumlah_thread()."' where id_topik='".$this->get_id_topik()."'";
			$this->db->query($sql);
		}
}

?>