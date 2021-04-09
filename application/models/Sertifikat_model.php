<?php
class Sertifikat_model extends CI_Model
{
    public function search($query)
    {
        $this->db->select('*');
        $this->db->from('sertifikat');
        $this->db->join('usaha', 'sertifikat.id_permohonan = usaha.id_permohonan', 'INNER');
        if ($query != '') {
            $this->db->like('usaha.nama_usaha', $query);
            $this->db->or_like('sertifikat.tglterbit', $query);
            $this->db->or_like('sertifikat.batastgl', $query);
        }
        $this->db->order_by('sertifikat.created_at', 'DESC');
        return $this->db->get();
    }

    public function calculate()
    {
        $result = $this->db->get("sertifikat");
        if ($result) {
            return $result->num_rows();
        } else {
            return false;
        }
    }

    public function addview($id_permohonan)
    {
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->join('rekap', 'permohonan.id_permohonan = rekap.id_permohonan');
        $this->db->join('usaha', 'permohonan.id_permohonan = usaha.id_permohonan');
        $this->db->join('jadwal', 'permohonan.id_permohonan = jadwal.id_permohonan');
        $this->db->join('puskesmas', 'jadwal.id_puskesmas = puskesmas.id_puskesmas');
        $this->db->where('permohonan.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function view($id_permohonan)
    {
        $this->db->select('*');
        $this->db->from('sertifikat');
        $this->db->join('permohonan', 'permohonan.id_permohonan = sertifikat.id_permohonan');
        $this->db->join('usaha', 'usaha.id_permohonan = sertifikat.id_permohonan');
        $this->db->join('jadwal', 'jadwal.id_permohonan = sertifikat.id_permohonan');
        $this->db->where('sertifikat.id_permohonan', $id_permohonan);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getsertifikatpengguna($nik_pengguna)
    {
        // $this->db->select('*');
        // $this->db->from('sertifikat');
        // $this->db->join('permohonan', 'permohonan.id_permohonan = sertifikat.id_permohonan');
        // $this->db->join('usaha', 'usaha.id_permohonan = sertifikat.id_permohonan');
        // $this->db->order_by('sertifikat.tglterbit', 'DESC');
        // $this->db->where('permohonan.created_by', $nik_pengguna);
        $this->db->select('*');
        $this->db->join('usaha', 'usaha.id_permohonan = permohonan.id_permohonan');
        $query = $this->db->get_where('permohonan', array(
            'status'        => 'selesai',
            'created_by'    => $nik_pengguna
        ));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
