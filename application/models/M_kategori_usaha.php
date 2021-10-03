<?php
class M_kategori_usaha extends CI_Model{

    public $table ="ket_kategori_usaha";
    public $table_sub ="ket_sub_kategori_usaha";
    public $id = "id";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }

    
    public function get_kategori_usaha_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
        
    }

    public function update($where,$data){
        
        $this->db->update($this->table,$data,$where);
        $this->db->affected_rows();
    }

    public function get_sub_kategori_usaha_by_id($id)
    {
        $this->db->from($this->table_sub);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
        
    }

    public function update_sub($where,$data){
        
        $this->db->update($this->table,$data,$where);
        $this->db->affected_rows();
    }


   


     //get some data 
     function get_sub_kategori_usaha($id){  
        $hsl=$this->db->query("SELECT *FROM data_kategori_usaha where id = '$id'");
        return $hsl;
    }


    

    // get all
    function get_all(){
        return $this->db->get($this->table); 

    }
 

    //insert data
    function insert($data){
        $this->db->insert($this->table,$data);
    
    }

    //insert data
    function insert_sub($data){
        $this->db->insert($this->table_sub,$data);
    
    }
    
    //update data
    function deleted_at($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->table,$data);

    }

      //update data
    function deleted_at_sub($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->table_sub,$data);

    }
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->table);
    }


    function check_duplicate($kategori){
        $this->db->where("kategori",$kategori);
        $query = $this->db->get($this->table);
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    function check_duplicate_sub($sub){
        $this->db->where("nama_sub",$sub);
        $query = $this->db->get($this->table_sub);
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }


    
}
?>