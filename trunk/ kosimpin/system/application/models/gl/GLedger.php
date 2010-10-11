<?php
class Gledger extends Base_model
{
	function __construct()
	{
		parent::__construct();
		$this->init("gledger","id");
		require(APPPATH."models/gl/jurnal_entry.php"); //jurnal entry class
		$this->load->library("ScError");
		
		$this->error = new ScError();
		$this->_init_error_def();
	}
	
	private function _init_error_def()
	{
		$this->error->add_error_definition(500,"Parameter is Null");	
		$this->error->add_error_definition(501,"Not Balance or Zero");
		$this->error->add_error_definition(502,"Failed Saving Entries");
		$this->error->add_error_definition(503,"Query Error or No Result");
		
	}
	
	/**
	* $entry_debit is as single object of journal_entry
	* $entry_kredits is a single or array of journal_entry
	*/
	function write_jurnal($entry_debits,$entry_kredits)
	{
		if($entry_debits!=null && $entry_kredits!=null)
		{
			$total_debit = $this->_count_total_debit($entry_debits);
			$total_credit = $this->_count_total_credit($entry_kredits);
						
			if($total_debit==$total_credit && $total_debit>0 && $total_credit>0)
			{
				$this->_write_entries($entry_debits);
				$this->_write_entries($entry_kredits);
			}
			//fail not balance
			$this->error->set_error(501);
			return FALSE;
		}
		//fail parameter is null
		$this->error->set_error(500);
		return FALSE;
	}
	
	/**
	* this should be used when balance already checked
	*/
	private function _write_entries($entries)
	{
		if($entries!=null)
		{
			if(is_array($entries))
			{
				foreach($entries as $entry)
				{
					$this->save($entry);
				}
			}
			else
			{
				$this->save($entries);
			}
		}
		$this->error->set_error(502);
		return FALSE;
	}
	
	/**
	* Count total debit of a jurnal_entries
	*/
	private function _count_total_debit($jurnal_entries)
	{
		$total_value = 0;
		if(is_array($jurnal_entries))
		{			
			foreach($jurnal_entries as $entry)
			{
				$total_value += (float)$entry->debit_value;
			}
		}
		else
		{	
			$total_value = (float)$jurnal_entries->debit_value;
		}
		
		return $total_value;
	}

	/**
	* Count total credit of a jurnal_entries
	*/	
	private function _count_total_credit($jurnal_entries)
	{
		$total_value = 0;
		if(is_array($jurnal_entries))
		{
			foreach($jurnal_entries as $entry)
			{
				$total_value += (float)$entry->kredit_value;
			}
		}
		else
		{
			$total_value = (float)$jurnal_entries->kredit_value;
		}

		return $total_value;	
	}
	
	function get_saldo($account_number)
	{
		$this->db->select('sum(debit_value-kredit_value) as saldo')
				 ->from($this->table_name);
		$rec = $this->db->get();
		
		if($rec)
		{
			return $rec[0]->saldo;
		}
		
		$this->error->set_error(503);
		return FALSE;
	}
	
	function get_entries_by_accountnumber($account_number)
	{
		$this->db->select("*")
				->from($this->table_name)
				->order_by("tgl_transaksi","asc");
		
		$rec = $this->db->get();
		
		if($rec->num_rows()>0)
		{
			return TRUE;
		}
		
		$this->error->set_error(503);
		return FALSE;
	}
	
}
?>