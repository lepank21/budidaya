<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pakan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
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
		$pakan['pakan']=$this->m_pakan->tampil_data($pers)->result();
		$this->load->view('pakan',$pakan);
	}
	function input_pakan()
	{
		$tanggal=$this->input->post('tanggal');
		$no_do=$this->input->post('no_do');
		$jenis=$this->input->post('jenis_pakan');
		$jumlah=$this->input->post('jumlah_pakan');
		$comp=$this->session->userdata['perusahaan'];
		$data=array(
			'tanggal'=>$tanggal,
			'no_do'=>$no_do,
			'jenis'=>$jenis,
			'jumlah'=>$jumlah,
			'perusahaan'=>$comp,
		);
		$this->m_pakan->input_data($data,'input_pakan');
		redirect ('c_pakan/index');
	}
	function input_pakan_keluar()
	{
		$tanggal=$this->input->post('tanggal');
		$no_do=$this->input->post('no_do');
		$jenis=$this->input->post('jenis_pakan');
		$jumlah=$this->input->post('jumlah_pakan');
		$comp=$this->session->userdata['perusahaan'];
		
		$data=array(
			'tanggal'=>$tanggal,
			'no_do'=>$no_do,
			'jenis'=>$jenis,
			'jumlah'=>$jumlah,
		);
		$this->m_pakan->input_data($data,'input_pakan');
		redirect ('c_pakan/index');
	}
	
}
