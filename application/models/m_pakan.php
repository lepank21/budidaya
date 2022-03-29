<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pakan extends CI_Model {

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
	
	function input_data($data,$table)
	{
		$this->db->insert($table,$data);
		
	}
	function tampil_data($data,$tanggal)
	{
		$this->db->where("tanggal>=",$tanggal);
		return $this->db->get_where('input_pakan',$data);
	}
	function ambil_jenis_pakan($data,$tanggal)
	{
		$this->db->group_by('jenis');
		$this->db->where("tanggal>=",$tanggal);
		$this->db->where($data);
		return $this->db->get('input_pakan');
	}
	function cek_chikin($pers)
	{

		$this->db->order_by('tanggal DESC');
		return $this->db->get_where('chikin', $pers);
	}
	
}
