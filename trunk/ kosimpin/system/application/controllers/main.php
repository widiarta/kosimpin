<?php

class main extends Common {

	function __construct()
	{
		parent::__construct();
		$this->load->model("tabungan");
		$this->load->model("user");
	}
	
		
	function index($failed=0,$versi="m")
	{
		
		$this->_set_view_dir($versi);
		
		if($this->session->userdata('logged_in')==true && strlen($this->session->userdata('username'))>0)
		{
			//redirect to home
			redirect("main/home",null);
		}
		else
		{
			$tabungan = $this->tabungan->get_record(date("Y-m-d"),date("Y-m-d"));
			$data["message"] = "";
			if($failed==1)
			{
				$data["message"]="Login Failed. Please notice that password is case sensitive.";
			}
			
			$this->_load_view("login",$data);
		}
	}
	
	function login()
	{
		$exist = $this->user->is_exists($this->input->post("user"),$this->input->post("password"));
		if($exist)
		{
			$newdata = array(
							   'username'  => $this->input->post("user"),
							   'logged_in' => TRUE
						   );

			$this->session->set_userdata($newdata);		
			redirect("main/home",null);
		}
		else
		{
			redirect("main/index/1",null);
		}
	}
	
	function home()
	{
		if($this->session->userdata('logged_in')==true && strlen($this->session->userdata('username'))>0)
		{
			$data = array();
			$this->load->view('default/home',$data);	
		}
		else
		{
			redirect("main/index/0",null);
		}
	}
	
	function logout()
	{
		$newdata = array(
						   'username'  => "",
						   'logged_in' => FALSE
					   );

		$this->session->set_userdata($newdata);			
		redirect("main/index/0",null);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */