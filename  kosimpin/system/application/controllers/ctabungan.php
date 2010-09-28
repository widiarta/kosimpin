<?php

class ctabungan extends Controller {

    function __construct()
    {
        parent::Controller();
	$this->load->model("tabungan");
	$this->load->model("user");
    }

    function index()
    {
        $data = array();

        $total_saldo = $this->tabungan->get_saldo_per_type();
        $data["saldo_tabungan"] = $total_saldo;
	$this->load->view('default/tabungan/home',$data);	
    }

    /**
    * Menyimpan tabungan
    */
    function save()
    {
        
    }

    /**
     * melihat detail transaksi anggota
     * @param int $id_anggota
     */
    function detail($id_anggota)
    {
        
    }
}