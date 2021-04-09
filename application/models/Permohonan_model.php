<?php
class Permohonan_model extends CI_Model
{

    public function getpermohonan($level)
    {
        if ($level == 'pengguna') {
            $username = $this->session->userdata('username');

            $this->db->order_by('permohonan.created_at', 'DESC');
            $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
            $this->db->where('permohonan.created_by', $username);
            $query = $this->db->get('permohonan');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        } else {
            $username = $this->session->userdata('username');
            $adminlevel = $this->session->userdata('level');
            if ($adminlevel == 'visitasi') {
                $query = $this->Permohonan_model->verifiedpermohonan('');
            } else {
                $this->db->order_by('permohonan.created_at', 'DESC');
                $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
                $query = $this->db->get('permohonan');
            }

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }
    }

    // for OP Kesmas and Superadmin only
    public function latestpermohonan()
    {
        $this->db->order_by('permohonan.created_at', 'DESC');
        $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
        $this->db->where('status', 'diproses');
        $this->db->limit(5);
        $query = $this->db->get('permohonan');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function aks_newpermohonansearch($query)
    {
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->where('status', 'diproses');
        if ($query != '') {
            $this->db->like('permohonan.nama', $query);
            $this->db->where('status', 'diproses');
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->where('status', 'diproses');
            $this->db->or_like('permohonan.kategori', $query);
            $this->db->where('status', 'diproses');
            $this->db->or_like('permohonan.created_at', $query);
            $this->db->where('status', 'diproses');
        }
        $this->db->order_by('permohonan.created_at', 'DESC');
        return $this->db->get();
    }

    public function ambilkecamatan()
    {
        $this->db->select('*');
        $this->db->from('kecamatan');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    // detail information about choosen permohonan
    public function view($id_permohonan)
    {
        $this->db->select('*');
        $this->db->from('permohonan p');
        $this->db->join('berkas_permohonan bp', 'bp.id_permohonan=p.id_permohonan', 'inner');
        $this->db->join('usaha u', 'u.id_permohonan=p.id_permohonan', 'inner');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = u.kecamatan_usaha', 'inner');
        $this->db->where('p.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function keterangan($id_permohonan)
    {
        $this->db->select('keterangan');
        $this->db->from('permohonan p');
        $this->db->join('rekap r', 'r.id_permohonan=p.id_permohonan', 'inner');
        $this->db->where('p.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function rekap($id_permohonan)
    {
        $this->db->select('*');
        $this->db->from('permohonan p');
        $this->db->join('rekap r', 'r.id_permohonan=p.id_permohonan', 'inner');
        $this->db->where('p.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function jadwal($id_permohonan)
    {
        $this->db->select('tglvisitasi');
        $this->db->from('permohonan p');
        $this->db->join('jadwal r', 'r.id_permohonan=p.id_permohonan', 'inner');
        $this->db->where('p.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    // query for live search current pengguna
    public function fetch_data($query)
    {
        $this->db->select('permohonan.id_permohonan,permohonan.nik_pemohon,usaha.nama_usaha,permohonan.kategori,permohonan.status,permohonan.slug,permohonan.created_at');
        $this->db->from('permohonan');
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->where('permohonan.created_by', $this->session->userdata('nik_pengguna'));
        if ($query != '') {
            $this->db->like('permohonan.nik_pemohon', $query);
            $this->db->where('permohonan.created_by', $this->session->userdata('nik_pengguna'));
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->where('permohonan.created_by', $this->session->userdata('nik_pengguna'));
            $this->db->or_like('permohonan.kategori', $query);
            $this->db->where('permohonan.created_by', $this->session->userdata('nik_pengguna'));
            $this->db->or_like('permohonan.status', $query);
            $this->db->where('permohonan.created_by', $this->session->userdata('nik_pengguna'));
            $this->db->or_like('permohonan.created_at', $query);
            $this->db->where('permohonan.created_by', $this->session->userdata('nik_pengguna'));
        }
        $this->db->order_by('permohonan.created_at', 'DESC');
        return $this->db->get();
    }

    // query for live search for admin
    public function ap_permohonan($query)
    {
        $this->db->select('permohonan.id_permohonan,permohonan.nama,usaha.nama_usaha,permohonan.kategori,permohonan.status,permohonan.slug,permohonan.created_at');
        $this->db->from("permohonan");
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        if ($query != '') {
            $this->db->like('permohonan.nama', $query);
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->or_like('permohonan.kategori', $query);
            $this->db->or_like('permohonan.status', $query);
            $this->db->or_like('permohonan.created_at', $query);
        }
        $this->db->order_by('permohonan.created_at', 'DESC');
        return $this->db->get();
    }

    public function ps_permohonan($query)
    {
        $this->db->select('permohonan.id_permohonan,permohonan.nik_pemohon,usaha.nama_usaha,permohonan.kategori,permohonan.status,permohonan.slug,permohonan.created_at');
        $this->db->from("permohonan");
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->where('permohonan.status', 'lolos');
        if ($query != '') {
            $this->db->like('permohonan.nik_pemohon', $query);
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->or_like('permohonan.kategori', $query);
            $this->db->or_like('permohonan.status', $query);
            $this->db->or_like('permohonan.created_at', $query);
        }
        $this->db->order_by('permohonan.created_at', 'DESC');
        return $this->db->get();
    }

    public function verifiedpermohonan($query)
    {
        $username = $this->session->userdata('username');
        $getpsksms = $this->Admin_model->getcurrentpuskesmas($username, 'visitasi');

        foreach ($getpsksms as $data) {
            $constraint = array(
                'jadwal.id_puskesmas'   => $data['puskesmas'],
                'permohonan.status'   => 'terverifikasi'
            );
            $this->db->select('*');
            $this->db->from("permohonan");
            $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
            $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan');
            $this->db->where($constraint);
            if ($query != '') {
                $this->db->like('permohonan.nama', $query);
                $this->db->where($constraint);
                $this->db->or_like('usaha.nama_usaha', $query);
                $this->db->where($constraint);
                $this->db->or_like('permohonan.kategori', $query);
                $this->db->where($constraint);
                $this->db->or_like('permohonan.status', $query);
                $this->db->where($constraint);
                $this->db->or_like('permohonan.created_at', $query);
                $this->db->where($constraint);
            }
            $this->db->order_by('jadwal.tglvisitasi', 'DESC');
            return $this->db->get();
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
    public function jumlah_permohonan()
    {
       $result = $this->db->get("permohonan");
        if ($result) {
            return $result->num_rows();
        } else {
            return false;
        }
    }
   
    public function ambil_id_kecamatan(){
        $this->db->select('id_kecamatan');
        $this->db->from('kecamatan');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tolak($id_permohonan, $created_by, $nip)
    {
        $this->db->trans_begin();
        $data = array(
            'id_permohonan' => $id_permohonan,
            'nik_pemohon'   => $created_by,
            'keterangan'    => $this->input->post('f_penolakan'),
            'nip_admin'  => $nip,
            'tinjauan'      => '-',
            'ujilab'        => '-'
        );
        $this->db->insert('rekap', $data);

        $data_permohonan = array(
            'status'        => 'ditolak'
        );
        $this->db->where('id_permohonan', $id_permohonan);
        $this->db->update('permohonan', $data_permohonan);

        if ($this->db->trans_status() === FALSE) {
            // rollback transaction when something gone wrong
            $this->db->trans_rollback();
        } else {
            // commit when everything is okay, asooy
            $this->db->trans_commit();
        }
    }

    public function ambilnik($id_permohonan)
    {
        $this->db->select('nik_pemohon');
        $this->db->from('permohonan');
        $this->db->where('id_permohonan', $id_permohonan);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchpuskesmas($id_permohonan)
    {
        $this->db->select('*');
        $this->db->from('puskesmas');
        $this->db->join('usaha', 'usaha.kecamatan_usaha = puskesmas.id_kecamatan', 'inner');
        $this->db->where('usaha.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchvisitasi($id_puskesmas)
    {
        $this->db->where('level', 'visitasi');
        $this->db->where('puskesmas', $id_puskesmas);
        $this->db->order_by('nama', 'ASC');;
        $result = $this->db->get('admin');

        if ($result) {
            return $result->result();
        } else {
            return false;
        }
    }
    //kesmas  cetak laporan(report data permohonan )
    public function ambil_data_permohonan($dari,$akhir){
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('usaha','permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->where('permohonan.created_at >', $dari);
        $this->db->where('permohonan.created_at <', $akhir);
        // $this->db->where('permohonan.created_at','BETWEEN',$dari,'AND',$akhir);
        $this->db->order_by('permohonan.created_at', 'ASC');
        $query = $this->db->get();
        if ($query->result() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    // Admin
    public function p_cs_pengguna($nik_pengguna)
    {
        $this->db->select('*');
        $this->db->from("permohonan");
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->where('permohonan.created_by', $nik_pengguna);
        $this->db->order_by('permohonan.created_at', 'DESC');
        $query = $this->db->get();

        if ($query->result() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Visitasi
    public function permohonan_tervalidasi($puskesmas, $status)
    {
        $this->db->select('permohonan.nama,permohonan.kategori,permohonan.status,usaha.nama_usaha,jadwal.tglvisitasi,jadwal.tim_visit,rekap.tinjauan,rekap.ujilab,rekap.created_at');
        $this->db->from("permohonan");
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->join('rekap', 'rekap.id_permohonan = permohonan.id_permohonan');
        $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan');
        $this->db->where('jadwal.id_puskesmas', $puskesmas);
        $this->db->where('permohonan.status', $status);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    // Visitasi
    public function validate($id_permohonan, $nip, $data_nik_pemohon, $ujikelaikan, $ujilab, $keterangan)
    {
        $data_rekap = array(
            'id_permohonan' => $id_permohonan,
            'nip_admin' => $nip,
            'nik_pemohon' => $data_nik_pemohon,
            'tinjauan' => $ujikelaikan,
            'ujilab' => $ujilab,
            'keterangan' => $keterangan
        );
        $this->db->insert('rekap', $data_rekap);
    }

    public function updatestatus($id_permohonan)
    {
        $data = array(
            'status' => "terverifikasi"
        );
        $this->db->where('id_permohonan', $id_permohonan);
        $this->db->update('permohonan', $data);
    }
    public function ubahstatus_visitasi($id_permohonan)
    {
        $data = array(
            'status' => "validasi"
        );
        $this->db->where('id_permohonan', $id_permohonan);
        $this->db->update('permohonan', $data);
    }
    public function getpuskesmas()
    {
        $this->db->select('*');
        $this->db->from('puskesmas');
        $this->db->order_by('nama_puskesmas', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_certificate($id_permohonan)
    {
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = usaha.kecamatan_usaha', 'INNER');
        $this->db->where('permohonan.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query->result() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    // search permohonan yang tervalidasi di kesmas 
    public function ambil_permohonan_validasi($query)
    {
        $this->db->select('permohonan.id_permohonan,permohonan.nik_pemohon,usaha.nama_usaha,permohonan.kategori,permohonan.status,permohonan.slug,permohonan.created_at');
        $this->db->from('permohonan');
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->where('permohonan.status', 'validasi');
        if ($query != '') {
            $this->db->like('permohonan.nik_pemohon', $query);
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->or_like('permohonan.kategori', $query);
            $this->db->or_like('permohonan.status', $query);
            $this->db->or_like('permohonan.created_at', $query);
        }
        $this->db->order_by('permohonan.created_at', 'DESC');
        return $this->db->get();
    }
}
