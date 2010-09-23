<?php

class User extends Model {

	function __construct()
	{
		parent::Model();	
	}
	
	function is_exists($user,$password)
	{
		$this->db->select("user_name,password")
		         ->from("user")
				 ->where("user_name","$user")
				 ->where("password",md5($password));
		$rec = $this->db->get();
		if($rec->num_rows()>0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function add($user,$password,$email="",$anggota=null)
	{
		$data = array("user_name"=>$user,
		              "password"=>md5($password),
					  "email"=>$email
					  );
					  
		$this->db->insert("user",$data);
	}
	
	function del($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("user");
	}
}

/* End of file user.php */
/* Location: ./system/application/models/tabungan.php */