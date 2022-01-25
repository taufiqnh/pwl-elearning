<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ktugas extends CI_Model{
    
    public function m_ktugas_tampil()
    {
        return $this->db->get_where('kumpultugas', ['nama_guru' =>
            $this->session->userdata('nama_guru')]);
    }
    public function m_ktugassaya_tampil()
    {
         return $this->db->get_where('kumpultugas', ['id_siswa' =>
            $this->session->userdata('id_siswa')]);
    }

    public function m_ktugas_hitung()
    {
        return $this->db->query("SELECT * FROM kumpultugas")->num_rows();
    }

    public function m_ktugas_tambah()
    {
        $nama_ktugas = $this->input->post('nama_ktugas');

        $this->db->query("INSERT INTO ktugas VALUES('', '$nama_ktugas')");
        if ($this->db->affected_rows()>0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function get_dataktugas_id($id)
    {
        return $this->db->query("SELECT * FROM kumpultugas WHERE id_ktugas='$id'")->row();
    }
    public function get_siswa($id)
    {
        //return $this->db->query("SELECT * FROM kumpultugas INNER JOIN siswa ON kumpultugas.id_siswa
    }

    public function m_ktugas_ubah($id, $nilai)
    {
        return $this->db->query("UPDATE kumpultugas SET nilai='$nilai' WHERE id_ktugas='$id'");
    }

    public function m_ktugas_hapus($id)
    {
        return $this->db->query("DELETE FROM ktugas WHERE id_ktugas='$id'");
    }
}
