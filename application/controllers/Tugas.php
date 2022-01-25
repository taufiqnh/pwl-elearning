<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tugas');
    }

    public function datatugas1()
    {
        $data['konten'] = 'v_tugas';
        $data['active'] = 'Tugas';
        $data['judul'] = 'Data Tugas';
        $data['tugas'] = $this->db->get_where('tugas', ['nama_guru' =>
            $this->session->userdata('nama_guru')])->row_array();
        $data['tugas'] = $this->M_tugas->m_tugas_tampil()->result();
        $data['count'] = $this->M_tugas->m_tugas_hitung();
        unset($_SESSION['pesan']);
        $this->load->view('v_datatugas', $data);
    }

    public function tugas_tambah()
    {
        $this->form_validation->set_rules('nama_tugas', 'tugas', 'trim|required', array('required' => 'tugas harus diisi!'));
        if ($this->form_validation->run() == true) {
            if ($this->input->post('tambah')) {
                if ($this->M_tugas->m_tugas_tambah() == TRUE) {
                    $this->session->set_flashdata('pesan', 'Sukses menambah Data tugas');
                }
                else {
                    $this->session->set_flashdata('pesan', 'Gagal menambah Data tugas');
                }
            }
            else {
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan pada form');
            }
            redirect('tugas/datatugas');
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('tugas/datatugas');
        }
    }

    public function get_tugas_id($id)
    {
        $data = $this->M_tugas->get_datatugas_id($id);
        echo (json_encode($data));
    }

    public function tugas_ubah()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required', array('required' => 'Deskripsi harus diisi!'));
        if ($this->form_validation->run() == true) {
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size'] = '0';
            $config['upload_path'] = './assets/tugas';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_tugas')) {
                $data = array('upload_data' => $this->upload->data());
                $id = $this->input->post('id_tugas');
                $deskripsi = $this->input->post('deskripsi');
                $file = $data['upload_data']['file_name'];
                $deadline = $this->input->post('deadline');

                $this->session->set_flashdata('pesan', 'Sukses mengubah data Tugas');
                $this->M_tugas->update_tugas($id, $deskripsi, $file, $deadline);
            } else {
                    $this->upload->display_errors();
            }
        }
        redirect('tugas/datatugasguru');
    }

    public function tugas_hapus($id='')
    {
        $hapus = $this->M_tugas->m_tugas_hapus($id);
        if ($hapus == true) {
            $this->session->set_flashdata('pesan', 'Sukses menghapus Data tugas');
        }
        else {
            $this->session->set_flashdata('pesan', 'Gagal menghapus Data tugas');
        }
        redirect('tugas/datatugas');
    }

    public function datatugas()
    {
        $this->load->model('M_tugas');
        $data['tugas'] = $this->M_tugas->m_tugas_siswa()->result();
        $this->load->view('v_siswa_tugas', $data);
    }

    public function datatugasguru()
    {
        $data['konten'] = 'v_tugas';
        $data['active'] = 'Tugas';
        $data['judul'] = 'Data Tugas';
        $data['tugas'] = $this->db->get_where('tugas', ['nama_guru' =>
            $this->session->userdata('nama_guru')])->row_array();
        $data['tugas'] = $this->M_tugas->m_tugas_tampil()->result();
        $data['count'] = $this->M_tugas->m_tugas_hitung();
        unset($_SESSION['pesan']);
        $this->load->view('v_datatugas', $data);
    }

    public function tugas($id)
    {
        //$this->load->library('disqus');

        $this->load->model('M_tugas');

        $where = array('id' => $id);
        $detail = $this->M_tugas->tugas($id);
        $data['detail'] = $detail;
        //$data['disqus'] = $this->disqus->get_html();
        $this->load->view('tugas/tugas', $data);
    }
    public function upload_tugas_guru()
    {
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', array('required' => 'Deskripsi harus diisi!'));   
        if ($this->form_validation->run() == true) {

            $upload_tugas = $_FILES['file_tugas'];
            if ($upload_tugas) {
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/tugas';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_tugas')) {
                    $file_tugas = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'file' => $file_tugas,
                'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            ];

            $this->db->insert('tugas', $data);
            $this->session->set_flashdata('pesan', 'Sukses mengubah data siswa');
            redirect('tugas/datatugasguru');
        }
    }
        //redirect('materi/datamateri');

    public function upload_tugas()
    {
         $this->load->model('M_tugas');
            $upload_video = $_FILES['jawaban'];

            if ($upload_video) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/k_tugas';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('jawaban')) {
                    $jawaban = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'id_tugas' => $this->input->post('id_tugas'),
                'id_siswa' => $this->input->post('id_siswa'),
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'file' => $jawaban,
                'catatan' => $this->input->post('catatan'),
                'tgl_kumpul' => $this->input->post('tgl_kumpul'),
            ];

            $this->db->insert('kumpultugas', $data);
            $this->session->set_flashdata('pesan', 'Berhasil Upload Jawaban!');
            redirect('tugas/datatugas');
        
    }
}
