<?php class Beranda_M extends CI_Model
{
	private $id_kategori;
	private $id_topik;

	public function set_id_kategori($value)
	{
		$this->id_kategori=$value;
	}
	public function set_id_topik($value)
	{
		$this->id_topik=$value;
	}	
	public function get_id_topik()
	{
		return $this->id_topik;
	}
	
	public function view_by($i)
		{
			$sql = "SELECT * FROM topik WHERE id_kategori='".$i."'";	
			return $this->db->query($sql);
		}
		public function view_by_kategori()
		{
			$sql = "SELECT * FROM kategori";	
			return $this->db->query($sql);
		}
	public function delete_top()
		{
			$sql = "DELETE from topik where id_topik='".$this->get_id_topik()."'";	
			return $this->db->query($sql);
		}
	public function view_pop()
		{
			$sql = "SELECT * FROM thread order by viewer desc limit 0,5";	
			return $this->db->query($sql);
		}
	
}

?>