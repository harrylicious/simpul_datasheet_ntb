<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Usaha extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('m_usaha');
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $data = $this->m_usaha->get_all();
            $this->response($data, 200);
        } else {
            $data = $this->m_usaha->get_detail($id)->result();
            if ($data) {  
                $this->response($data, 200);
            }
            else {
                $this->response('not found', 404);
                
            }
        }
    }


    //Masukan function selanjutnya disini
}
?>