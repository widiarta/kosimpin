<?php

class cpinjaman extends Common {

	function __construct()
	{
		parent::Controller();	
		$this->load->model("pinjaman");
		$this->load->model("anggota");
		$this->load->model("user");
	}

	/**
	* Halaman Utama. Menampilkan pinjaman total per anggota.
	*
	*/
	function index()
	{
		$data = array();
		$data["data_pinjaman"] = $this->pinjaman->get_saldo_per_anggota();
		$this->_load_view('pinjaman/home',$data);	
	}
	
	/**
	* Daftar pinjaman2 anggota
	*/
	function detail($id_anggota=null)
	{
		if($id_anggota!=null)
		{
			$data = array();
			$data["data_pinjaman"] = $this->pinjaman->get_saldo_per_pinjaman($id_anggota);	
			$data["nama_anggota"] = $this->anggota->get_name($id_anggota); 
			$this->_load_view('pinjaman/per_anggota',$data);
		}
		else
		{
			redirect("cpinjaman/index",null);
		}
		
	}
	
	function bayar($id_pinjaman=null,$id_anggota=null)
	{
		if($id_pinjaman!=null)
		{
			$data = array();
			$pinjaman = $this->pinjaman->get_by_id($id_pinjaman);
			$detail_bayar = $this->pinjaman->get_detail_pembayaran($id_pinjaman);
			$data['pinjaman'] = $pinjaman;
			$data['pembayaran'] = $detail_bayar;
			$data["nama_anggota"] = $this->anggota->get_name($id_anggota);
			
			$this->_load_view('pinjaman/per_anggota',$data);	
		}
		else
		{
			redirect("cpinjaman/index",null);
		}
		
	}
}