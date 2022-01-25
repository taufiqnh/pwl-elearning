<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_materi extends CI_Model{
    
    public function m_materi_tampil()
    {
        return $this->db->get_where('materi', ['nama_guru' =>
            $this->session->userdata('nama_guru')]);
    }

    public function m_materi_hitung()
    {
        return $this->db->query("SELECT * FROM materi")->num_rows();
    }

    public function m_materi_tambah($nama_guru,$nama_mapel,$video,$deskripsi,$kelas)
    {
        return $this->db->query("INSERT INTO materi (nama_guru, nama_mapel, video, deskripsi, kelas)
        VALUES ($nama_guru,$nama_mapel,$video,$deskripsi,$kelas);");
    }

    public function get_datamateri_id($id)
    {
        return $this->db->query("SELECT * FROM materi WHERE id_materi='$id'")->row();
    }

    public function update_materi($id, $video, $deskripsi, $kelas)
    {
        return $this->db->query("UPDATE materi SET video='$video', deskripsi='$deskripsi', kelas='$kelas' WHERE id_materi='$id'");
        
    }
    // public function update_materi($id, $deskripsi, $kelas)
    // {
    //     return $this->db->query("UPDATE materi SET deskripsi='$deskripsi', kelas='$kelas' WHERE id_materi='$id'");
        
    // }

    public function m_materi_ubah($id, $nama_materi)
    {
        return $this->db->query("UPDATE materi SET nama_materi='$nama_materi' WHERE id_materi='$id'");
    }

    public function m_materi_hapus($id)
    {
        return $this->db->query("DELETE FROM materi WHERE id_materi='$id'");
    }

    public function matematika_x()
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

    public function belajar($id = null)
    {
        $query = $this->db->get_where('materi', array('id_materi' => $id))->row();
        return $query;
    }
}
