<?php
defined('BASEPATH') OR exit('No daairect script access allowed');

class M_guru extends CI_Model{
    public function m_guru_login()
    {
        $email    = $this->input->post('email');
        $password    = md5($this->input->post('password'));
        return $this->db->query("SELECT * FROM guru WHERE email='$email' AND password='$password'");
    }

    public function m_guru_tampil()
    {
        return $this->db->query("SELECT * FROM guru")->result();
    }

    public function m_guru_hitung()
    {
        return $this->db->query("SELECT * FROM guru")->num_rows();
    }

    public function m_guru_tambah()
    {
        $nip         = $this->input->post('nip');
        $nama_guru   = $this->input->post('nama_guru');
        $email       = $this->input->post('email');
        $password    = md5($this->input->post('password'));
        $nama_mapel  = $this->input->post('nama_mapel');

        $this->db->query("INSERT INTO guru VALUES('', '$nip', '$nama_guru', '$email', '$password', '$nama_mapel')");
        if ($this->db->affected_rows()>0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function get_dataguru_id($id)
    {
        return $this->db->query("SELECT * FROM guru WHERE id_guru='$id'")->row();
    }

    public function m_guru_ubah($id, $nip, $nama_guru, $email, $password, $nama_mapel)
    {
        return $this->db->query("UPDATE guru SET nip='$nip', nama_guru='$nama_guru', email='$email', password='$password', nama_mapel='$nama_mapel' WHERE id_guru='$id'");
    }

    public function m_guru_hapus($id)
    {
        return $this->db->query("DELETE FROM guru WHERE id_guru='$id'");
    }

    // public function m_guru_tampil_limit()
    // {
    //     return $this->db->query("SELECT * FROM guru INNER JOIN tarif ON guru.id_tarif=tarif.id_tarif ORDER BY nama_guru ASC LIMIT 4")->result();
    // }
    public function keamanan(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->session->sess_destroy();
            redirect('guru');
        }
    }
}
