<?php
// model ini dibuat untuk melayani segala query terkait CRUD database
class M_Data extends CI_Model 
{
  // method ini digunakan untuk mengambil keseluruhan baris data pada tabel user
  function tampil_data(){
		return $this->db->get('user');
  }
  
  // method ini digunakan untuk melakukan insert data ke dalam tabel
  function input_data($data,$table){
		$this->db->insert($table,$data);
  }
  
  // method ini digunakan untuk melakukan delete ke dalam sebuah tabel
  function hapus_data($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  }

  // method ini digunakan untuk mengambil 1 baris data dalam tabel sesuai kondisi 'where'
  function edit_data($where,$table){		
    return $this->db->get_where($table,$where);
  }

  // method ini digunakan untuk memperbatui 1 baris pada tabel
  function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}
