<?php

class Tabungan extends Model {

	function __construct()
	{
		parent::Model();	
	}
	
	function get_saldo($kode_anggota)
	{
		return 100000;
	}
	
	function get_record($tgl_awal,$tgl_sampai)
	{
		$this->db->select("*")
				 ->from("tabungan")
				 ->where("tgl_transaksi","$tgl_awal",">=")
				 ->where("tgl_transaksi","$tgl_sampai","<=");
		$rec = $this->db->get();
		if($rec->num_rows()>0)
		{
			return $rec->result();
		}
		
		return FALSE;
	}
}

/* End of file tabungan.php */
/* Location: ./system/application/models/tabungan.php */