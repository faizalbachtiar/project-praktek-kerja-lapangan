<?php defined('BASEPATH') or exit('No direct script access allowed');
class Jadwal_model extends CI_Model
{

    public function latestvisitjadwal()
    {
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->limit(5);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function latestavisitjadwal($puskesmas)
    {
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->where('jadwal.id_puskesmas', $puskesmas);
        $this->db->limit(5);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function calculate()
    {
        $query = $this->db->get('jadwal');

        if ($query) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function calculateavisit($puskesmas)
    {
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->where('usaha.kecamatan_usaha', $puskesmas);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function simpan($id_permohonan, $puskesmas, $anggota, $tgl, $username)
    {
        $last_inserted_id = $this->db->insert_id();
        $data = array(
            'id_jadwal'     => $last_inserted_id,
            'id_permohonan' => $id_permohonan,
            'id_puskesmas'  => $puskesmas,
            'tglvisitasi'   => $tgl,
            'tim_visit'     => $anggota,
            'created_by'    => $username,
            'slug'          => $id_permohonan
        );
        return $this->db->insert('jadwal', $data);
    }

    public function getjadwalaks()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('usaha', 'usaha.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->join('permohonan', 'permohonan.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = jadwal.id_puskesmas', 'INNER');
        $this->db->order_by('jadwal.tglvisitasi', 'DESC');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Kesmas & Super
    public function aks_jadwalsearch($query)
    {
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
        $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = jadwal.id_puskesmas');
        // $this->db->where($constraint);
        if ($query != '') {
            $this->db->like('permohonan.nama', $query);
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->or_like('usaha.alamat_usaha', $query);
            $this->db->or_like('puskesmas.nama_puskesmas', $query);
            $this->db->or_like('jadwal.tim_visit', $query);
            $this->db->or_like('jadwal.tglvisitasi', $query);
        }
        $this->db->order_by('jadwal.tglvisitasi', 'DESC');
        return $this->db->get();
    }

    // Visitasi
    public function getavisitasijadwal()
    {
        $username = $this->session->userdata('username');
        $getpsksms = $this->Admin_model->getcurrentpuskesmas($username, 'visitasi');

        foreach ($getpsksms as $data) {
            $this->db->select('*');
            $this->db->from("permohonan");
            $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
            $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan');
            $this->db->where('jadwal.id_puskesmas', $data['puskesmas']);
            $this->db->order_by('jadwal.tglvisitasi', 'DESC');
            return $this->db->get();
        }
    }

    // get jadwal for pengguna
    public function getjadwalpengguna($nik_pengguna)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('permohonan', 'permohonan.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->join('usaha', 'usaha.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = jadwal.id_puskesmas', 'INNER');
        $this->db->where('permohonan.created_by', $nik_pengguna);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    // live search for pengguna
    public function sp_jadwal($query)
    {
        $this->db->select('*');
        $this->db->from("jadwal");
        $this->db->where('pembuat', $this->session->userdata('nik_pengguna'));
        if ($query != '') {
            $this->db->like('permohonan.nik_pemohon', $query);
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->or_like('permohonan.kategori', $query);
            $this->db->or_like('permohonan.status', $query);
            $this->db->or_like('permohonan.created_at', $query);
        }
        $this->db->order_by('jadwal.tglvisitasi', 'DESC');
        return $this->db->get();
    }

    public function su_jadwal($query)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('usaha', 'usaha.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->join('permohonan', 'permohonan.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = jadwal.id_puskesmas', 'INNER');
        if ($query != '') {
            $this->db->like('usaha.nama_usaha', $query);
            $this->db->or_like('jadwal.tglvisitasi', $query);
        }
        $this->db->order_by('jadwal.tglvisitasi', 'DESC');
        return $this->db->get();
    }

    public function avisit_searchjadwal($query)
    {
        $username = $this->session->userdata('username');
        $getpsksms = $this->Admin_model->getcurrentpuskesmas($username, 'visitasi');

        foreach ($getpsksms as $data) {
            $this->db->select('*');
            $this->db->from('permohonan');
            $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
            $this->db->join('jadwal', 'jadwal.id_permohonan = permohonan.id_permohonan');
            $this->db->where('jadwal.id_puskesmas', $data['puskesmas']);

            // $this->db->where($constraint);
            if ($query != '') {
                $this->db->like('permohonan.nama', $query);
                $this->db->where('jadwal.id_puskesmas', $data['puskesmas']);
                $this->db->or_like('usaha.nama_usaha', $query);
                $this->db->where('jadwal.id_puskesmas', $data['puskesmas']);
                $this->db->or_like('usaha.alamat_usaha', $query);
                $this->db->where('jadwal.id_puskesmas', $data['puskesmas']);
                $this->db->or_like('jadwal.tim_visit', $query);
                $this->db->where('jadwal.id_puskesmas', $data['puskesmas']);
                $this->db->or_like('jadwal.tglvisitasi', $query);
                $this->db->where('jadwal.id_puskesmas', $data['puskesmas']);
            }
            $this->db->order_by('jadwal.tglvisitasi', 'DESC');
            return $this->db->get();
        }
    }

    public function ambil_nama_anggota_visitasi($query)
    {
        $this->db->select('nip, nama');
        $this->db->from('admin');
        // $this->db->join('puskesmas','admin.puskesmas = puskesmas.id_puskesmas','INNER');
        // $this->db->where('puskesmas.nama_puskesmas',$query);
        $this->db->where('puskesmas', $query);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
