<?php
class Dashboard extends CI_Controller{
	function __construct(){
		error_reporting(0);
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_usaha');
	}

	function index(){
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung(); 
		$wilayah = $this->session->userdata('wilayah');
		$kabupaten = $this->session->userdata('kabupaten');
		$nama = $this->session->userdata('nama_lengkap'); 

		
		$idadmin = $this->session->userdata('idadmin');
		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  

		if($this->session->userdata('akses')=='1'){  
			
			if ($this->session->userdata('level') == "superadmin") {
				$x['data'] = $this->m_usaha->get_all();  
			}
			else if ($this->session->userdata('level') == "dinas") {
				$x['data'] = $this->m_usaha->get_all_perkomoditas("SEMUA");  
			}
			else if ($this->session->userdata('level') == "admin") {
				$x['data'] = $this->m_usaha->get_all_data_usaha_perkabupaten($kabupaten)->result();  
			}
			else if ($this->session->userdata('level') == "relawan") {
				$x['data']=$this->m_usaha->get_all_non_verified_kecamatan($cek['kecamatan']);  
			}

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
			$x['total_perkabupaten']=$this->m_usaha->get_total_perkabupaten($kabupaten)->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_total()->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			$x['musnah'] = $this->m_usaha->get_data_perkomoditas("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_usaha->get_data_perkomoditas("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_usaha->get_data_perkomoditas("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_usaha->get_data_perkomoditas("Permanen", $wilayah); 
			
			$this->load->view('admin/v_dashboard',$x);
		}else{
			redirect('administrator');
		}
	
	} 

	function get_data_wilayah($wilayah){
		$kode_uk_up=$this->session->userdata('kode_uk_up');
		//$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap'); 
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_total()->row_array(); 
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			

			$x['wilayah'] = $wilayah; 
			
			$x['data'] = $this->m_usaha->get_all_data_usaha_perkabupaten($wilayah)->result();  

			
			//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

			$this->load->view('admin/v_usaha',$x);
		}else{
			redirect('administrator');
		}
	}


	function get_data_by_sektor($komoditas){
		$nama = $this->session->userdata('nama_lengkap'); 

		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  

			$x['ntb'] = $this->m_usaha->get_total()->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();


			
			$x['data'] = $this->m_usaha->get_data_perkomoditas($komoditas);   
			$x['komoditas'] = $komoditas;

			
			//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

			$this->load->view('admin/v_usaha_perkomoditas',$x); 
		}else{
			redirect('administrator');
		}
	}


}