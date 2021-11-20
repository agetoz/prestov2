<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data user
	function GetUser($data) {
        $query = $this->db->get_where('tb_login', $data);
        return $query;
    }

	//ambil data tabel jabatan
	public function GetJab($where= "")
	{
		$data = $this->db->query('select * from tb_jabatan '.$where);
		return $data;
	}
	//ambil data tabel produk
	public function GetKaryawan($where= "")
	{
		$data = $this->db->query('select * from tb_karyawan '.$where);
		return $data;
	}

	public function GetTotKaryawan()
	{
		$data = $this->db->query('select * from tb_karyawan group by id_jab ');
		return $data;
	}

	public function GetDetAbsensi($where = ""){
		return $this->db->query("select tb_absensi.*, tb_karyawan.*, tb_jabatan.* from tb_karyawan inner join tb_absensi on tb_absensi.nippos=tb_karyawan.nippos $where;");
	}

	public function count_all() {
		return $this->db->count_all('tb_karyawan');
	}

	//ambil data dari 3 tabel
	public function GetKaryawanJabAbs($where= "") {
    $data = $this->db->query('SELECT p.*, q.jabatan, r.*
                                FROM tb_karyawan p
                                INNER JOIN tb_absensi r
                                ON(p.nippos = r.nippos)
                                INNER JOIN tb_jabatan q
                                ON(p.id_jab = q.id_jab)'.$where);
    return $data;
    }

	//ambil data dari 2 tabel
	public function GetKaryawanJab($where= "") {
    $data = $this->db->query('SELECT p.*, q.jabatan
                                FROM tb_karyawan p
                                LEFT JOIN tb_jabatan q
                                ON(p.id_jab = q.id_jab)'.$where);
    return $data;
    }

	//batas crud data
	public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function UpdateKaryawan($data){
        $this->db->where('id_kar',$data['id_kar']);
        $this->db->update('tb_karyawan',$data);
    }
	//batas crud data

 //    //model untuk visitor/pengunjung
 //    function GetVisitor($where = ""){
	// 	return $this->db->query("select * from tb_visitor $where");		
	// }

	function GetProductView(){
		return $this->db->query("select sum(counter) as totalview from tb_karyawan where status = 'publish'");
	}
	//batas query pengunjung

	public function GetJabe($where= "")
	{
		$data = $this->db->query('select count(*) as totaljabatan from tb_jabatan '.$where);
		return $data;
	}

	function TotalKat(){
		return $this->db->query("select count(*) as totaljabatan from tb_karyawan group by id_jab; ");
	}
}

/* End of file model.php */
/* Location: ./application/models/model.php */