<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_materi');
        $this->load->model('M_guru');
    }

    public function datamateri()
    {
        $data['konten'] = 'v_materi';
        $data['active'] = 'Materi';
        $data['judul'] = 'Data Materi';
        $data['materi'] = $this->M_materi->m_materi_tampil()->result();
        $data['count'] = $this->M_materi->m_materi_hitung();
        unset($_SESSION['pesan']);
        $this->load->view('v_datamateri', $data);
    }

    public function upload_materi()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[1]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == true) {
            
            $upload_video = $_FILES['video'];

            if ($upload_video) {
                $config['allowed_types'] = 'mp4|mkv|mov';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/materi';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video')) {
                    $video = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
                'video' => $video,
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            ];

            $this->db->insert('materi', $data);
            $this->session->set_flashdata('pesan', 'Sukses mengubah data siswa');
            redirect('materi/datamateri');
    }
        //redirect('materi/datamateri');
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

    public function get_materi_id($id)
    {
        $data = $this->M_materi->get_datamateri_id($id);
        echo (json_encode($data));
    }

    public function materi_ubah()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required', array('required' => 'Deskripsi harus diisi!'));
        if ($this->form_validation->run() == true) {
            $config['allowed_types'] = 'mp4|mkv|mov';
            $config['max_size'] = '0';
            $config['upload_path'] = './assets/materi';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('video')) {
                $data = array('upload_data' => $this->upload->data());
                $id = $this->input->post('id_materi');
                $video = $data['upload_data']['file_name'];
                $deskripsi = $this->input->post('deskripsi');
                $kelas = $this->input->post('kelas');

                $this->session->set_flashdata('pesan', 'Sukses mengubah data Materi');
                $this->M_materi->update_materi($id, $video, $deskripsi, $kelas);
            } else {
                    $this->upload->display_errors();
            }
        }
        redirect('materi/datamateri');
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

    public function matematika_x()
    {
        $this->load->model('M_materi');
        $data['materi'] = $this->M_materi->matematika_x()->result();
        //$data['tugas'] = $this->M_materi->datatugas()->result();
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $this->load->view('materi/matematika_x', $data);
    }
    public function belajar($id)
    {
        //$this->load->library('disqus');

        $this->load->model('M_materi');

        $where = array('id' => $id);
        $detail = $this->M_materi->belajar($id);
        $data['detail'] = $detail;
        //$data['disqus'] = $this->disqus->get_html();
        $this->load->view('materi/belajar', $data);
    }
}
