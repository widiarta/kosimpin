<?php

class cpinjaman extends Controller {

	function __construct()
	{
		parent::Controller();	
		$this->load->model("pinjaman");
		$this->load->model("user");
	}

	function index()
	{
		$data = array();
		$this->load->view('default/pinjaman/home',$data);	
	}
}