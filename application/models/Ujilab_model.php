<?php
class Ujilab_model extends CI_Model
{
    public function search($query)
    {
        $this->db->select('*');
        $this->db->from('rekap');
        $this->db->join('usaha', 'rekap.id_permohonan = usaha.id_permohonan', 'INNER');
        $this->db->join('permohonan', 'rekap.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('jadwal', 'rekap.id_permohonan = jadwal.id_permohonan', 'INNER');
        if ($query != '') {
            $this->db->like('usaha.nama_usaha', $query);
            $this->db->or_like('permohonan.nama', $query);
            $this->db->or_like('jadwal.tglvisitasi', $query);
            $this->db->or_like('jadwal.timvisitasi', $query);
            $this->db->or_like('permohonan.status', $query);
        }
        $this->db->order_by('rekap.created_at', 'DESC');
        return $this->db->get();
    }

    public function pengguna_search($query,$nik){
        $this->db->select('*');
        $this->db->from('rekap');
        $this->db->join('usaha', 'rekap.id_permohonan = usaha.id_permohonan', 'INNER');
        $this->db->join('permohonan', 'rekap.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('jadwal', 'rekap.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->where('permohonan.created_by',$nik);
        if ($query != '') {
            $this->db->like('permohonan.nama', $query);
            $this->db->where('permohonan.created_by',$nik);
        
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->where('permohonan.created_by',$nik);
        
            $this->db->or_like('jadwal.tglvisitasi', $query);
            $this->db->where('permohonan.created_by',$nik);
        
            $this->db->or_like('jadwal.tim_visit', $query);
            $this->db->where('permohonan.created_by',$nik);
        
            $this->db->or_like('permohonan.status', $query);
            $this->db->where('permohonan.created_by',$nik);
        
        }
        $this->db->order_by('rekap.created_at', 'DESC');
        return $this->db->get();
    }
    public function aks_search($query)
    {
        $this->db->select('*');
        $this->db->from('rekap');
        $this->db->join('usaha', 'rekap.id_permohonan = usaha.id_permohonan', 'INNER');
        $this->db->join('permohonan', 'rekap.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('jadwal', 'rekap.id_permohonan = jadwal.id_permohonan', 'INNER');
        if ($query != '') {
            $this->db->like('permohonan.nama', $query);
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->or_like('jadwal.tglvisitasi', $query);
            $this->db->or_like('jadwal.tim_visit', $query);
            $this->db->or_like('permohonan.status', $query);
        }
        $this->db->order_by('rekap.created_at', 'DESC');
        return $this->db->get();
    }

    public function avisitsearch($query,$nip)
    {
     
        $this->db->select('*');
        $this->db->from('rekap');
        $this->db->join('usaha', 'rekap.id_permohonan = usaha.id_permohonan', 'INNER');
        $this->db->join('permohonan', 'rekap.id_permohonan = permohonan.id_permohonan', 'INNER');
        $this->db->join('jadwal', 'rekap.id_permohonan = jadwal.id_permohonan', 'INNER');
        $this->db->where('rekap.nip_admin',$nip);
        if ($query != '') {
            $this->db->like('permohonan.nama', $query);
            $this->db->where('rekap.nip_admin',$nip);
       
            $this->db->or_like('usaha.nama_usaha', $query);
            $this->db->where('rekap.nip_admin',$nip);
       
            $this->db->or_like('jadwal.tglvisitasi', $query);
            $this->db->where('rekap.nip_admin',$nip);
       
            $this->db->or_like('jadwal.tim_visit', $query);
            $this->db->where('rekap.nip_admin',$nip);
       
            $this->db->or_like('permohonan.status', $query);
            $this->db->where('rekap.nip_admin',$nip);
        }
        $this->db->order_by('rekap.created_at', 'DESC');
        return $this->db->get();
    }

    public function latestujilab()
    {
        $this->db->select('*');
        $this->db->from('rekap');
        $this->db->join('permohonan', 'permohonan.id_permohonan = rekap.id_permohonan');
        $this->db->join('usaha', 'usaha.id_permohonan = rekap.id_permohonan');
        $this->db->join('jadwal', 'jadwal.id_permohonan = rekap.id_permohonan');
        $this->db->order_by('rekap.created_at', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function latestavisitujilab($puskesmas)
    {
        $this->db->select('*');
        $this->db->from('rekap');
        $this->db->join('permohonan', 'permohonan.id_permohonan = rekap.id_permohonan');
        $this->db->join('usaha', 'usaha.id_permohonan = rekap.id_permohonan');
        $this->db->join('jadwal', 'jadwal.id_permohonan = rekap.id_permohonan');
        $this->db->where('jadwal.id_puskesmas', $puskesmas);
        $this->db->order_by('rekap.created_at', 'DESC');
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
        $result = $this->db->get('rekap');
        if ($result) {
            return $result->num_rows();
        } else {
            return false;
        }
    }
}
