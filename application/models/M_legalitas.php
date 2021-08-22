<?php
class M_legalitas extends CI_Model{

    public $table ="legalitas";
    public $keterangan_legalitas ="ket_legalitas";
    public $tb_data_legalitas="data_legalitas";
    public $data_usaha ="data_usaha";
    public $id = "id_legalitas";
    //public $order ="DESC";

    var $column_order = array(null,'nama_izin','no_izin','th_izin');
    var $column_search= array('nama_izin','no_izin','th_izin');
    var $order = array('id_legalitas' => 'asc'); // default order 



    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->join($this->data_usaha,'legalitas.id_usaha=data_usaha.id_usaha');
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order),$order[key($order)]);
        }
       
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    public function get_legalitas_by_id($id)
    {
        $this->db->from($this->tb_data_legalitas);
        $this->db->where('id_legalitas',$id);
        $query = $this->db->get();
        return $query->row();
        
    }

    public function update($where,$data)
    {
        
        $this->db->update($this->table,$data,$where);
        $this->db->affected_rows();
    }
   
    
    



    // get all
    function get_all(){
        return $this->db->get($this->table); 

    }

    function get_data_usaha(){
        return $this->db->get($this->data_usaha);
    }

    function get_ket_legalitas(){
        return $this->db->get($this->keterangan_legalitas);
    }


    //insert data
    function insert($data){
        $this->db->insert($this->table,$data);
        
    }
    
    function deleted_at($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->table,$data);
    }

    function check_duplicate($nama_izin){
        $this->db->where("nama_izin",$nama_izin);
        $query = $this->db->get($this->table);
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }


   

}
?>