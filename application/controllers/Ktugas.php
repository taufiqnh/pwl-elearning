<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ktugas extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ktugas');
    }

    public function dataktugasguru()
    {
        $data['konten'] = 'v_kumpultugas';
        $data['active'] = 'Kumpul Tugas';
        $data['judul'] = 'Data Kumpul Tugas';
        $data['ktugas'] = $this->M_ktugas->m_ktugas_tampil()->result();
        $data['count'] = $this->M_ktugas->m_ktugas_hitung();
        unset($_SESSION['pesan']);
        $this->load->view('v_kumpultugas', $data);
    }
    public function dataktugas()
    {
        $data['konten'] = 'v_ktugas';
        $data['active'] = 'Tugas Saya';
        $data['judul'] = 'Data Kumpul Tugas';
        $data['ktugas'] = $this->M_ktugas->m_ktugassaya_tampil()->result();
        $data['count'] = $this->M_ktugas->m_ktugas_hitung();
        unset($_SESSION['pesan']);
        $this->load->view('v_ktugassaya', $data);
    }

    public function materi_tambah()
    {
        $this->form_validation->set_rules('nama_materi', 'materi', 'trim|required', array('required' => 'materi harus diisi!'));
        if ($this->form_validation->run() == true) {
            if ($this->input->post('tambah')) {
                if ($this->M_materi->m_materi_tambah() == TRUE) {
                    $this->session->set_flashdata('pesan', 'Sukses menambah Data Materi');
                }
                else {
                    $this->session->set_flashdata('pesan', 'Gagal menambah Data Materi');
                }
            }
            else {
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan pada form');
            }
            redirect('materi/datamateri');
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('materi/datamateri');
        }
    }

    public function get_ktugas_id($id)
    {
        $data = $this->M_ktugas->get_dataktugas_id($id);
        echo (json_encode($data));
    }

    public function ktugas_ubah()
    {
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required', array('required' => 'nilai harus diisi!'));
        if ($this->form_validation->run() == true) {
            $id_ktugas   = $this->input->post('id_ktugas');
            $nilai = $this->input->post('nilai');

            $this->session->set_flashdata('pesan', 'Berhasil memberikan nilai');
            $this->M_ktugas->m_ktugas_ubah($id_ktugas, $nilai);
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal memberikan nilai');
        }
        redirect('ktugas/dataktugasguru');
    }

    public function materi_hapus($id='')
    {
        $hapus = $this->M_materi->m_materi_hapus($id);
        if ($hapus == true) {
            $this->session->set_flashdata('pesan', 'Sukses menghapus Data materi');
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal menghapus Data materi');
        }
        redirect('materi/datamateri');
    }
}
