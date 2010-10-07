<?php
class Common extends Controller {
	
	function __construct()
	{
		parent::Controller();	
	}
	
	function _set_view_dir($versi=null)
	{
		if($versi==null)
		{
			//check in session
		}
		else
		{
			switch($versi)
			{
				case "m":
					$this->session->set_userdata('view_dir', 'default');
				break;

				case "full":
					$this->session->set_userdata('view_dir', 'desktop');
				break;
				
				default:
					$this->session->set_userdata('view_dir', 'default');
				break;
				
			}	
		}
	}
	
	/**
	* JSON Support
	*/
	private function _built_json($data)
	{
		$this->output->set_header("Cache-Control: no-cache");
		$this->output->set_header("Expires: -1");
		$this->output->set_header("Content-type: application/json");
		$this->output->set_output($data);
	}
	
	/**
	* view dispatcher
	*/
	function _load_view($view,$data)
	{
		$this->load->view($this->session->userdata('view_dir')."/$view",$data);
	}
	
	function redirect()
	{
		redirect("main/index/0",null);
	}
}
?>