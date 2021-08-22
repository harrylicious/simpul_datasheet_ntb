<?php
class M_user extends CI_Model{

    public $tabel ="users";
    public $id = "kode_user";
    public $wilayah = "wilayah";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    
    // get all
    function get_all(){
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->tabel)->result(); 

    }

     
    // get detail 
    function get_detail($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->tabel);  

    }


    //insert data
    function insert($data){
        $this->db->insert($this->tabel,$data);
    }

    
    
    //update data
    function update($id, $data){
        $this->db->where($this->id,$id);
        $this->db->update($this->tabel,$data);

    }

    //update data
    function update_password($id,$data){
        $this->db->where("kode_uk_up",$id);
        $this->db->update($this->tabel,$data);

    }
    
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->tabel);
    }


    
}
?>