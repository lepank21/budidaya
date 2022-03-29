<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_lhk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_lhk');
		$this->load->model('m_pakan');
		$this->load->helper('url');
		if ($this->session->userdata('status') != "login") {
			redirect(site_url('c_login/login'));
		}
	}
	function index()
	{
		$comp = $this->session->userdata['perusahaan'];
		$pers = array(
			'perusahaan' => $comp,
		);
		$chik = $this->m_lhk->cek_chikin($pers)->result();
		$tanggal = $chik[0]->tanggal;
		$pakan['pakan'] = $this->m_pakan->ambil_jenis_pakan($pers,$tanggal)->result();
		$this->load->view('v_input_lhk', $pakan);
	}
	function tampil_laporan()
	{
		$comp = $this->session->userdata['perusahaan'];
		$kandang = "1";
		$lantai = "1";
		$pers = array(
			'perusahaan' => $comp,
		);
		$chik = $this->m_lhk->cek_chikin($pers)->result();
		$lhk['jum']=$chik[0]->jumlah;
		
		$tanggal = $chik[0]->tanggal;
		$where = array(
			'perusahaan' => $comp,
			'kandang' => $kandang,
			'lantai' => $lantai,
		);
		$lhk['lhk']= $this->m_lhk->ambil_lhk($tanggal, $where)->result();
		//echo $lhk;
		$this->load->view('v_lhk', $lhk);
	}
	function input_lhk()
	{
		$tanggal = $this->input->post('tanggal');
		$kandang = $this->input->post('kandang');
		$lantai = $this->input->post('lantai');
		$jenis_pakan_1 = $this->input->post('jenis_pakan_1');
		$jumlah_pakan_1 = $this->input->post('jumlah_pakan_1');
		$jenis_pakan_2 = $this->input->post('jenis_pakan_2');
		$jumlah_pakan_2 = $this->input->post('jumlah_pakan_2');
		$mati = $this->input->post('mati');
		$afkir = $this->input->post('afkir');
		$bobot = $this->input->post('bobot');
		$comp = $this->session->userdata['perusahaan'];
		$data = array(
			'tanggal' => $tanggal,
			'kandang' => $kandang,
			'lantai' => $lantai,
			'jenis_pakan_1' => $jenis_pakan_1,
			'jumlah_pakan_1' => $jumlah_pakan_1,
			'jenis_pakan_2' => $jenis_pakan_2,
			'jumlah_pakan_2' => $jumlah_pakan_2,
			'mati' => $mati,
			'afkir' => $afkir,
			'bobot' => $bobot,
			'perusahaan' => $comp,
		);
		$this->m_lhk->input_data($data, 'lhk');
		redirect('c_lhk/index');
	}
}
