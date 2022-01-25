<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tugas extends CI_Model{
    
    public function m_tugas_siswa()
    {
        return $this->db->get('tugas');
    }

    public function m_tugas_tampil()
    {
        return $this->db->get_where('tugas', ['nama_guru' =>
            $this->session->userdata('nama_guru')]);
    }

    public function m_tugas_hitung()
    {
        return $this->db->query("SELECT * FROM tugas")->num_rows();
    }

    public function m_tugas_tambah()
    {
        $nama_tugas = $this->input->post('nama_tugas');

        $this->db->query("INSERT INTO tugas VALUES('', '$nama_tugas')");
        if ($this->db->affected_rows()>0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function get_datatugas_id($id)
    {
        return $this->db->query("SELECT * FROM tugas WHERE id_tugas='$id'")->row();
    }

    public function update_tugas($id, $deskripsi, $file, $deadline)
    {
        return $this->db->query("UPDATE tugas SET deskripsi='$deskripsi', file='$file', deadline='$deadline' WHERE id_tugas='$id'");
        
    }

    public function m_tugas_ubah($id, $nama_tugas)
    {
        return $this->db->query("UPDATE tugas SET nama_tugas='$nama_tugas' WHERE id_tugas='$id'");
    }

    public function m_tugas_hapus($id)
    {
        return $this->db->query("DELETE FROM tugas WHERE id_tugas='$id'");
    }

    public function matematika_x_tugas()
    {
        $mapel = 'Matematika';
        $kelas = '7';

        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    // public function datatugas()
    // {
    //     return $this->db->get('tugas');
    // }

    public function tugas($id = null)
    {
        $query = $this->db->get_where('tugas', array('id_tugas' => $id))->row();
        return $query;
    }
}
