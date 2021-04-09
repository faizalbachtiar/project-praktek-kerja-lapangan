<?php
class User_model extends CI_Model
{
    // registration
    public function register($enc_password)
    {
        $slug = url_title($this->input->post('nama'));
        // user data
        $data = array(
            'nik_pengguna' => $this->input->post('noktp'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password
        );

        // insert into database
        return $this->db->insert('pengguna', $data);
    }

    // login
    public function login($username, $password)
    {
        $this->db->select('Username, Password, nik_pengguna');
        $this->db->from('pengguna');
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
        $this->db->limit(1);

        $result = $this->db->get();

        // $result = $this->db->get('pengguna');

        if ($result->num_rows() == 1) {
            return $result->result();
        } else {
            return false;
        }
    }
    //check nik_pengguna if already exists
    public function check_nik_exist($nik_pengguna)
    {
        $query = $this->db->get_where('pengguna', array(
            'nik_pengguna' => $nik_pengguna
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    } 
    //check nip if already exists
    public function check_nip_exist($nip)
    {
        $query = $this->db->get_where('admin', array(
            'nip' => $nip
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }
     //check email admin if already exists
     public function check_email_admin_exist($email)
     {
         $query = $this->db->get_where('admin', array(
             'username' => $email
         ));
 
         if (empty($query->row_array())) {
             return true;
         } else {
             return false;
         }
     }
    // check username if already exists
    public function check_username_exist($username)
    {
        $query = $this->db->get_where('pengguna', array(
            'username' => $username
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    // check email if already exists
    public function check_email_exist($email)
    {
        $query = $this->db->get_where('pengguna', array(
            'email' => $email
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_data($noktp)
    {
        $query = $this->db->query("SELECT * FROM pengguna where nik_pengguna !='$noktp'");
        return $query->result();
    }
    //simpan tanpa merubah password
    public function simpan()
    {
        $noktp = $this->input->post('noktp');
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
        );
        $this->db->where('nik_pengguna', $noktp);
        $this->db->update('pengguna', $data);
    }
    //simpan dengan merubah password
    public function simpan1($password_enkripsi)
    {
        $noktp = $this->input->post('noktp');
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password'  => $password_enkripsi
        );
        $this->db->where('nik_pengguna', $noktp);
        $this->db->update('pengguna', $data);
    }

    public function currentPemohon($username)
    {
        $query = $this->db->get_where('pengguna', array(
            'username' => $username
        ));

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function latestpengguna()
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('pengguna');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function calculate()
    {
        $this->db->where('status', 'diproses');
        $result = $this->db->get("permohonan");
        if ($result) {
            return $result->num_rows();
        } else {
            return false;
        }
    }

    public function fetchdata($query)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        if ($query != '') {
            $this->db->like('nik_pengguna', $query);
            $this->db->or_like('nama', $query);
            $this->db->or_like('email', $query);
            $this->db->or_like('username', $query);
            $this->db->or_like('created_at', $query);
        }
        $this->db->order_by('nik_pengguna', 'ASC');
        return $this->db->get();
    }

    public function ambil_nik_pemohon($username)
    {
        $this->db->select('nik_pengguna');
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query->result() !== NULL) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function view($nik_pengguna)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('nik_pengguna', $nik_pengguna);
        $query = $this->db->get();

        if ($query->result() !== NULL) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchuseremail($nik, $email)
    {
        $data = array(
            'nik_pengguna'  => $nik,
            'email'         => $email,
        );

        $this->db->limit(1);
        $this->db->where($data);
        $query = $this->db->get('pengguna');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function changepassword($nik, $password)
    {
        $data = array(
            'password'  => $password
        );

        $this->db->where('nik_pengguna', $nik);
        $this->db->update('pengguna', $data);
    }
}
