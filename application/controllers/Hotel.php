<?php
class Hotel extends CI_Controller
{
    public function panduan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('public/panduan/hotel');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        
        // check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // rules for pemohon form validation
        // data pemohon
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kwn', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('noktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required');

        // data Hotel
        $this->form_validation->set_rules('namaPrshn', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('alamatKntr', 'Alamat Perusahaan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('namaHtl', 'Nama Hotel', 'required');
        $this->form_validation->set_rules('alamatHtl', 'Alamat Hotel', 'required');
        $this->form_validation->set_rules('notelpHtl', 'Nomor Telepon Hotel', 'required');
        $this->form_validation->set_rules('nohpHtl', 'Nomor Handphone Hotel', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['kecamatan'] = $this->Permohonan_model->ambilkecamatan();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/permohonan/create/c_hotel',$data);
            $this->load->view('templates/footer');
        } elseif ($this->input->post('kecamatan')=="kosong"){
            if ($this->session->userdata('level') == 'pengguna') {
                $this->session->set_flashdata(
                    'req_failed_hotel',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi.'
                );
                redirect('hotel/create');
            } else if ($this->session->userdata('level') == 'kesmas') {
                $this->session->set_flashdata(
                    'req_failed_hotel',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi.'
                );
                redirect('cpermohonan');
            }
                       
        }
        else {

            $username = $this->session->userdata('username');
            $kecamatan = $this->input->post('kecamatanHotel');
            $data_kecamatan = strtolower($kecamatan);
            $namafilebaru = uniqid();
 
            // load model
            $this->load->model('Hotel_model');

            //ambil nama gambar 
            $ktp = $_FILES['f_ktp']['name'];
            $domisili = $_FILES['f_ho']['name'];
            $ijin_usaha = $_FILES['f_pariwisata']['name'];
            $denah = $_FILES['f_denah']['name'];

            //ambil size gambar upload 
            $ktp_size = $_FILES['f_ktp']['size'];
            $domisili_size = $_FILES['f_ho']['size'];
            $ijin_usaha_size = $_FILES['f_pariwisata']['size'];
            $denah_size = $_FILES['f_denah']['size'];

            //variabel untuk menyimpan format ekstensi file 
            $ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];

            //mecah string 
            $ktp1 = explode('.', $ktp);
            $domisili1 = explode('.', $domisili);
            $ijin_usaha1 = explode('.', $ijin_usaha);
            $denah1 = explode('.', $denah);
            
            //pengambilan format file 
            $ktp1 = strtolower(end($ktp1));
            $domisili1 = strtolower(end($domisili1));
            $ijin_usaha1 = strtolower(end($ijin_usaha1));
            $denah1 = strtolower(end($denah1));

            //optional 
            $surat_kuasa_status = $_FILES['f_surat_kuasa']['error'];
            $ktp_penanggung_status = $_FILES['f_ktp_penanggung']['error'];
            //jika menginputkan semua 
            if ($surat_kuasa_status != 4 && $ktp_penanggung_status != 4) {
                $surat_kuasa = $_FILES['f_surat_kuasa']['name'];
                $ktp_penanggung = $_FILES['f_ktp_penanggung']['name'];
                $surat_kuasa1 = explode('.', $surat_kuasa);
                $ktp_penanggung1 = explode('.', $ktp_penanggung);
                $surat_kuasa1 = strtolower(end($surat_kuasa1));
                $ktp_penanggung1 = strtolower(end($ktp_penanggung1));
                $surat_kuasa_size = $_FILES['f_surat_kuasa']['size'];
                $ktp_penanggung_size = $_FILES['f_ktp_penanggung']['size'];

                //seleksi format file
                if (in_array($ktp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($ijin_usaha1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($surat_kuasa1, $ekstensi) && in_array($ktp_penanggung1, $ekstensi)) {

                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $domisili_size <= 2087188 && $ijin_usaha_size  <= 2087188 && $denah_size  <= 2087188 && $surat_kuasa_size  <= 2087188 && $ktp_penanggung_size <= 2087188) {
                        //buat nama id baru agar tidak ketimpa dengan file baru jika ada format nama sama 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_ktp_penanggung_baru = $namafilebaru."_".$ktp_penanggung;
                        $nama_surat_kuasa_baru = $namafilebaru."_".$surat_kuasa;
                        $nama_ijin_usaha_baru = $namafilebaru."_".$ijin_usaha;
                        $nama_denah_baru =$namafilebaru."_".$denah;

                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/ktp/' . $nama_ktp_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_ho']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/domisili/' . $nama_domisili_baru);
                        $move_ktp_penanggung = move_uploaded_file($_FILES['f_ktp_penanggung']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/ktp_penanggung_jawab/' . $nama_ktp_penanggung_baru);
                        $move_surat_kuasa = move_uploaded_file($_FILES['f_surat_kuasa']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/surat_kuasa/' . $nama_surat_kuasa_baru);
                        $move_ijin_usaha = move_uploaded_file($_FILES['f_pariwisata']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/ijin_usaha/' . $nama_ijin_usaha_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/denah_bangunan/' . $nama_denah_baru);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Hotel_model->create_certification($nama_ktp_baru, $nama_domisili_baru, $nama_surat_kuasa_baru, $nama_ktp_penanggung_baru, $nama_ijin_usaha_baru, $nama_denah_baru);

                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan  
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_hotel',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('hotel/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_hotel',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_hotel',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('hotel/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_hotel',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
                //jika tidak menginputkan surat kuasa dan ktp penanggung jawab
            } else if ($surat_kuasa_status == 4 && $ktp_penanggung_status == 4) {
                //seleksi format file
                if (in_array($ktp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($ijin_usaha1, $ekstensi) && in_array($denah1, $ekstensi)) {

                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $domisili_size <= 2087188 && $ijin_usaha_size  <= 2087188 && $denah_size  <= 2087188) {
                        //buat nama id baru agar tidak ketimpa dengan file baru jika ada format nama sama 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_ijin_usaha_baru = $namafilebaru."_".$ijin_usaha;
                        $nama_denah_baru =$namafilebaru."_".$denah;

                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/ktp/' . $nama_ktp_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_ho']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/domisili/' . $nama_domisili_baru);
                        $move_ijin_usaha = move_uploaded_file($_FILES['f_pariwisata']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/ijin_usaha/' . $nama_ijin_usaha_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/hotel/denah_bangunan/' . $nama_denah_baru);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Hotel_model->create_certification($nama_ktp_baru, $nama_domisili_baru, $nama_surat_kuasa_baru, $nama_ktp_penanggung_baru, $nama_ijin_usaha_baru, $nama_denah_baru);

                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_hotel',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('hotel/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_hotel',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_hotel',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('hotel/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_hotel',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
            } else if ($surat_kuasa_status == 4 && $ktp_penanggung_status != 4 || $surat_kuasa_status != 4 && $ktp_penanggung_status == 4) {
                if ($this->session->userdata('level') == 'pengguna') {
                    $this->session->set_flashdata(
                        'req_failed_hotel',
                        'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan Berkas yang digunakan untuk persyaratan jika dikelola orang lain  udah di unggah semua.'
                    );
                    redirect('hotel/create');
                } else if ($this->session->userdata('level') == 'kesmas') {
                    $this->session->set_flashdata(
                        'req_failed_hotel',
                        'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan Berkas yang digunakan untuk persyaratan jika dikelola orang lain  udah di unggah semua.'
                    );
                    redirect('cpermohonan');
                }
            }
        }
    }

    public function validate($id_permohonan)
    {
        $data_nik = $this->Permohonan_model->ambilnik($id_permohonan);
        foreach($data_nik as $nik);
        $data_nik_pemohon = $nik['nik_pemohon'];
        
        $username = $_SESSION['username'];

        $hasil_uji_keliakan = $_FILES['h_uk']['name'];
        $hasil_uji_lab = $_FILES['h_ul']['name'];

        // file format identifying
        $ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];
        $uji_kelaikan = explode('.', $hasil_uji_keliakan);
        $uji_lab = explode('.', $hasil_uji_lab);

        // file size
        $ukuran_uji_kelaikan = $_FILES['h_uk']['size'];
        $ukuran_uji_lab = $_FILES['h_ul']['size'];

        $uji_kelaikan = strtolower(end($uji_kelaikan));
        $uji_lab = strtolower(end($uji_lab));

        // file format checking
        if (in_array($uji_kelaikan, $ekstensi) && in_array($uji_lab, $ekstensi)) {
            // file size checking
            if ($ukuran_uji_kelaikan <= 2087188 && $ukuran_uji_lab <= 2087188) {
                $namafilebaru = uniqid();
                $nama_lab = $namafilebaru."_".$hasil_uji_lab;
                $nama_uji_kelaikan = $namafilebaru."_".$hasil_uji_keliakan;
                // get admin nip
                $ambil_nip = $this->Admin_model->getnip($username);
                foreach ($ambil_nip as $data) {
                    $nip_admin = $data->nip;

                    // moving file into target directory
                    $move_uji_kelaikan = move_uploaded_file(
                        $_FILES['h_uk']['tmp_name'],
                        FCPATH . 'assets/file/berkas_visitasi/hotel/uji_kelaikan/' . $nama_uji_kelaikan
                    );
                    $move_uji_lab = move_uploaded_file(
                        $_FILES['h_ul']['tmp_name'],
                        FCPATH . 'assets/file/berkas_visitasi/hotel/uji_lab/' . $nama_lab
                    );

                    //insert tabel rekap
                    $keterangan = "Selesai";
                    $this->Permohonan_model->validate($id_permohonan, $nip_admin, $data_nik_pemohon, $nama_uji_kelaikan, $nama_lab, $keterangan);

                    //update status di tabel permohonan
                    $this->Permohonan_model->ubahstatus_visitasi($id_permohonan);
                    $this->session->set_flashdata(
                        'validasi_succes',
                        'validasi Permohonan Berhasil.'
                    );
                    redirect('ujilab');
                }
            } else {
                $this->session->set_flashdata('Upload_berkas_failed', 'Pastikan <strong>Berkas Uji lab</strong> dan <strong> Berkas Uji Kelaikan</strong> anda sudah sesuai format yang ditentukan.');
                redirect('permohonan/view/' . $id_permohonan);
            }
        } else {
            $this->session->set_flashdata('Upload_berkas_failed', 'Pastikan <strong>Berkas Uji lab</strong> dan <strong> Berkas Uji Kelaikan</strong> anda sudah sesuai format yang ditentukan.');
            redirect('permohonan/view/' . $id_permohonan);
        }
    }
    public function create_certificate($id_permohonan)
    {
        $query = $this->Hotel_model->create_certificate($id_permohonan);

        // if ($query) {
            $this->session->set_flashdata('sertifikat_succes', 'Sertifikat Berhasil di terbitkan');
            redirect('sertifikat');
            // } else {
        //     $this->session->set_flashdata('failed_certificate', 'Mohon maaf, terjadi masalah saat menyimpan data sertifikat sanitasi.');
        //     redirect('csertifikat/' . $id_permohonan);
        // }
    }
}