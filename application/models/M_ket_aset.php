<?php
class M_ket_aset extends CI_Model{

    function get_all_ket_aset (){
        $select = $this->db->query("SELECT * FROM ket_aset");
        return $select;
    }

    public function insert_ket_aset($nama_aset,$jenis_aset,$valuasi)
    {

        $insert_data = $this->db->query("INSERT INTO ket_aset (nama_aset,jenis_aset,valuasi) VALUES('$nama_aset','$jenis_aset','$valuasi') ");
        return $insert_data;
    }

}
?>