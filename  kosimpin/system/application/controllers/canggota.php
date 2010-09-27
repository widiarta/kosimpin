<?php

class canggota extends Controller {

	function __construct()
	{
		parent::Controller();
		$this->load->model("anggota");
		$this->load->model("pinjaman");
                $this->load->model("tabungan");
	}

	function index()
	{
		$data = array();
		$this->load->view('default/pinjaman/home',$data);
	}
}