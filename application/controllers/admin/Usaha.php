<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Usaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_usaha');
		$this->load->model('m_user');
		$this->load->library('upload'); 
		$this->load->library('form_validation'); 
	}


	function index(){  
		$idadmin = $this->session->userdata('idadmin');
		$username = $this->session->userdata('username');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');
		$kabupaten = $this->session->userdata('kabupaten');
		
		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){  
			
		

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
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

			if ($this->session->userdata('level') == "superadmin") {
				$x['data'] = $this->m_usaha->get_all();  
				$this->load->view('admin/v_usaha',$x);
			}
			else if ($this->session->userdata('level') == "admin") { 
				$x['data'] = $this->m_usaha->get_all_data_usaha_perkode_admin($username)->result();  
				$this->load->view('admin/v_usaha_admin',$x);
			}
			else if ($this->session->userdata('level') == "relawan") { 
				$x['data']=$this->m_usaha->get_all_data_usaha_perkode_user($idadmin)->result();  
				$this->load->view('admin/v_usaha',$x);
			}
		}else{
			redirect('administrator');
		}

	}

	
	function verifikasi(){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level'); 

		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  
		
		if($this->session->userdata('akses')=='1'){  
			
			 
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_belum_verifikasi']=$this->m_usaha->get_all_non_verified_desa($cek['desa'], $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_usaha->get_all_verified_desa($cek['desa'], $idadmin); 
			 

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
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
			
			$this->load->view('admin/v_verifikasi_usaha',$x); 
		}else{
			redirect('administrator');
		}
	}

	function terverifikasi($id){   
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');

		$data = array(
			'is_verified' => 1,
			'id_user' => $idadmin
		);

		$terverifikasi = $this->m_usaha->terverifikasi($id, $data);

		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  
		
		if($this->session->userdata('akses')=='1'){  
			
			 
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_belum_verifikasi']=$this->m_usaha->get_all_non_verified_desa($cek['desa'], $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_usaha->get_all_verified_desa($cek['desa'], $idadmin); 
			 

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
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

			$this->load->view('admin/v_verifikasi_usaha',$x); 
			
		}else{
			redirect('administrator');
		}
	}

	function target_verifikasi($id){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data_profil'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_sebaran_usaha']=$this->m_usaha->get_all_sebaran_usaha_lengkap_belum_terverifikasi()->result();
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($id)->result();
			
			$this->load->view('admin/v_target_verifikasi',$x);
		}else{
			redirect('administrator');
		}
	}

	function lihat_data_by_relawan($id){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data_profil'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_sebaran_usaha']=$this->m_usaha->get_all_sebaran_usaha_lengkap_belum_terverifikasi()->result();
			$x['data']=$this->m_usaha->get_all_data_usaha_perkode_user($id)->result();
			
			$this->load->view('admin/v_usaha_relawan',$x);
		}else{
			redirect('administrator');
		}
	}

	function get_data_usaha_target_verifikasi($desa){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');

		
		if($this->session->userdata('akses')=='1'){  
			 
			
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_non_verifikasi']=$this->m_usaha->get_all_non_verified_desa($desa);  
			$x['data_verifikasi']=$this->m_usaha->get_all_verified_desa($desa, $idadmin); 
			
			$x['data_belum_verifikasi']=$this->m_usaha->get_all_non_verified_desa($desa, $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_usaha->get_all_verified_desa($desa, $idadmin);  

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
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
			
			
			$this->load->view('admin/v_verifikasi_usaha',$x); 
		}else{
			redirect('administrator');
		}
	}

	function edit($id){ 
		//$kode=$this->session->userdata('idadmin');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode); 

		$x['data'] = $this->m_usaha->get_detail($id)->row_array(); 
		$x['data_sektor'] = $this->m_usaha->get_detail($id)->result(); 
		$x['data_sub_sektor'] = $this->m_usaha->get_detail($id)->result(); 

		$x['data_komoditas'] = $this->m_usaha->get_data_komoditas(); 
		$x['data_sumber_modal'] = $this->m_usaha->get_data_sumber_modal()->result(); 
		$x['data_status_kepemilikan'] = $this->m_usaha->get_data_status_kepemilikan()->result(); 
		$x['data_sektor_usaha'] = $this->m_usaha->get_data_sektor_usaha()->result(); 
		$x['data_sub_sektor_usaha'] = $this->m_usaha->get_data_sub_sektor_usaha()->result(); 

		$this->session->set_flashdata('msg', 'Berhasil');
		$this->load->view('admin/v_edit_usaha',$x);
	}

	

	function tambah($id) {

		
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  

			
			$x['data_komoditas'] = $this->m_usaha->get_data_komoditas()->result();  
			$x['data_sumber_modal'] = $this->m_usaha->get_data_sumber_modal()->result(); 
			$x['data_status_kepemilikan'] = $this->m_usaha->get_data_status_kepemilikan()->result(); 
			$x['data_sektor_usaha'] = $this->m_usaha->get_data_sektor_usaha()->result(); 
			$x['data_sub_sektor_usaha'] = $this->m_usaha->get_data_sub_sektor_usaha()->result(); 
			
			
			$this->load->view('admin/v_tambah_usaha',$x);
		}else{
			redirect('administrator');
		}
	}



	

   function check_data(){
	   $this->form_validation->set_rules('username', 'Username', 'is_unique[relawan.username]');
	   if ($this->form_validation->run() == FALSE) {
		echo $this->session->set_flashdata('msg','exist');
		redirect('admin/relawan');
	   } else {
		   $this->save_data();
	   }
   }


	function save_data(){

		$nama_usaha=$this->input->post('nama_usaha');
		$th_berdiri=$this->input->post('th_berdiri');
		$no_izin=$this->input->post('no_izin');
		$nama_pimpinan=$this->input->post('nama_pimpinan');
		$nik=$this->input->post('nik');
		$sektor_usaha=$this->input->post('sektor_usaha');
		$sub_sektor_usaha=$this->input->post('sub_sektor_usaha');
		$alamat=$this->input->post('alamat');
		$desa=$this->input->post('desa');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');
		$komoditas=$this->input->post('komoditas');
		$jml_karyawan=$this->input->post('jml_karyawan');
		$kapasitas_produksi=$this->input->post('kapasitas_produksi');
		$satuan_produksi=$this->input->post('satuan_produksi');
		$periode_produksi=$this->input->post('periode_produksi');
		$status_kepemilikan=$this->input->post('status_kepemilikan');
		//$status_kepengurusan=$this->input->post('status_kepengurusan');
		$status_kepemilikan_tempat=$this->input->post('status_kepemilikan_tempat');
		$metode_pemasaran=$this->input->post('metode_pemasaran');
		$sumber_modal=$this->input->post('sumber_modal');
		$skala_pasar=$this->input->post('skala_pasar');
		$luas_lahan=$this->input->post('luas_lahan');
		$periode_tanam=$this->input->post('periode_tanam');
		$telpon=$this->input->post('telpon');
		$email=$this->input->post('email');
		$website=$this->input->post('website');
		//$level=$this->input->post('xlevel');




		$data=array(
			'nama_usaha'=>$nama_usaha,
			'th_berdiri'=>$th_berdiri,
			'no_izin'=>$no_izin,
			'nik'=>$nik,
			'sektor_usaha'=>$sektor_usaha,
			'sub_sektor_usaha'=>$sub_sektor_usaha,
			'alamat'=>$alamat,
			'desa'=>$desa,
			'kecamatan'=>$kecamatan,
			'kabupaten'=> $kabupaten,
			'komoditas'=>$komoditas,
			'jml_karyawan'=>$jml_karyawan,
			'kapasitas_produksi'=>$kapasitas_produksi,
			'satuan_produksi'=>$satuan_produksi,
			'periode_produksi'=>$periode_produksi,
			'status_kepemilikan'=>$status_kepemilikan,
			//'status_kepengurusan'=>$status_kepengurusan,
			'status_kepemilikan_tempat'=>$status_kepemilikan_tempat,
			'sumber_modal'=>$sumber_modal,
			'skala_pasar'=>$skala_pasar,
			'luas_lahan'=>$luas_lahan,
			'periode_tanam'=>$periode_tanam,
			'telpon'=>$telpon,
			'email'=>$email,
			'website'=>$website,
			'id_user'=>$_SESSION['idadmin']
		);

	
		$this->m_usaha->insert($data);
		redirect('admin/usaha');
}

	
function update_data(){
 
		$id=$this->input->post('id');
		$nama_usaha=$this->input->post('nama_usaha');
		$nama_pimpinan=$this->input->post('nama_pimpinan');
		$th_berdiri=$this->input->post('th_berdiri');
		$no_izin=$this->input->post('no_izin');
		$nama_pimpinan=$this->input->post('nama_pimpinan');
		$nik=$this->input->post('nik');
		$sektor_usaha=$this->input->post('sektor_usaha');
		$sub_sektor_usaha=$this->input->post('sub_sektor_usaha');
		$alamat=$this->input->post('alamat');
		$desa=$this->input->post('desa');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');
		$komoditas=$this->input->post('komoditas');
		$jml_karyawan=$this->input->post('jml_karyawan');
		$kapasitas_produksi=$this->input->post('kapasitas_produksi');
		$satuan_produksi=$this->input->post('satuan_produksi');
		$periode_produksi=$this->input->post('periode_produksi');
		$status_kepemilikan=$this->input->post('status_kepemilikan');
		//$status_kepengurusan=$this->input->post('status_kepengurusan');
		$status_kepemilikan_tempat=$this->input->post('status_kepemilikan_tempat');
		$metode_pemasaran=$this->input->post('metode_pemasaran');
		$sumber_modal=$this->input->post('sumber_modal');
		$skala_pasar=$this->input->post('skala_pasar');
		$luas_lahan=$this->input->post('luas_lahan');
		$periode_tanam=$this->input->post('periode_tanam');
		$telpon=$this->input->post('telpon');
		$email=$this->input->post('email');
		$website=$this->input->post('website');
		//$level=$this->input->post('xlevel');




		$data=array(
			'nama_usaha'=>$nama_usaha,
			'nama_pimpinan'=>$nama_pimpinan,
			'th_berdiri'=>$th_berdiri,
			'no_izin'=>$no_izin,
			'nik'=>$nik,
			'sektor_usaha'=>$sektor_usaha,
			'sub_sektor_usaha'=>$sub_sektor_usaha,
			'alamat'=>$alamat,
			'desa'=>$desa,
			'kecamatan'=>$kecamatan,
			'kabupaten'=> $kabupaten,
			'komoditas'=>$komoditas,
			'jml_karyawan'=>$jml_karyawan,
			'kapasitas_produksi'=>$kapasitas_produksi,
			'satuan_produksi'=>$satuan_produksi,
			'periode_produksi'=>$periode_produksi,
			'status_kepemilikan'=>$status_kepemilikan,
			'status_kepemilikan_tempat'=>$status_kepemilikan_tempat,
			'sumber_modal'=>$sumber_modal,
			'skala_pasar'=>$skala_pasar,
			'luas_lahan'=>$luas_lahan,
			'periode_tanam'=>$periode_tanam,
			'telpon'=>$telpon,
			'email'=>$email,
			'website'=>$website,
			'id_user'=>$_SESSION['idadmin']
		);

	$this->m_usaha->update($id, $data);
	redirect('admin/usaha');
}



