<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Session checker
 * Just redirect to login when no session created
 *
 * @package		libs
 * @author      Ahmad Satiri
 * @since		Version 1.0
 * @filesource
 */
class Session_checker
{

	function __construct()
	{		
		$CI = &get_instance();
		$this->RTR =& load_class('Router');
		$this->output = $CI->output;
		$this->session = $CI->session;
		$this->config = $CI->config;
		
		$dir = 	$this->RTR->fetch_directory();
		$class  = $this->RTR->fetch_class();
		$method = $this->RTR->fetch_method();		
		$path = $dir."$class/$method";
		
		$page_init = $this->config->item("page_init");
		
		if(!in_array($path,$page_init))
		{		
			$session_var = $this->config->item('session_var_to_watch');
			if(!($this->session->userdata($session_var)))
			{
				redirect('main', NULL);
			}
		}
	}
}