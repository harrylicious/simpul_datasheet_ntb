<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Produk extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $data = $this->db->get('produk')->result();
            $this->response($data, 200);
        } else {
            $data = $this->db->where('id', $id);
            $data = $this->db->get('produk')->result();
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