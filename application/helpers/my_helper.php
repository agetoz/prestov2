<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* fungsi non database */
function tgl_jam_sql ($tgl) {
	$pc_satu	= explode(" ", $tgl);
	if (count($pc_satu) < 2) {	
		$tgl1		= $pc_satu[0];
		$jam1		= "";
	} else {
		$jam1		= $pc_satu[1];
		$tgl1		= $pc_satu[0];
	}
	
	$pc_dua		= explode("-", $tgl1);
	$tgl		= $pc_dua[2];
	$bln		= $pc_dua[1];
	$thn		= $pc_dua[0];
	
	
	if ($bln == "01") { $bln_txt = "Jan"; }  
	else if ($bln == "02") { $bln_txt = "Feb"; }  
	else if ($bln == "03") { $bln_txt = "Mar"; }  
	else if ($bln == "04") { $bln_txt = "Apr"; }  
	else if ($bln == "05") { $bln_txt = "Mei"; }  
	else if ($bln == "06") { $bln_txt = "Jun"; }  
	else if ($bln == "07") { $bln_txt = "Jul"; }  
	else if ($bln == "08") { $bln_txt = "Ags"; }  
	else if ($bln == "09") { $bln_txt = "Sep"; }  
	else if ($bln == "10") { $bln_txt = "Okt"; }  
	else if ($bln == "11") { $bln_txt = "Nov"; }  
	else if ($bln == "12") { $bln_txt = "Des"; }  	
	else { $bln_txt = ""; }
	
	return $tgl." ".$bln_txt." ".$thn."  ".$jam1;
}