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
		$this->load->view('default/tabungan/home',$data);	
	}
}