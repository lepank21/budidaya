<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->view('index');
	}
	function input_pakan()
	{
		$comp=$this->session->userdata['perusahaan'];
		$pers=array(
			'perusahaan'=>$comp,
			);
		$pakan['pakan']=$this->m_pakan->tampil_data($pers)->result();
		$this->load->view('pakan',$pakan);
	}
	function input_chikin()
	{
		$this->load->view('v_chikin');
	}
	function input_lhk()
	{
		$comp=$this->session->userdata['perusahaan'];
		$pers=array(
			'perusahaan'=>$comp,
			);
		$pakan['pakan']=$this->m_pakan->ambil_jenis_pakan($pers)->result();
		$this->load->view('v_input_lhk',$pakan);
	}
	function login()
	{
		$this->load->view('v_login');
	}
	
}
