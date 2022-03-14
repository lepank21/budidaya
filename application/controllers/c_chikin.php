<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_chikin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_chikin');
		$this->load->helper('url');
		if ($this->session->userdata('status')!="login"){
			redirect(site_url('c_login/login'));
		}
		
	}
	function index()
	{
		$this->load->view('v_chikin');
	}
	function input_chikin()
	{
		$tanggal=$this->input->post('tanggal');
		$periode=$this->input->post('periode');
		$kandang=$this->input->post('kandang');
		$lantai=$this->input->post('lantai');
		$jumlah=$this->input->post('jumlah');
		$comp=$this->session->userdata['perusahaan'];
		$data=array(
			'periode'=>$periode,
			'tanggal'=>$tanggal,
			'kandang'=>$kandang,
			'lantai'=>$lantai,
			'jumlah'=>$jumlah,
			'perusahaan'=>$comp,
		);
		$this->m_chikin->input_data($data,'chikin');
		redirect ('c_chikin/index');
	}
	
}