public function import_excel(){ 

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
		'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
		'application/vnd.openxmlformats-officeusaha.spreadsheetml.sheet');

			if(isset($_FILES['file']['name']) || in_array($_FILES['file']['type'], $file_mimes)) {

			 
			    $arr_file = explode('.', $_FILES['file']['name']); 
			    $extension = end($arr_file);
			 
			    if('csv' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			    } else if('xls' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			    }
				else {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

				}
			 
			    $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
			     
			    $rowData = $spreadsheet->getActiveSheet()->toArray();
				for($i = 1;$i < count($rowData);$i++)
					{	

				    $data = array(	
						'nama_usaha'=>$rowData[$i][1],
						'nama_pimpinan'=>$rowData[$i][2],
						'th_berdiri'=>$rowData[$i][3],
						'no_izin'=>$rowData[$i][4],
						'nik'=>$rowData[$i][5],
						'sektor_usaha'=>$rowData[$i][6],
						'sub_sektor_usaha'=>$rowData[$i][7],
						'alamat'=>$rowData[$i][8],
						'desa'=>$rowData[$i][9],
						'kecamatan'=>$rowData[$i][10],
						'kabupaten'=> $rowData[$i][11],
						'komoditas'=>$rowData[$i][12],
						'jml_karyawan'=>$rowData[$i][13],
						'kapasitas_produksi'=>$rowData[$i][14],
						'satuan_produksi'=>$rowData[$i][15],
						'periode_produksi'=>$rowData[$i][16],
						'status_kepemilikan'=>$rowData[$i][17],
						'status_kepemilikan_tempat'=>$rowData[$i][18],
						'metode_pemasaran'=>$rowData[$i][19],
						'sumber_modal'=>$rowData[$i][20],
						'skala_pasar'=>$rowData[$i][21],
						'luas_lahan'=>$rowData[$i][22],
						'telpon'=>$rowData[$i][23],
						'email'=>$rowData[$i][24],
						'website'=>$rowData[$i][25],
						'id_user'=>$_SESSION['idadmin']
				    	);
						$this->m_usaha->insert($data);
				   
			    }
				echo $this->session->set_flashdata('Import berhasil.','success-success');
				redirect('admin/usaha');
			}
			
}


