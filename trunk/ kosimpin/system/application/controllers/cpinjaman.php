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
		$this->load->helper(array('form', 'url','tanggal'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
		
		if($id_pinjaman!=null)
		{
			if ($this->form_validation->run() == FALSE)
			{
				//show the form
				$data = array();
				
				$pinjaman = $this->pinjaman->get_by_id($id_pinjaman);
				$detail_bayar = $this->pinjaman->get_detail_pembayaran($id_pinjaman);
				
				$data['pinjaman'] = $pinjaman;
				$data['pembayaran'] = $detail_bayar;
				$data["nama_anggota"] = $this->anggota->get_name($id_anggota);
				$data["id_pinjaman"] = $id_pinjaman;
				$data["id_anggota"] = $id_anggota;
				
				$this->_load_view('pinjaman/bayar',$data);	
			}
			else
			{
				//save
				//tanggal
				$tanggal = $this->input->post("tahun")."-".$this->input->post("bulan")."-".$this->input->post("tanggal");
			
				//sukses
				$data = array(
					"id_pinjaman" => $id_pinjaman,
					"jumlah_pembayaran" => $this->input->post("jumlah"),
					"keterangan" => $this->input->post("keterangan"),
					"tgl_transaksi" => "$tanggal",
					"jenis_pembayaran"=> $this->input->post("jenis")
					);
				
				$this->pinjaman->bayar_pinjaman($data);
				redirect("cpinjaman/bayar/$id_pinjaman/$id_anggota");
			}
		}
		else
		{
			redirect("cpinjaman/index",null);
		}
		
	}
}