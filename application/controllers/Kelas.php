<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelas');
    }

    public function datakelas()
    {
        $data['konten'] = 'v_kelas';
        $data['active'] = 'Kelas';
        $data['judul'] = 'Data Kelas';
        $data['kelas'] = $this->M_kelas->m_kelas_tampil();
        $data['count'] = $this->M_kelas->m_kelas_hitung();
        $this->load->view('v_datakelas', $data);
    }

    public function kelas_tambah()
    {
        $this->form_validation->set_rules('nama_kelas', 'kelas', 'trim|required', array('required' => 'kelas harus diisi!'));
        if ($this->form_validation->run() == true) {
            if ($this->input->post('tambah')) {
                if ($this->M_kelas->m_kelas_tambah() == TRUE) {
                    $this->session->set_flashdata('pesan', 'Sukses menambah Data Kelas');
                }
                else {
                    $this->session->set_flashdata('pesan', 'Gagal menambah Data Kelas');
                }
            }
            else {
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan pada form');
            }
            redirect('kelas/datakelas');
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('kelas/datakelas');
        }
    }

    public function get_kelas_id($id)
    {
        $data = $this->M_kelas->get_datakelas_id($id);
        echo (json_encode($data));
    }

    public function kelas_ubah()
    {
        $this->form_validation->set_rules('nama_kelas', 'kelas', 'trim|required', array('required' => 'kelas harus diisi!'));
        if ($this->form_validation->run() == true) {
            $id_kelas   = $this->input->post('id_kelas');
            $nama_kelas = $this->input->post('nama_kelas');

            $this->session->set_flashdata('pesan', 'Sukses mengubah Data Kelas');
            $this->M_kelas->m_kelas_ubah($id_kelas, $nama_kelas);
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal mengubah Data Kelas');
        }
        redirect('kelas/datakelas');
    }

    public function kelas_hapus($id='')
    {
        $hapus = $this->M_kelas->m_kelas_hapus($id);
        if ($hapus == true) {
            $this->session->set_flashdata('pesan', 'Sukses menghapus Data Kelas');
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal menghapus Data Kelas');
        }
        redirect('kelas/datakelas');
    }
}
