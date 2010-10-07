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
	
	/**
	* id_anggota,tgl_transaksi,jumlah_pinjaman
	*/
	function new_pinjaman($data)
	{
		if(is_array($data) || is_object($data))
		{
			if(is_array($data))
			{
				$data = (Object) $data;
			}
			
			$id_anggota = (int) $data->id_anggota;
			$jumlah_pinjaman = (double) $data->jumlah_pinjaman;
			
			if($id_anggota>0 && $jumlah_pinjaman>0)
			{
				// @todo make percentage become configurable
				$jasa = (10*$jumlah_pinjaman)/100;
				$saldo = $jumlah_pinjaman + $jasa;
				
				//add to class
				$data = (array) $data;
				$data["jumlah_jasa"] = $jasa;
				$data["saldo"] = $saldo;
				
				$id = $this->save($data);
				return $id;
			}
			
			return FALSE;
		}
		
		return FALSE;
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
		else
		{		
			return FALSE;
		}
	}
	
	/**
	* data is array contain id_pinjaman,jumlah_pembayaran,keterangan
	*/
    function bayar_pinjaman($data)
    {
		if(is_array($data))
		{
			$data = (Object) $data;
			//make sure have pinjaman
			$current = $this->pinjaman->get_by_id($data->id_pinjaman);
			if($current)
			{
				$new_saldo = $current[0]->saldo - $data->jumlah_pembayaran;
				$pembayaran_update = array("saldo"=>$new_saldo);
				
				//input detail
				$rec = $this->db->insert("pembayaran_pinjaman",$data);
				
				if($rec)
				{
					$this->db->where("id",$data->id_pinjaman);
					$this->db->update("pinjaman",$pembayaran_update);
				}
				
				return FALSE;
			}
			return FALSE;
		}
		else
		{
			return FALSE;
		}
    }
	
    function batalkan_pinjaman()
    {
    }
	
    function get_detail_pembayaran($id_pinjaman)
    {
		$this->db->select("*")
			->from("pembayaran_pinjaman")
			->where("id_pinjaman",$id_pinjaman)
			->order_by("tgl_transaksi","asc");
		
		$rec = $this->db->get();
		
		if($rec->num_rows()>0)
		{
			return $rec->result();
		}
		else
		{
			return FALSE;
		}
    }
	
	function get_saldo_per_pinjaman($id_anggota)
	{
        $fields = "jumlah_pinjaman as 'tpinjaman',sum(saldo) as 'tsaldo',jumlah_jasa as 'tjasa',pinjaman.id,anggota.nama,pinjaman.id_anggota";
        $this->db->select($fields)
                 ->from($this->table_name)
                 ->join("anggota","anggota.id=pinjaman.id_anggota","inner")
                 ->group_by("pinjaman.id")
				 ->order_by("tsaldo","desc")
                ;
		
		$this->db->where("pinjaman.id_anggota",$id_anggota);
		
		$rec = $this->db->get();
        
        if($rec->num_rows()>0)
        {
            return $rec->result();
        }
        return FALSE;

	}
	
	function get_saldo_per_anggota($id_anggota=null)
    {
        $fields = "sum(jumlah_pinjaman) as 'tpinjaman',sum(saldo) as 'tsaldo',sum(jumlah_jasa) as 'tjasa',pinjaman.id_anggota,anggota.nama";
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