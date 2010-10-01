<?php

class cpinjaman extends Controller {

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
		$this->load->view('default/pinjaman/home',$data);	
	}
	
	/**
	* Daftar pinjaman2 anggota
	*/
	function detail($id_anggota)
	{
		
	}
}