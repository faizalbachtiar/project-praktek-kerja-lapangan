<?php
class Hotel_model extends CI_Model
{
    public function create_certification($nama_ktp_baru, $nama_domisili_baru, $nama_surat_kuasa_baru, $nama_ktp_penanggung_baru, $nama_ijin_usaha_baru, $nama_denah_baru)
    {
        $slug = url_title($this->input->post('namaHtl'));

        //  begin transaction
        $this->db->trans_begin();
        //pengguna
        if ($this->session->userdata('level') == "pengguna") {
            // data pemohon
            $data_pemohon = array(
                'kategori' => 'hotel',
                'nama' => $this->input->post('nama'),
                'kewarganegaraan' => $this->input->post('kwn'),
                'nik_pemohon' => $this->input->post('noktp'),
                'alamat_rumah' => $this->input->post('alamat'),
                'notelp_pemohon' => $this->input->post('notelp'),
                'created_by' => $this->session->userdata('nik_pengguna'),
                'slug' => $slug
            );

            $this->db->insert('permohonan', $data_pemohon);
            $last_inserted_id = $this->db->insert_id();

            // data Hotel
            $data_usaha = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' => $this->input->post('noktp'),
                'nama_kantor' => $this->input->post('namaPrshn'),
                'alamat_kantor' => $this->input->post('alamatKntr'),
                'nama_usaha' => $this->input->post('namaHtl'),
                'alamat_usaha' => $this->input->post('alamatHtl'),
                'kecamatan_usaha' => $this->input->post('kecamatan'),
                'notelp_usaha' => $this->input->post('notelpHtl'),
                'noHP_usaha' => $this->input->post('nohpHtl')
            );
            $this->db->insert('usaha', $data_usaha);

            // data berkas kelengkapan
            $data_berkas_kelengkapan = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' => $this->input->post('noktp'),
                'ktp_pemohon' => $nama_ktp_baru,
                'foto_pemohon' => $nama_ktp_penanggung_baru,
                'skdu' => $nama_domisili_baru,
                'kuasa' => $nama_surat_kuasa_baru,
                'ijin_pariwisata' => $nama_ijin_usaha_baru,
                'denah' => $nama_denah_baru
            );
            $this->db->insert('berkas_permohonan', $data_berkas_kelengkapan);

            if ($this->db->trans_status() === FALSE) {
                // rollback transaction when something gone wrong
                $this->db->trans_rollback();
            } else {
                // commit when everything is okay, ashiaaaap
                $this->db->trans_commit();
            }
            //kesmas
        } else if ($this->session->userdata('level') == "kesmas") {
            // data pemohon
            $data_pemohon = array(
                'kategori' => 'hotel',
                'nama' => $this->input->post('nama'),
                'kewarganegaraan' => $this->input->post('kwn'),
                'nik_pemohon' => $this->input->post('noktp'),
                'alamat_rumah' => $this->input->post('alamat'),
                'notelp_pemohon' => $this->input->post('notelp'),
                'created_by' => $this->session->userdata('username'),
                'slug' => $slug
            );

            $this->db->insert('permohonan', $data_pemohon);
            $last_inserted_id = $this->db->insert_id();

            // data Hotel
            $data_usaha = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' => $this->input->post('noktp'),
                'nama_kantor' => $this->input->post('namaPrshn'),
                'alamat_kantor' => $this->input->post('alamatKntr'),
                'nama_usaha' => $this->input->post('namaHtl'),
                'alamat_usaha' => $this->input->post('alamatHtl'),
                'kecamatan_usaha' => $this->input->post('kecamatan'),
                'notelp_usaha' => $this->input->post('notelpHtl'),
                'noHP_usaha' => $this->input->post('nohpHtl')
            );
            $this->db->insert('usaha', $data_usaha);

            // data berkas kelengkapan
            $data_berkas_kelengkapan = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' => $this->input->post('noktp'),
                'ktp_pemohon' => $nama_ktp_baru,
                'foto_pemohon' => $nama_ktp_penanggung_baru,
                'skdu' => $nama_domisili_baru,
                'kuasa' => $nama_surat_kuasa_baru,
                'ijin_pariwisata' => $nama_ijin_usaha_baru,
                'denah' => $nama_denah_baru
             );
            $this->db->insert('berkas_permohonan', $data_berkas_kelengkapan);

            if ($this->db->trans_status() === FALSE) {
                // rollback transaction when something gone wrong
                $this->db->trans_rollback();
            } else {
                // commit when everything is okay, ashiaaaap
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