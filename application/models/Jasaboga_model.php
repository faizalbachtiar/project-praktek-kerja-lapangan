<?php
class Jasaboga_model extends CI_Model
{
    public function create_certification($formJS)
    {
        $slug = url_title($this->input->post('namaJasaboga'));

        // begin transaction
        $this->db->trans_begin();
        //pengguna
        if ($this->session->userdata('level') == "pengguna") {
            // data pemohon
            $data_pemohon = array(
                'kategori'      => 'jasaboga',
                'nama'          => $this->input->post('nama'),
                'nik_pemohon'   => $this->input->post('noktp'),
                'created_by'    => $this->session->userdata('nik_pengguna'),
                'slug'          => $slug
            );
            $this->db->insert('permohonan', $data_pemohon);
            $last_inserted_id = $this->db->insert_id();

            // data jasaboga
            $data_usaha = array(
                'id_permohonan'     => $last_inserted_id,
                'nik_pemohon'       => $this->input->post('noktp'),
                'nama_usaha'        => $this->input->post('namaJasaboga'),
                'alamat_usaha'      => $this->input->post('alamatJasaboga'),
                'kecamatan_usaha'   => $this->input->post('kecamatan'),
                'notelp_usaha'      => $this->input->post('notelpJasaboga'),
                'tahun_produksi'    => $this->input->post('tahunProduksiJs')
            );
            $this->db->insert('usaha', $data_usaha);

            $data_berkas = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon'   =>  $this->input->post('noktp'),
                'formJS'        => $formJS
            );
            $this->db->insert('berkas_permohonan', $data_berkas);

            if ($this->db->trans_status() === FALSE) {
                // rollback transaction when something gone wrong
                $this->db->trans_rollback();
            } else {
                // commit when everything is okay
                $this->db->trans_commit();
            }
            //kesmas
        } else if ($this->session->userdata('level') == "kesmas") {
            // data pemohon
            $data_pemohon = array(
                'kategori'      => 'jasaboga',
                'nama'          => $this->input->post('nama'),
                'nik_pemohon'   => $this->input->post('noktp'),
                'created_by'    => $this->session->userdata('username'),
                'slug'          => $slug
            );
            $this->db->insert('permohonan', $data_pemohon);
            $last_inserted_id = $this->db->insert_id();

            // data jasaboga
            $data_usaha = array(
                'id_permohonan'     => $last_inserted_id,
                'nik_pemohon'       => $this->input->post('noktp'),
                'nama_usaha'        => $this->input->post('namaJasaboga'),
                'alamat_usaha'      => $this->input->post('alamatJasaboga'),
                'kecamatan_usaha'   => $this->input->post('kecamatan'),
                'notelp_usaha'      => $this->input->post('notelpJasaboga'),
                'tahun_produksi'    => $this->input->post('tahunProduksiJs')
            );
            $this->db->insert('usaha', $data_usaha);

            $data_berkas = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon'   => $this->input->post('noktp'),
                'formJS'        => $formJS
            );
            $this->db->insert('berkas_permohonan', $data_berkas);

            if ($this->db->trans_status() === FALSE) {
                // rollback transaction when something gone wrong
                $this->db->trans_rollback();
            } else {
                // commit when everything is okay
                $this->db->trans_commit();
            }
        }
    }
    public function create_certificate($id_permohonan)
    {
        $this->db->trans_begin();

        $data = array(
            'id_permohonan' => $id_permohonan,
            'nosertif'      => $this->input->post('nosertif'),
            'tahunterbit'   => $this->input->post('tahunterbit'),
            'no_golongan'   => $this->input->post('golongan'),
            'batastgl'      => $this->input->post('batastgl'),
            'tglterbit'     => $this->input->post('tglterbit'),
            'created_by'    => $this->session->userdata('username')
        );
        $this->db->insert('sertifikat', $data);

        $data_permohonan = array(
            'status'    => 'selesai'
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
}