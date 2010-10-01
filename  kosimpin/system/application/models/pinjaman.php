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
	
	function get_saldo_per_anggota($id_anggota=null)
    {
        $fields = "sum(jumlah_pinjaman) as 'tpinjaman',sum(saldo+jumlah_jasa) as 'tsaldo',sum(jumlah_jasa) as 'tjasa',pinjaman.id_anggota,anggota.nama";
        $this->db->select($fields)
                 ->from($this->table_name)
                 ->join("anggota","anggota.id=pinjaman.id_anggota","inner")
                 ->group_by("anggota.nama")
				 ->order_by("tsaldo","desc")
                ;


        if($id_anggota!=null)
        {
            $this->db->where("pinjaman.id_anggota",$id_anggota);
        }
        
        $rec = $this->db->get();
        
        if($rec->num_rows()>0)
        {
            return $rec->result();
        }
        return FALSE;
    }
	
}

/* End of file pinjaman.php */
/* Location: ./system/application/models/pinjaman.php */