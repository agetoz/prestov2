<?php
class Pegawai_model extends CI_Model{ 

	function pegawai_model()
	{
		parent::__construct();
	}
	 
	/* GET DAT APEGAWAI */
		function cekNikPegawai(){
			$nippos=$this->input->post('nippos');
			$query=$this->db->query("select nippos from tb_karyawan where nippos='$nippos'");
			return $query->num_rows();
		}
		function cekMasuk(){
			$nippos=$this->input->post('nippos');
			$datenow=date("Y-m-d");
			$jammasuk="";
			$ceknippos=$this->cekNikPegawai();
			if($ceknippos==0){
				//echo'<hr><label style="font-size:30px;font-family:calibri">NIK TIDAK TERSEDIA</label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
  					<div class='modal-content'>
  					<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:30px;color:#000000;'>NIK TIDAK TERSEDIA</label>
    				</div>
  				</div>
				</div>";
				return false;
			} else if(date('H')<=4) {
				//echo'<hr><label style="font-size:20px;font-family:calibri">Presensi Masuk hanya bisa dilakukan di atas <b>Pkl 05:00 WIB hingga sebelum Pkl 12.00 WIB</b> </label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:20px;color:#000000;'>Presensi Masuk hanya bisa dilakukan di atas <b>Pkl 05:00 WIB hingga sebelum Pkl 12.00 WIB</b></label>
    				</div>
  				</div>
				</div>";
				return false;
			} else if(date('H')>=12) {
				//echo'<hr><label style="font-size:20px;font-family:calibri">Presensi Masuk hanya bisa dilakukan di atas <b>Pkl 05:00 WIB hingga sebelum Pkl 12.00 WIB</b> </label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:20px;color:#000000;'>Presensi Masuk hanya bisa dilakukan di atas <b>Pkl 05:00 WIB hingga sebelum Pkl 12.00 WIB</b></label>
    				</div>
  				</div>
				</div>";
				return false;
			}
			$query=$this->db->query("select tb_absensi.nippos,tb_absensi.jammasuk,tb_karyawan.nama_kar from tb_absensi left join tb_karyawan on tb_absensi.nippos=tb_karyawan.nippos where tb_absensi.nippos='$nippos' and tb_absensi.tanggal='$datenow' and tb_absensi.kodeabsensi='1'");
			if ($query->num_rows() > 0){
				foreach ($query->result() as $data) {
					$jammasuk=$data->jammasuk;
					$nippos=$data->nippos;
					$nama_kar=$data->nama_kar;
					
				}
				//echo'<hr><label style="font-size:25px;font-family:calibri">'.$nama_kar.'<br>Telah Melakukan Absensi Kedatangan Pada Pukul : </label>';
				//echo'<label style="color:red;font-size:40px;font-family:calibri">'.$jammasuk.' !!! </label><a href="#" class="more"></a>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:25px;'>$nama_kar<br>Telah Melakukan Absensi Kedatangan Pada Pukul : </label>
    					<br><label style='color:red;font-size:40px;'>$jammasuk</label>
    				</div>
  				</div>
				</div>";
				return false;
			}	 else {
				 $data=array(
				 'nippos'=>$nippos,
				 'kodeabsensi'=>'1',
				 'jammasuk'=>date("H:i:s"),
				 'tanggal'=>$datenow
				);
				$waktu=date('H:i:s');
				$this->db->trans_start();
				$this->db->insert('tb_absensi',$data);
				$this->db->trans_complete(); 
				//echo'<hr><label style="font-size:25px;font-family:calibri">Terima Kasih Anda Telah Sukses Melakukan Absensi Kedatangan Pada Pukul: </label>';
				//echo'<label style="color:green;font-size:40px;font-family:calibri">'.date("H:i:s").'</label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:25px;'>Terima Kasih Anda Telah Sukses Melakukan Absensi Kedatangan Pada Pukul: </label>
    					<label style='color:green;font-size:40px;'>$waktu</label>
    				</div>
  				</div>
				</div>";
			}
		}
		function cekdatang(){
			$nippos=$this->input->post('nippos');
			$query=$this->db->query("select nippos from tb_karyawan where nippos='$nippos' and kodeabsensi='1'");
			return $query->num_rows();
		}
		function cekPulang(){
			$nippos=$this->input->post('nippos');
			$datenow=date("Y-m-d");
			$jammasuk="";
			$ceknippos=$this->cekNikPegawai();
			if($ceknippos==0){
				//echo'<hr><label style="font-size:30px;font-family:calibri">NIK TIDAK TERSEDIA</label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:30px;color:#000000;'>NIK TIDAK TERSEDIA</label>
    				</div>
      			</div>
				</div>";
				return false;
			} else if(date('H')<=11) {
				//echo'<hr><label style="font-size:20px;font-family:calibri">Presensi Pulang hanya bisa dilakukan di atas <b>Pkl 12:00 WIB hingga sebelum Pkl 24.00 WIB</b> </label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:20px;color:#000000;'>Presensi Pulang hanya bisa dilakukan di atas <b>Pkl 12:00 WIB hingga sebelum Pkl 24.00 WIB</b> </label>
    				</div>
  				</div>
				</div>";
				return false;
			} else if(date('H')>=23) {
				//echo'<hr><label style="font-size:20px;font-family:calibri">Presensi Pulang hanya bisa dilakukan di atas <b>Pkl 12:00 WIB hingga sebelum Pkl 24.00 WIB</b> </label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:20px;color:#000000;'>Presensi Pulang hanya bisa dilakukan di atas <b>Pkl 12:00 WIB hingga sebelum Pkl 24.00 WIB</b> </label>
    				</div>
  				</div>
				</div>";
				return false;
			}
			$query=$this->db->query("select tb_absensi.nippos,tb_absensi.jammasuk,tb_karyawan.nama_kar from tb_absensi left join tb_karyawan on tb_absensi.nippos=tb_karyawan.nippos where tb_absensi.nippos='$nippos' and tb_absensi.tanggal='$datenow' and tb_absensi.kodeabsensi='2'");
			if ($query->num_rows() > 0){
				foreach ($query->result() as $data) {
					$jammasuk=$data->jammasuk;
					$nippos=$data->nippos;
					$nama_kar=$data->nama_kar;
				}
				//echo'<hr><label style="font-size:25px;font-family:calibri">'.$nama_kar.'<br>Telah Melakukan Absensi Kepulangan Pada Pukul : </label>';
				//echo'<label style="color:red;font-size:40px;font-family:calibri">'.$jammasuk.' !!! </label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:25px;'>$nama_kar<br>Telah Melakukan Absensi Kepulangan Pada Pukul : </label>
    					<br><label style='color:red;font-size:40px;'>$jammasuk</label>
    				</div>
  				</div>
				</div>";
				return false;
			}	 else {
				 $data=array(
				 'nippos'=>$nippos,
				 'kodeabsensi'=>'2',
				 'jammasuk'=>date("H:i:s"),
				 'tanggal'=>$datenow
				);
				$waktu=date('H:i:s');
				$this->db->trans_start();
				$this->db->insert('tb_absensi',$data);
				$this->db->trans_complete(); 
				//echo'<hr><label style="font-size:25px;font-family:calibri">Terima Kasih Anda Telah Sukses Melakukan Absensi Kepulangan Pada Pukul: </label>';
				//echo'<label style="color:green;font-size:40px;font-family:calibri">'.date("H:i:s").'</label>';
				echo "<script> $('#myModal').modal('show');</script>
				<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
  				<div class='modal-dialog modal-sm'>
    				<div class='modal-content'>
    				<div class='modal-header'>
        				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          					<span aria-hidden='true'>&times;</span>
        				</button>
        			<br>
      				</div>
    				<label style='font-size:25px;'>Terima Kasih Anda Telah Sukses Melakukan Absensi Kepulangan Pada Pukul: </label>
    					<label style='color:green;font-size:40px;'>$waktu</label>
    				</div>
  				</div>
				</div>";
			}
		}
		
