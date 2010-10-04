<?php
/**
 * Anggota a.k.a Member
 */
class Anggota extends Base_Model {

    function __construct()
    {
        parent::__construct();
        $this->init("anggota","id");
    }

    /**
     * Create new code number for anggota
     */
    function new_number()
    {
        
    }
	
	function get_name($id)
	{
		$rec = $this->get_by_id($id);
		if($rec)
		{
			return $rec[0]->nama;
		}
		
		return FALSE;
	}
	
	function get_array_anggota($order_by=null)
	{
		$rec = $this->get_all($order_by);
		$hasil = array();
		if($rec)
		{
			foreach($rec as $row)
			{
				$hasil["$row->id"] = "$row->nama";
			}
		}
		
		return $hasil;
	}
	
}
?>
