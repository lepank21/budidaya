<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_register');
		$this->load->helper('url');
		
	}
	function index()
	{
		$this->load->view('v_register');
	}
	function daftar()
	{
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$company=$this->input->post('company');
		$password=$this->input->post('password');
		
		
		$data=array(
			'user'=>$username,
			'password'=>md5($password),
			'perusahaan'=>$company,
			'email'=>$email,
			
		);
		$this->m_register->daftar($data,'pengguna');
		redirect ('home/register');
	}
	
}
