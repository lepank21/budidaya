<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lhk extends CI_Model
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function tampil_data()
	{
		return $this->db->get('karyawan');
	}
	function cek_chikin($pers)
	{

		$this->db->order_by('tanggal DESC');
		return $this->db->get_where('chikin', $pers);
	}
	function ambil_lhk($tanggal,$where)
	{
		
		$this->db->where($where);
		$this->db->where('tanggal>=',$tanggal);
		return $this->db->get('lhk');
	}
}
