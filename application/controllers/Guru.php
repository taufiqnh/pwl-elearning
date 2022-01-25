<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->model('M_siswa');
        $this->load->model('M_admin');
    }

    public function index()
    {
        $this->load->view('v_login_guru');
    }

    public function dashboard()
    {
        $this->load->view('v_guru');
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

    public function guru_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => 'Username harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password harus diisi!'));
        if ($this->form_validation->run() == true) {
            if ($this->M_guru->m_guru_login()->num_rows() > 0) {
                $data = $this->M_guru->m_guru_login()->row();
                $dataguru = array(
                    'login' => TRUE,
                    'email' => $data->email,
                    'password' => $data->password,
                    'id_guru' => $data->id_guru,
                    'nama_guru' => $data->nama_guru,
                    'nama_mapel' => $data->nama_mapel,
                    'role' => 'Guru'
                );
                $this->session->set_userdata($dataguru);
                unset($_SESSION['pesan']);
                redirect('guru/dashboard','refresh');
            }
            else {
                $this->session->set_flashdata('pesan', 'Username dan password salah');
                redirect('guru');
            }
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('guru');
        }
    }

    public function dataguru()
    {
        $data['konten'] = 'v_guru';
        $data['active'] = 'Guru';
        $data['judul'] = 'Data Guru';
        $data['guru'] = $this->M_guru->m_guru_tampil();
        $data['count'] = $this->M_guru->m_guru_hitung();
        $this->load->view('v_dataguru', $data);
    }
    public function datasiswa()
    {
        $data['konten'] = 'v_siswa';
        $data['active'] = 'Siswa';
        $data['judul'] = 'Data Siswa';
        $data['siswa'] = $this->M_siswa->m_siswa_tampil();
        $data['count'] = $this->M_siswa->m_siswa_hitung();
        unset($_SESSION['pesan']);
        $this->load->view('v_guru_dsiswa', $data);
    }

    public function guru_tambah()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'trim|required', array('required' => 'Nip harus diisi!'));
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required', array('required' => 'Nama Guru harus diisi!'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => 'Email harus diisi!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password harus diisi!'));
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'trim|required', array('required' => 'Nama Mapel harus diisi!'));

        if ($this->form_validation->run() == true) {
            if ($this->input->post('tambah')) {
                if ($this->M_guru->m_guru_tambah() == TRUE) {
                    $this->session->set_flashdata('pesan', 'Sukses menambah Data Guru');
                }
                else {
                    $this->session->set_flashdata('pesan', 'Gagal menambah Data Guru');
                }
            }
            else {
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan pada form');
            }
            redirect('guru/dataguru');
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('guru/dataguru');
        }
    }

    public function get_guru_id($id)
    {
        $data = $this->M_guru->get_dataguru_id($id);
        echo (json_encode($data));
    }

    public function guru_ubah()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'trim|required', array('required' => 'Nip harus diisi!'));
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required', array('required' => 'Nama Guru harus diisi!'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => 'Email harus diisi!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password harus diisi!'));
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'trim|required', array('required' => 'Nama Mapel harus diisi!'));

        if ($this->form_validation->run() == true) {
            $id         = $this->input->post('id_guru');
            $nip        = $this->input->post('nip');
            $nama_guru  = $this->input->post('nama_guru');
            $email      = $this->input->post('email');
            $password   = md5($this->input->post('password'));
            $nama_mapel = $this->input->post('nama_mapel');

            $this->session->set_flashdata('pesan', 'Sukses mengubah guru');
            $this->M_guru->m_guru_ubah($id, $nip, $nama_guru, $email, $password, $nama_mapel);
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal mengubah guru');
        }
        redirect('guru/dataguru');
    }

    public function guru_hapus($id='')
    {
        $hapus = $this->M_guru->m_guru_hapus($id);
        if ($hapus == true) {
            $this->session->set_flashdata('pesan', 'Sukses menghapus Data Guru');
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal menghapus Data Guru');
        }
        redirect('guru/dataguru');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('guru','refresh');
    }
}
