<?php
class Tpm_model extends CI_Model
{
    public function create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi)
    {
        $slug = url_title($this->input->post('namaTPM'));

        // begin transaction
        $this->db->trans_begin();
        if ($this->session->userdata('level') == "pengguna") {
            // data pemohon
            $data_pemohon = array(
                'kategori' => 'tpm',
                'nama' => $this->input->post('nama'),
                'nik_pemohon' => $this->input->post('noktp'),
                'alamat_rumah' => $this->input->post('alamat'),
                'created_by' => $this->session->userdata('nik_pengguna'),
                'slug' => $slug
            );
            $this->db->insert('permohonan', $data_pemohon);
            $last_inserted_id = $this->db->insert_id();

            // data TPM
            $data_usaha = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' => $this->input->post('noktp'),
                'nama_usaha' => $this->input->post('namaTPM'),
                'alamat_usaha' => $this->input->post('jalanTPM'),
                'kelurahan_usaha' => $this->input->post('kelurahanTPM'),
                'kecamatan_usaha' => $this->input->post('kecamatanTPM'),
                'notelp_usaha' => $this->input->post('notelpTPM')
            );
            $this->db->insert('usaha', $data_usaha);

            // data berkas kelengkapan TPM

            $data_berkas_tpm = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' =>  $this->input->post('noktp'),
                'ktp_pemohon' => $nama_ktp_baru,
                'npwp' => $nama_npwp_baru,
                'denah' => $nama_denah_baru,
                'skdu' => $nama_domisili_baru,
                'kuasa' => $nama_surat_kuasa,
                'sertifikat_pelatihan' => $nama_sertifikat,
                'rekomendasi' => $nama_rekomendasi,
                'foto_pemohon' =>  $nama_foto_baru,
                'surat_tpm' => $nama_surat_tpm
            );
            $this->db->insert('berkas_permohonan', $data_berkas_tpm);

            if ($this->db->trans_status() === FALSE) {
                // rollback transaction when something gone wrong. Ebuseet
                $this->db->trans_rollback();
            } else {
                // commit when everything is okay, manteb bener dah
                $this->db->trans_commit();
            }
        } else if ($this->session->userdata('level') == "kesmas") {

            // data pemohon
            $data_pemohon = array(
                'kategori' => 'tpm',
                'nama' => $this->input->post('nama'),
                'nik_pemohon' => $this->input->post('noktp'),
                'alamat_rumah' => $this->input->post('alamat'),
                'created_by' => $this->session->userdata('username'),
                'slug' => $slug
            );
            $this->db->insert('permohonan', $data_pemohon);
            $last_inserted_id = $this->db->insert_id();

            // data TPM
            $data_usaha = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' => $this->input->post('noktp'),
                'nama_usaha' => $this->input->post('namaTPM'),
                'alamat_usaha' => $this->input->post('jalanTPM'),
                'kelurahan_usaha' => $this->input->post('kelurahanTPM'),
                'kecamatan_usaha' => $this->input->post('kecamatanTPM'),
                'notelp_usaha' => $this->input->post('notelpTPM')
            );
            $this->db->insert('usaha', $data_usaha);

            // data berkas kelengkapan TPM

            $data_berkas_tpm = array(
                'id_permohonan' => $last_inserted_id,
                'nik_pemohon' =>  $this->input->post('noktp'),
                'ktp_pemohon' => $nama_ktp_baru,
                'npwp' => $nama_npwp_baru,
                'denah' => $nama_denah_baru,
                'skdu' => $nama_domisili_baru,
                'kuasa' => $nama_surat_kuasa,
                'sertifikat_pelatihan' => $nama_sertifikat,
                'rekomendasi' => $nama_rekomendasi,
                'foto_pemohon' =>  $nama_foto_baru,
                'surat_tpm' => $nama_surat_tpm
            );
            $this->db->insert('berkas_permohonan', $data_berkas_tpm);

            if ($this->db->trans_status() === FALSE) {
                // rollback transaction when something gone wrong. Ebuseet
                $this->db->trans_rollback();
            } else {
                // commit when everything is okay, manteb bener dah
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
            'status' => 'selesai'
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