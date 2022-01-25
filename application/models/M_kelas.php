<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model{
    public function m_kelas_tampil()
    {
        return $this->db->query("SELECT * FROM kelas ORDER BY nama_kelas ASC")->result();
    }

    public function m_kelas_hitung()
    {
        return $this->db->query("SELECT * FROM kelas")->num_rows();
    }

    public function m_kelas_tambah()
    {
        $nama_kelas = $this->input->post('nama_kelas');

        $this->db->query("INSERT INTO kelas VALUES('', '$nama_kelas')");
        if ($this->db->affected_rows()>0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function get_datakelas_id($id)
    {
        return $this->db->query("SELECT * FROM kelas WHERE id_kelas='$id'")->row();
    }

    public function m_kelas_ubah($id, $nama_kelas)
    {
        return $this->db->query("UPDATE kelas SET nama_kelas='$nama_kelas' WHERE id_kelas='$id'");
    }

    public function m_kelas_hapus($id)
    {
        return $this->db->query("DELETE FROM kelas WHERE id_kelas='$id'");
    }
}
