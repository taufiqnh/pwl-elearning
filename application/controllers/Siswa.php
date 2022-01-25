<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        //$this->load->model('M_tarif');
        $this->load->model('M_admin');
    }

    public function index()
    {
        $this->load->view('v_login_siswa');
    }

    public function dashboard()
    {
        $this->load->view('v_siswa');
    }

    // public function register()
    // {
    //     $data['tarif'] = $this->M_tarif->m_tarif_tampil();
    //     $this->load->view('v_register', $data);
    // }

  //   public function pelanggan_register()
  //   {
  //       $this->form_validation->set_rules('username', 'Username', 'trim|required', array('required' => 'Username harus diisi!'));
		// $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password harus diisi!'));
  //       $this->form_validation->set_rules('nomor_kwh', 'Nomor Meter', 'trim|required', array('required' => 'Nomor Meter harus diisi!'));
		// $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'trim|required', array('required' => 'Nama Pelanggan harus diisi!'));
  //       $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat harus diisi!'));
		// $this->form_validation->set_rules('id_tarif', 'Daya', 'trim|required', array('required' => 'Daya harus diisi!'));
  //       if ($this->form_validation->run() == true) {
  //           if ($this->input->post('submit')) {
  //               if ($this->M_pelanggan->m_pelanggan_tambah() == TRUE) {
  //                   redirect('Pelanggan','refresh');
  //               }
  //               else {
  //                   $this->session->set_flashdata('pesan', 'Gagal menambahkan pelanggan');
  //                   redirect('Pelanggan/register');
  //               }
  //           }
  //           else {
  //               $this->session->set_flashdata('pesan', 'Terjadi kesalahan pada form');
  //               redirect('Pelanggan/register');
  //           }
  //       }
  //       else {
  //           $this->session->set_flashdata('pesan', validation_errors());
  //           redirect('Pelanggan/register');
  //       }
  //   }

    public function siswa_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => 'Username harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password harus diisi!'));
        if ($this->form_validation->run() == true) {
            if ($this->M_siswa->m_siswa_login()->num_rows() > 0) {
                $data = $this->M_siswa->m_siswa_login()->row();
                $datasiswa = array(
                    'login' => TRUE,
                    'email' => $data->email,
                    'password' => $data->password,
                    'nama_siswa' => $data->nama_siswa,
                    'id_siswa' => $data->id_siswa,
                    'role' => 'Siswa'
                );
                $this->session->set_userdata($datasiswa);
                unset($_SESSION['pesan']);
                redirect('siswa/dashboard','refresh');
            }
            else {
                $this->session->set_flashdata('pesan', 'Username dan password salah');
                redirect('/');
            }
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('/');
        }
    }

    public function datasiswa()
    {
        $data['konten'] = 'v_siswa';
        $data['active'] = 'Siswa';
        $data['judul'] = 'Data Siswa';
        $data['siswa'] = $this->M_siswa->m_siswa_tampil();
        $data['count'] = $this->M_siswa->m_siswa_hitung();
        $this->load->view('v_datasiswa', $data);
    }


    public function siswa_tambah()
    {
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required', array('required' => 'Nama Siswa harus diisi!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password harus diisi!'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => 'Email harus diisi!'));
    
        if ($this->form_validation->run() == true) {
            if ($this->input->post('tambah')) {
                if ($this->M_siswa->m_siswa_tambah() == TRUE) {
                    $this->session->set_flashdata('pesan', 'Sukses menambah Data Siswa');
                }
                else {
                    $this->session->set_flashdata('pesan', 'Gagal menambah Data Siswa');
                }
            }
            else {
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan pada form');
            }
            redirect('siswa/datasiswa');
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('siswa/datasiswa');
        }
    }

    public function upload_foto($id)
    {
        $config['upload_path'] = './assets/fotosiswa/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'fotosiswa'.$id;
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';

        $this->load->library('upload' , $config);
        if (!$this->upload->do_upload('fotosiswa')) {
            $this->session->set_flashdata('pesan', 'Gagal mengupload foto');
        }
        else {
            if ($this->M_siswa->update_siswa($this->upload->data('file_name'))) {
                $this->session->set_flashdata('pesan', 'Sukses mengupload Foto.');
            }
            else {
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan pada jaringan');
            }
        }
        redirect('siswa/datasiswa');
    }

    public function get_siswa_id($id)
    {
        $data = $this->M_siswa->get_datasiswa_id($id);
        echo (json_encode($data));
    }

    public function siswa_ubah()
    {
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required', array('required' => 'Nama Siswa harus diisi!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password harus diisi!'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => 'Email harus diisi!'));
        if ($this->form_validation->run() == true) {
            
            $config['upload_path'] = './assets/fotosiswa/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'fotosiswa'.$id;
            $config['max_size'] = '';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload',$config); 
            if($this->upload->do_upload('fotosiswa')){ 
                $data = array('upload_data' => $this->upload->data());
                $id         = $this->input->post('id_siswa');
                $nama_siswa = $this->input->post('nama_siswa');
                $password   = $this->input->post('password');
                $email      = $this->input->post('email');
                $fotosiswa  = $data['upload_data']['file_name'];

                $this->session->set_flashdata('pesan', 'Sukses mengubah data siswa');
                $this->M_siswa->update_siswa($id, $nama_siswa, $password, $email, $fotosiswa);
            }else {
            echo $this->upload->display_errors();
        }
    }
        redirect('siswa/datasiswa');
    }


    public function siswa_hapus($id='')
    {
        $hapus = $this->M_siswa->m_siswa_hapus($id);
        if ($hapus == true) {
            $this->session->set_flashdata('pesan', 'Sukses menghapus siswa');
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal menghapus siswa');
        }
        redirect('siswa/datasiswa');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('siswa','refresh');
    }
}
