<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){            
			redirect(base_url().'index.php/backend');
		}
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'status' => 'baru',
			'jabatan' => '',
			'id_jab' => '',
			'tgl_input_jab' => '',
			'data_jabatan' => $this->model->GetJab("order by id_jab desc")->result_array(),
		);

		$this->load->view('jabatan/data_jabatan', $data);
	}

	function editjabatan($kode = 0){		
		$tampung = $this->model->GetJab("where id_jab = '$kode'")->result_array();
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'status' => 'lama',
			'tgl_input_jab' => $tampung[0]['tgl_input_jab'],
			'jabatan' => $tampung[0]['jabatan'],
			'id_jab' => $tampung[0]['id_jab'],
			'data_jabatan' => $this->model->GetJab("where id_jab != '$kode' order by id_jab desc")->result_array()
			);
		$this->load->view('jabatan/data_jabatan', $data);
	}

	function savedata(){
		if($_POST){
			$status = $_POST['status'];
			$id_jab = $_POST['id_jab'];
			$jabatan = $_POST['jabatan'];
			$tgl_input_jab = $_POST['tgl_input_jab'];
			if($status == "baru"){
				$data = array(
					'id_jab' => $id_jab,
					'jabatan' => $jabatan,
					'tgl_input_jab' => date("Y-m-d H:i:s"),
					);
				$result = $this->model->Simpan('tb_jabatan', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'index.php/jabatan');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'index.php/jabatan');
				}
			}else{
				$data = array(
					'jabatan' => $jabatan
					);
				$result = $this->model->Update('tb_jabatan', $data, array('id_jab' => $id_jab));
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'index.php/jabatan');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'index.php/jabatan');
				}
			}
		}else{
			echo('Ingin membuat berapa jabatan?');
		}
	}

	function hapusjab($kode = 1){
		
		$result = $this->model->Hapus('tb_jabatan', array('id_jab' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'index.php/jabatan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'index.php/jabatan');
		}
	}
}

// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */