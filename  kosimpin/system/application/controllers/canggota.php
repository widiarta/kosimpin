<?php

class canggota extends Common {

	function __construct()
	{
		parent::__construct();
		$this->load->model("anggota");
		$this->load->model("pinjaman");
        $this->load->model("tabungan");
	}

	/**
	* List Anggota
	*/
	function index()
	{
		$data = array();
		$this->_load_view('anggota/home',$data);
	}
	
	/**
	* Rekap Per Anggota
	*/
	function rekap($id_anggota)
	{
		
		$data = array();
		$data["nama_anggota"] = $this->anggota->get_name($id_anggota);
		$data["anggota"] = $this->anggota->get_by_id($id_anggota);
		$data["tabungan"] = $this->tabungan->get_saldo_per_anggota(null,$id_anggota);
		$data["pinjaman"] = $this->pinjaman->get_saldo_per_anggota($id_anggota);
		$this->_load_view('anggota/per_orang',$data);
	}
}