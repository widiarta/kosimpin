<?php
/**
* helper ini membutuhkan form helper
*/


if(!function_exists('tanggal_combo'))
{
	function tanggal_combo($nama)
	{
		$current_date = date("d-m-Y");
		$dd = getdate(strtotime($current_date));


		$tanggalnya = array();
		for($i=1;$i<=31;$i++){
			$tanggalnya[$i] = $i;
		}
		
		$hasil = form_dropdown($nama,$tanggalnya,$dd['mday']);
		return $hasil;
	}
}

if(!function_exists('bulan_combo'))
{
	function bulan_combo($nama)
	{
		$current_date = date("d-m-Y");
		$dd = getdate(strtotime($current_date));


		$tanggalnya = array();
		for($i=1;$i<=12;$i++){
			$tanggalnya[$i] = $i;
		}
		
		$hasil = form_dropdown($nama,$tanggalnya,$dd['mon']);
		return $hasil;
		
	}
}

if(!function_exists('tahun_combo'))
{
	function tahun_combo($nama)
	{
		$current_date = date("d-m-Y");
		$dd = getdate(strtotime($current_date));


		$tanggalnya = array();
		for($i=2007;$i<=2015;$i++){
			$tanggalnya[$i] = $i;
		}
		
		$hasil = form_dropdown($nama,$tanggalnya,$dd['year']);
		return $hasil;
		
	}

}

?>