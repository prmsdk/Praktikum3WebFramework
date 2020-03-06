<?php

// class Crud adalah sebuah controller yang mengatur segala hal tentang CRUD pada database kali ini
class Crud extends CI_Controller 
{
  // function construct adalah function yang akan dijalankan pertama sekali dan dijalankan otomatis pada saat controller ini diakses/dijalankan
  public function __construct()
  {
    parent::__construct();
    // berikut adalah baris kode yang digunakan untuk memuat model bernama m_data
    $this->load->model('m_data');
  }

  // berikut adalah method yang akan diakses saat controller ini diakses walaupun tanpa menyertakan method
  public function index()
  {
    // berikut adalah variabel array bernama $data yang memiliki index user, digunakan untuk menyimpan data yang berasal dari hasil method tampil_data() dari model bernama m_data. isi dari method tampil_data adalah menampilkan semua data yang berada di tabel user pada database
    $data['user'] = $this->m_data->tampil_data()->result();
    // berikut adalah baris kode yang berfungsi untuk menampilkan v_tampil beserta membawa data dari tabel user
    $this->load->view('v_tampil', $data);
  }

  // berikut adalah method yang akan mengarahkan pengguna ke v_input yang berisi form input untuk menginputkan data baru
  function tambah(){
		$this->load->view('v_input');
  }
  
  // berikut adalah method yang akan dijalankan ketika tombol submit dalam v_input ditekan, method ini berfungsi merekam data dari view, menyimpannya ke dalam database, dan mengembalikan pengguna ke method index()
  function tambah_aksi(){
    // ketiga baris kode dibawah adalah baris kode yang berfungsi merekam data yang diinput oleh pengguna, data direkam berdasarkan method post, menggunakan index 'name' pada tag input dalam view
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
    // berikut adalah sebuah array yang berguna untuk menjadikan ketiga diatas menjadi 1 variabel yang nantinya akan disertakan ke dalam query insert pada model bernama m_data.
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
      );
      
    // berikut adalah baris kode yang berfungsi untuk melakukan insert data ke dalam database menggunakan method input_data() dengan mengirimkan 2 parameter yaitu sebuah array data dan nama tabel yang dimaksud.
    $this->m_data->input_data($data,'user');
    // berikut adalah baris kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/
		redirect('crud/index');
  }
  
  // method hapus berfungsi untuk melakukan hapus data dari database, dan memerlukan 1 parameter yaitu $id yang berasal dari id user yang dikirim pengguna menggunakan uri segment ke 3
  function hapus($id){
    // baris kode berikut berfungsi untuk menyimpan id user ke dalam array $where pada index array bernama 'id'
    $where = array('id' => $id);
    // baris kode dibawah adalah menjalankan query hapus yang berasal dari method hapus_data() pada model m_data. Mengirimkan 2 parameter yaitu id yang disimpan pada array $where, dan tabel yang bernama user
    $this->m_data->hapus_data($where,'user');
    // berikut adalah baris kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/
		redirect('crud/index');
  }
  
  // method edit ini berfungsi untuk mengarahkan user ke view_edit yang merupakan form input edit untuk melakukan update data ke dalam database, membutuhkan 1 parameter yaitu id user
  function edit($id){
    // baris kode berikut berfungsi untuk menyimpan id user ke dalam array $where pada index array bernama 'id'
    $where = array('id' => $id);
    // baris kode dibawah adalah baris kode yang mengambil data user berdasarkan id dan disimpan kedalam array $data dengan index bernama user
    $data['user'] = $this->m_data->edit_data($where,'user')->result();
    // kode berikut berfungsi untuk memuat view edit dan membawa data hasil query diatas
		$this->load->view('v_edit',$data);
  }
  
  // baris kode function update adalah method yang diajalankan ketika tombol submit pada form v_edit ditekan, method ini berfungsi untuk merekam data, memperbarui baris database yang dimaksud, lalu mengarahkan pengguna ke controller crud method index
  function update(){
    // keempat baris kode dibawah berfungsi untuk merekam data yang dikirim melalui method post, berdasarkan name masing masing pada form di v_edit
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $pekerjaan = $this->input->post('pekerjaan');
   
    // berikut adalah sebuah array yang berguna untuk menjadikan ketiga diatas menjadi 1 variabel yang nantinya akan disertakan ke dalam query update pada model bernama m_data. variabel $id dipisahkan karena nantinya akan menjadi data pada where bukan pada values
    $data = array(
      'nama' => $nama,
      'alamat' => $alamat,
      'pekerjaan' => $pekerjaan
    );
   
    // baris kode berikut berfungsi untuk menyimpan id user ke dalam array $where pada index array bernama 'id'
    $where = array(
      'id' => $id
    );
   
    // berikut adalah kode yang berfungsi melakukan query update dengan menjalankan method update_data() pada model m_data, memerlukan 3 parameter yaitu $where sebagai id yg diperlukan untuk mendefinisikan where pada query, kedua $data adalah ketiga values yang diperbarui pada database, dan ketiga adalah nama tabel yang akan dilakukan update
    $this->m_data->update_data($where,$data,'user');

    // berikut adalah baris kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/
    redirect('crud/index');
  }
}
