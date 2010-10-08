<?php
class Jurnal_entry extends Base_model
{
	var $nomor_account;
	var $debit_value;
	var $kredit_value;
	var $tgl_transaksi;
	var $nomor_dokumen;
	
	function __construct()
	{
		parent::__construct();
	}		
}
?>