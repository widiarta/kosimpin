<?php

class ctabungan extends Controller {

    function __construct()
    {
        parent::Controller();
		$this->load->model("tabungan");
        $this->load->model("jenis_tabungan");
		$this->load->model("user");
		$this->load->model("anggota");
    }

    function index()
    {
        $data = array();
        $total_saldo = $this->tabungan->get_saldo_per_type();
        $data["saldo_tabungan"] = $total_saldo;
		$this->load->view('default/tabungan/home',$data);	
    }

	/**
	* 1. sukarela 
	* 2. Pokok
	* 3. Wajib
	*/
	function form($type=1)
	{
		$data = array();
		
		switch($type)
		{
			case 1:
				$this->load->view('default/tabungan/form',$data);
			break;
			
			case 2:
				$this->load->view('default/tabungan/form_pokok',$data);
			break;
			
			case 3:
				$this->load->view('default/tabungan/form_wajib',$data);
			break;
			
			default:
				$this->load->view('default/tabungan/form',$data);
			break;
		}
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
		$data["id_jenis"] = $id_jenis;
		$this->load->view('default/tabungan/saldo_per_anggota',$data);

    }

    function detail_anggota($id_anggota,$jenis=null)
    {
		$trans = $this->tabungan->get_detail_per_anggota($id_anggota,$jenis);	
		
        if($jenis!=null)
        {
            $result = $this->jenis_tabungan->get_by_id($jenis);
            $jenis = $result[0];
        }
        else
        {
            $jdata = array("jenis_tabungan"=>"Total Simpanan");
            $jenis = (Object) $jdata;
        }
		
        $data["detail_transaksi"] = $trans;
		$data["jenis_tabungan"] = $jenis;
		$data["id_jenis"] = $jenis; 
		$data["nama_anggota"] = $this->anggota->get_name($id_anggota);
		$this->load->view('default/tabungan/rinci_per_anggota',$data);		
    }
}