<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lhk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_lhk');
		$this->load->model('m_pakan');
		$this->load->helper('url');
		if ($this->session->userdata('status')!="login"){
			redirect(site_url('c_login/login'));
		}
	}
	function index()
	{
		$comp=$this->session->userdata['perusahaan'];
		$pers=array(
			'perusahaan'=>$comp,
			);
		$pakan['pakan']=$this->m_pakan->ambil_jenis_pakan($pers)->result();
		$this->load->view('v_input_lhk',$pakan);
	}
	function input_lhk()
	{
		$tanggal=$this->input->post('tanggal');
		$jenis_pakan_1=$this->input->post('jenis_pakan_1');
		$jumlah_pakan_1=$this->input->post('jumlah_pakan_1');
		$jenis_pakan_2=$this->input->post('jenis_pakan_2');
		$jumlah_pakan_2=$this->input->post('jumlah_pakan_2');
		$mati=$this->input->post('mati');
		$afkir=$this->input->post('afkir');
		$bobot=$this->input->post('bobot');
		$comp=$this->session->userdata['perusahaan'];
		$data=array(
			'tanggal'=>$tanggal,
			'jenis_pakan_1'=>$jenis_pakan_1,
			'jumlah_pakan_1'=>$jumlah_pakan_1,
			'jenis_pakan_2'=>$jenis_pakan_2,
			'jumlah_pakan_2'=>$jumlah_pakan_2,
			'mati'=>$mati,
			'afkir'=>$afkir,
			'bobot'=>$bobot,
			'perusahaan'=>$comp,
		);
		$this->m_lhk->input_data($data,'lhk');
		redirect ('c_lhk/index');
	}
	
}
