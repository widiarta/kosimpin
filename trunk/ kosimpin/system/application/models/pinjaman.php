<?php

class Pinjaman extends Base_Model {

    function __construct()
    {
        parent::__construct();
        $this->init("pinjaman","id");
    }
	
    function get_saldo($kode_anggota)
    {
        return 100000;
    }
	
    function get_record($tgl_awal,$tgl_sampai)
    {
        $this->db->select("*")
		 ->from("pinjaman")
		 ->where("tgl_transaksi","$tgl_awal",">=")
		 ->where("tgl_transaksi","$tgl_sampai","<=");

        $rec = $this->db->get();
	if($rec->num_rows()>0)
	{
            return $rec->result();
	}
		
	return FALSE;
    }
	
    function bayar_pinjaman()
    {
    }
	
    function batalkan_pinjaman()
    {
    }
	
    function get_detail_pembayaran()
    {
    }
}

/* End of file pinjaman.php */
/* Location: ./system/application/models/pinjaman.php */