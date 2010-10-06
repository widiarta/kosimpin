<?php
class Common extends Controller {
	
	function __construct()
	{
		parent::Controller();	
	}
	
	function _set_view_dir($versi)
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
	
	/**
	* view dispatcher
	*/
	function _load_view($view,$data)
	{
		$this->load->view($this->session->userdata('view_dir')."/$view",$data);
	}
	
}
?>