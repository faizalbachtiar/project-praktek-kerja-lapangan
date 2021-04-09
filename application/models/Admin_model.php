<?php
class Admin_model extends CI_Model
{
    // Operator
    public function login($username, $enc_password)
    {
        $this->db->select('username, password, level, is_verified');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $this->db->where('password', $enc_password);
        $this->db->limit(1);

        $result = $this->db->get();

        // $result = $this->db->get('pengguna');

        if ($result->num_rows() == 1) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function simpan_data_kecamatan()
    {
        $this->db->trans_begin();

        // data kecamatan
        $data_kecamatan = array(
            'id_kecamatan'      => $this->input->post('id_kecamatan'),
            'nama_kecamatan'    => $this->input->post('nama_kecamatan')
        );

        $this->db->insert('kecamatan', $data_kecamatan);

        if ($this->db->trans_status() === FALSE) {
            // rollback transaction when something gone wrong
            $this->db->trans_rollback();
        } else {
            // commit when everything is okay, asooy
            $this->db->trans_commit();
        }
    }

    public function simpan_data_puskesmas()
    {
        $this->db->trans_begin();
        //data baru puskesmas 
        $data_puskesmas = array(
            'id_puskesmas'     => $this->input->post('id_puskesmas'),
            'id_kecamatan'     => $this->input->post('id_kecamatan'),
            'nama_puskesmas'   => $this->input->post('nama'),
        );
        $this->db->insert('puskesmas', $data_puskesmas);

        if ($this->db->trans_status() === FALSE) {
            // rollback transaction when something gone wrong
            $this->db->trans_rollback();
        } else {
            // commit when everything is okay, asooy
            $this->db->trans_commit();
        }
    }

    // check id kecamatan if already exist
    public function check_id_kecamatan_exist($id_kecamatan)
    {
        $query = $this->db->get_where('kecamatan', array(
            'id_kecamatan' => $id_kecamatan
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    //check id_puskesmas if already exists
    public function check_id_puskesmas_exist($id_puskesmas)
    {
        $query = $this->db->get_where('puskesmas', array(
            'id_puskesmas' => $id_puskesmas
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }
    public function directhome($slug)
    {
        $this->db->select('username, password, level');
        $this->db->from('admin');
        $this->db->where('slug', $slug);
        $this->db->limit(1);

        $result = $this->db->get();

        // $result = $this->db->get('pengguna');

        if ($result->num_rows() == 1) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function changepassword($email, $password)
    {
        $data = array(
            'password' => $password
        );

        $this->db->where('username', $email);
        $this->db->update('admin', $data);
    }

    public function create($data)
    {
        $this->db->insert('admin', $data);

        return $this->db->insert_id();
    }

    public function isVerified($key)
    {
        $data = array(
            'is_verified' => 'terverifikasi'
        );

        $this->db->where('slug', $key);
        $this->db->update('admin', $data);

        return true;
    }

    public function calculate()
    {
        $this->db->where('level', 'kesmas');
        $this->db->or_where('level', 'visitasi');
        $result = $this->db->get("admin");
        if ($result) {
            return $result->num_rows();
        } else {
            return false;
        }
    }

    public function latestadmin()
    {
        $this->db->limit(5);
        $this->db->where('level', 'kesmas');
        $this->db->or_where('level', 'visitasi');
        $query = $this->db->get('admin');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getnip($username)
    {
        $this->db->select('nip');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query->result() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchdata($query)
    {
        $level = array('kesmas', 'visitasi');
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where_in('level', $level);
        if ($query != '') {
            $this->db->like('nip', $query);
            $this->db->where_in('level', $level);
            $this->db->or_like('level', $query);
            $this->db->where_in('level', $level);
            $this->db->or_like('nama', $query);
            $this->db->where_in('level', $level);
            $this->db->or_like('username', $query);
            $this->db->where_in('level', $level);
            $this->db->or_like('created_at', $query);
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get();
    }

    public function view($nip)
    {
        $this->db->select('*');
        $this->db->from('admin');
        // $this->db->where('level', 'kesmas');
        $this->db->where('nip', $nip);
        $query = $this->db->get();

        if ($query->result() > 0) {
            foreach ($query->result() as $data) {
                if ($data->level == 'kesmas') {
                    $query = $this->db->get_where('admin', array(
                        'nip' => $nip,
                        'level' => 'kesmas'
                    ));

                    if ($query->num_rows() > 0) {
                        return $query->result();
                    } else {
                        return false;
                    }
                } else if ($data->level == 'visitasi') {
                    $this->db->select('*');
                    $this->db->from('admin');
                    $this->db->join('puskesmas', 'puskesmas.id_puskesmas = admin.puskesmas', 'inner');
                    // $this->db->join('jadwal j', 'j.nip = p.id_permohonan', 'inner');
                    $this->db->where('admin.level', 'visitasi');
                    $this->db->where('admin.nip', $nip);
                    $query = $this->db->get();

                    if ($query->num_rows() > 0) {
                        return $query->result();
                    } else {
                        return false;
                    }
                }
            }
        } else {
            return false;
        }
    }

    public function admin_check($nip, $email)
    {
        $this->db->limit(1);
        $query = $this->db->get_where('admin', array(
            'nip'       => $nip,
            'username'  => $email
        ));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function ambilnip($username)
    {
        $this->db->select('nip');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getcurrentpuskesmas($username, $level)
    {
        $this->db->limit(1);
        $query = $this->db->get_where('admin', array(
            'username' => $username,
            'level' => $level
        ));

        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}