		function getListpegawai($limit='',$offset=''){
			$query=$this->db->query("select *,tb_karyawan.nama_kar from tb_absensi left join tb_karyawan on tb_absensi.nippos=tb_karyawan.nippos
			 LIMIT $limit,$offset
			");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus[]=$data;
				}
				return $menus;
			}
		}
		function count(){
			$query=$this->db->query("select count(1) as jumlah from tb_absensi");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus=$data->jumlah;
				}
				return $menus;
			}
		}

	/* --- */
	function count_cuti($id=''){
		$jumlah='';
		$status=$this->session->userdata('STATUS');
		$addTag="";
		if($status!=0){
		$addTag="where t_cuti.nippos='".$this->session->userdata('NIP')."'";	
		}		
		$query=$this->db->query("select count(1) as jumlah from t_cuti $addTag");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
				$jumlah=$data->jumlah;
				}
				return $jumlah;
			}
	}
	function cetak_absensi() {
		//if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
		//	redirect("index.php/login/login");
		//}
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		= $this->input->post('tgl_end');
		
		$a['tgl_start']	= $tgl_start;
		$a['tgl_end']	= $tgl_end;

		$a['data']	= $this->db->query("SELECT *,tb_karyawan.nama_kar from tb_absensi left join tb_karyawan on tb_absensi.nippos = tb_karyawan.nippos WHERE tanggal >= '$tgl_start' AND tanggal <= '$tgl_end' ORDER BY tanggal")->result();
			$this->load->view('absensi/cetak_absensi', $a);
	}
	 

}
// END RiskIssue_model Class

/* End of file RiskIssue_model.php */
/* Location: ./application/models/RiskIssue_model.php */
?>