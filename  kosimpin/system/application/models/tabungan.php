<?php

class Tabungan extends Base_model {

    function __construct()
    {
        parent::__construct();
        $this->init("tabungan", "id");
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

    /**
     * Data total saldo peranggota. adalah data in - out
     */
    function get_saldo_per_anggota($type=null)
    {
        $fields = "sum(jumlah_in),sum(jumlah_out),sum(jumlah_in-jumlah_out) as 'saldo',tabungan.id_anggota,anggota.nama";
        $this->db->select($fields)
                 ->from($this->table_name)
                 ->join("anggota","anggota.id=tabungan.id_anggota","inner")
                 ->join("jenis_tabungan","jenis_tabungan.id=tabungan.id_jenis_tabungan","inner")
                 ->group_by("anggota.nama")
                ;

        if($type!=null)
        {
            $this->db->where("tabungan.id_jenis_tabungan",$type);
        }
        
        $rec = $this->db->get();
        
        if($rec->num_rows()>0)
        {
            return $rec->result();
        }

        return FALSE;
    }

    function get_saldo_per_type()
    {
        $fields = "sum(jumlah_in),sum(jumlah_out),sum(jumlah_in-jumlah_out) as 'saldo',
                   tabungan.id_jenis_tabungan,jenis_tabungan.jenis_tabungan";
        $this->db->select($fields)
                 ->from($this->table_name)
                 ->join("jenis_tabungan","jenis_tabungan.id=tabungan.id_jenis_tabungan","inner")
                 ->group_by("tabungan.id_jenis_tabungan")
                ;

        $rec = $this->db->get();
        if($rec->num_rows()>0)
        {
            return $rec->result();
        }

        return FALSE;
    }

    function get_total_saldo($type=null)
    {
        $fields = "sum(jumlah_in),sum(jumlah_out),sum(jumlah_in-jumlah_out) as 'saldo',tabungan.id_anggota,anggota.nama";
        $this->db->select($fields)
                 ->from($this->table_name)
                 ->join("anggota","anggota.id=tabungan.id_anggota","inner")               
                ;

        if($type!=null)
        {
            
        }
        
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