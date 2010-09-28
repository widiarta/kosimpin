<?php

class ctabungan extends Controller {

    function __construct()
    {
        parent::Controller();
	$this->load->model("tabungan");
        $this->load->model("jenis_tabungan");
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
     * melihat detail saldo per anggota
     * @param int $id_anggota
     */
    function detail($id_jenis=null)
    {
        $data = array();
        $total_saldo = $this->tabungan->get_saldo_per_anggota($id_jenis);
        $data["saldo_tabungan"] = $total_saldo;

        if($id_jenis!=null)
        {
            $result = $this->jenis_tabungan->get_by_id($id_jenis);
            $jenis = $result[0];
        }
        else
        {
            $jdata = array("jenis_tabungan"=>"Total Simpanan");
            $jenis = (Object) $jdata;
        }
        
        $data["jenis_tabungan"] = $jenis;
	$this->load->view('default/tabungan/saldo_per_anggota',$data);

    }

    function detail_anggota($id_anggota)
    {
        
    }
}