public function import_update_excel(){
	$unit_arsip=$this->session->kode_uk_up;
			  
	$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
	'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
	'application/vnd.openxmlformats-officeusaha.spreadsheetml.sheet');

		if(isset($_FILES['file']['name']) || in_array($_FILES['file']['type'], $file_mimes)) {

		 
			$arr_file = explode('.', $_FILES['file']['name']); 
			$extension = end($arr_file);
		 
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if('xls' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

			}
		 
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			 
			$rowData = $spreadsheet->getActiveSheet()->toArray();

			for($i = 1;$i < count($rowData);$i++)
			{	
				$dap_id = $rowData[$i][0];
				$unit_arsip_excel = $rowData[$i][1];
				$tgl_akhir_aktif = $rowData[$i][17];
				$tgl_akhir_inaktif = $rowData[$i][18];
				$deskripsi = $rowData[$i][19];

				if ($unit_arsip != "SEKPROV") {
					if ($unit_arsip != $unit_arsip_excel) {

						echo "Kode unit arsip tidak sesuai untuk ".$unit_arsip." dengan ".$unit_arsip_excel."</br>";
						continue;

					}
				}



				$data = array(						
						"unit_arsip"=> $unit_arsip_excel,
						"nomor_berkas"=> $rowData[$i][2],
						"nomor_arsip"=> $rowData[$i][3],
						"kode_klasifikasi"=> $rowData[$i][4],
						"uraian"=> str_replace("'"," ", $rowData[$i][5]),
						"tgl_cipta"=> $rowData[$i][6],
						"jumlah_satuan"=> $rowData[$i][7],
						"jenis"=> $rowData[$i][8],
						"pencipta"=> $rowData[$i][9],
						"media"=> $rowData[$i][10],
						"kondisi"=> $rowData[$i][11],
						"lokasi_simpan"=> $rowData[$i][12],
						"tingkat_perkembangan"=> $rowData[$i][13],
						"nasib_akhir"=> $rowData[$i][14],
						"arsip_vital"=> $rowData[$i][15],
						"keamanan"=> $rowData[$i][16],
						"tgl_akhir_aktif"=> $tgl_akhir_aktif,
						"tgl_akhir_inaktif"=> $tgl_akhir_inaktif, 
						"deskripsi"=>$deskripsi
					);
					$this->m_usaha->update($dap_id, $data);
			   
			}

			$this->session->set_flashdata('Import berhasil.','success-success');
			redirect('admin/usaha');
		  
		}
		
}


function delete_data($id){
	
	 $this->m_usaha->delete($id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/usaha');
}


function delete_data_verifikasi($id){
	
	$this->m_usaha->delete($id);
	   echo $this->session->set_flashdata('msg','success-hapus');
	   redirect('admin/usaha/verifikasi');
}



}