<?php

class cpinjaman extends Common {

	function __construct()
	{
		parent::Controller();	
		$this->load->model("pinjaman");
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
	function detail($id_anggota)
	{
		
	}
}