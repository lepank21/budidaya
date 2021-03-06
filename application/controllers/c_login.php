<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper('url');
		
	}
	function login()
	{
		$this->load->view('v_login');
	}
	
	function login_proses()
	{
		$username=$this->input->post('user');
		$password=$this->input->post('pass');
		
		
		$data=array(
			'user'=>$username,
			'password'=>md5($password),
		);
		$cek=$this->m_login->cek_login($data,"pengguna")->num_rows();
		$isi=$this->m_login->cek_login($data,"pengguna")->result();
		if ($cek>0){
			$data_session=array(
			'nama'=>$username,
			'perusahaan'=>$isi[0]->perusahaan,
			'status'=>"login",
		);
		$this->session->set_userdata($data_session);
		redirect(site_url('home/index'));
		}else{
			$pesan['teks']='<div class="alert alert-danger" role="alert"><center>Username/Password Salah</center></div>';
			$this->session->set_flashdata($pesan);
			redirect(site_url('c_login/login'));
		}
		
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('c_login/login'));
	}
	function register()
	{
		$this->load->view('v_register');
	}
	
}
