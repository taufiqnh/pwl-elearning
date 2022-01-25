<?php
defined('BASEPATH') OR exit('No daairect script access allowed');

class M_siswa extends CI_Model{
    public function m_siswa_login()
    {
        $email    = $this->input->post('email');
        $password    = md5($this->input->post('password'));
        return $this->db->query("SELECT * FROM siswa WHERE email='$email' AND password='$password'");
    }

    public function m_siswa_tampil()
    {
        return $this->db->query("SELECT * FROM siswa")->result();
    }

    public function m_siswa_hitung()
    {
        return $this->db->query("SELECT * FROM siswa")->num_rows();
    }

    public function m_siswa_tambah()
    {
        $nama_siswa = $this->input->post('nama_siswa');
        $password   = md5($this->input->post('password'));
        $email      = $this->input->post('email');

        $this->db->query("INSERT INTO siswa VALUES('', '$nama_siswa', '$password', '$email', 'default.jpg')");
        if ($this->db->affected_rows()>0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function get_datasiswa_id($id)
    {
        return $this->db->query("SELECT * FROM siswa WHERE id_siswa='$id'")->row();
    }

    public function update_siswa($id, $nama_siswa, $password, $email, $fotosiswa)
    {
        return $this->db->query("UPDATE siswa SET nama_siswa='$nama_siswa', password='$password', email='$email', foto='$fotosiswa' WHERE id_siswa='$id'");
        
    }
    public function update_data_siswa($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function m_siswa_ubah($id, $nama_siswa, $password, $email, $fotosiswa)
    {
        $data = array(
                'id' => $id,
                'gambar' => $image
            );  
        $result= $this->db->update('siswa',$data,);
        return $result;
    }


    public function m_siswa_hapus($id)
    {
        return $this->db->query("DELETE FROM siswa WHERE id_siswa='$id'");
    }

    // public function m_siswa_tampil_limit()
    // {
    //     return $this->db->query("SELECT * FROM siswa INNER JOIN tarif ON siswa.id_tarif=tarif.id_tarif ORDER BY nama_siswa ASC LIMIT 4")->result();
    // }
    public function keamanan(){
        $email = $this->session->userdata('email');
        if(empty($email)){
            $this->session->sess_destroy();
            redirect('siswa');
        }
    }
}
