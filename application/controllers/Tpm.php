<?php
class Tpm extends CI_Controller
{
    public function panduan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('public/panduan/tpm');
        $this->load->view('templates/footer');
    }

    // create new certification request
    public function create()
    {
        // check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // rules for form validation
        // data pemohon
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('noktp', 'Nomor KTP Pemohon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pemohon', 'required');

        // data TPM
        $this->form_validation->set_rules('namaTPM', 'Nama TPM', 'required');
        $this->form_validation->set_rules('jalanTPM', 'Jalan lokasi TPM', 'required');
        $this->form_validation->set_rules('kelurahanTPM', 'Kelurahan lokasi TPM', 'required');
        $this->form_validation->set_rules('kecamatanTPM', 'Kecamatan lokasi TPM', 'required');
        $this->form_validation->set_rules('notelpTPM', 'Nomor Telepon TPM', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['kecamatan'] = $this->Permohonan_model->ambilkecamatan();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/permohonan/create/c_tpm',$data);
            $this->load->view('templates/footer');
        }
        elseif ($this->input->post('kecamatanTPM')=="kosong"){
            if ($this->session->userdata('level') == 'pengguna') {
                $this->session->set_flashdata(
                    'req_failed_tpm',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi dan valid.'
                );
                redirect('tpm/create');
            } else if ($this->session->userdata('level') == 'kesmas') {
                $this->session->set_flashdata(
                    'req_failed_tpm',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi dan valid.'
                );
                redirect('cpermohonan');
            }
                       
        }  
        else {
            $username = $_SESSION['username'];
            // load model
            $this->load->model('TPM_model');
            //ambil nama gambar 
            $ktp = $_FILES['f_ktp']['name'];
            $npwp = $_FILES['f_npwp']['name'];
            $domisili = $_FILES['f_domisili']['name'];
            $denah = $_FILES['f_denah']['name'];
            $foto_terbaru = $_FILES['f_foto']['name'];
            $surat_tpm = $_FILES['f_pernyataan_TPM']['name'];
            //ambil size gambar upload 
            $ktp_size = $_FILES['f_ktp']['size'];
            $npwp_size = $_FILES['f_npwp']['size'];
            $domisili_size = $_FILES['f_domisili']['size'];
            $denah_size = $_FILES['f_denah']['size'];
            $foto_terbaru_size = $_FILES['f_foto']['size'];
            $surat_tpm_size = $_FILES['f_pernyataan_TPM']['size'];
            //variabel untuk menyimpan format ekstensi file 
            $ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];
            //mecah string 
            $ktp1 = explode('.', $ktp);
            $npwp1 = explode('.', $npwp);
            $domisili1 = explode('.', $domisili);
            $denah1 = explode('.', $denah);
            $foto_terbaru1 = explode('.', $foto_terbaru);
            $surat_tpm1 = explode('.', $surat_tpm);
            //pengambilan format file 
            $ktp1 = strtolower(end($ktp1));
            $npwp1 = strtolower(end($npwp1));
            $domisili1 = strtolower(end($domisili1));
            $denah1 = strtolower(end($denah1));
            $foto_terbaru1 = strtolower(end($foto_terbaru1));
            $surat_tpm1 = strtolower(end($surat_tpm1));
            //foto sertifikat optional 
            $sertifikat_status = $_FILES['f_sertif']['error'];
            //foto rekomendasi optional
            $rekomendasi_status = $_FILES['f_rekomendasi']['error'];
            //foto kuasa
            $surat_kuasa_status = $_FILES['f_kuasa']['error'];
            //jika menginputkan semua 
            //ambil format file
            $surat_kuasa = $_FILES['f_kuasa']['name'];
            $surat_kuasa1 = explode('.', $surat_kuasa);
            $surat_kuasa1 = strtolower(end($surat_kuasa1));

            $sertifikat = $_FILES['f_sertif']['name'];
            $sertifikat1 = explode('.', $sertifikat);
            $sertifikat1 = strtolower(end($sertifikat1));

            $rekomendasi = $_FILES['f_rekomendasi']['name'];
            $rekomendasi1 = explode('.', $rekomendasi);
            $rekomendasi1 = strtolower(end($rekomendasi1));
            //ambil size 
            $surat_kuasa_size = $_FILES['f_kuasa']['size'];
            $sertifikat_size = $_FILES['f_sertif']['size'];
            $rekomendasi_size = $_FILES['f_rekomendasi']['size'];
            // jika upload semua 
            if ($sertifikat_status != 4 &&  $rekomendasi_status != 4 && $surat_kuasa_status != 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi) && in_array($surat_kuasa1, $ekstensi) && in_array($sertifikat1, $ekstensi) && in_array($rekomendasi1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188 &&  $surat_kuasa_size <= 2087188 && $sertifikat_size <= 2087188 && $rekomendasi_size <= 2087188) {
                        //jika sizenya memenuhi syarat 
                        //pindah direktori
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        $nama_surat_kuasa = $namafilebaru."_".$surat_kuasa;
                        $nama_sertifikat = $namafilebaru."_".$sertifikat;
                        $nama_rekomendasi = $namafilebaru."_".$rekomendasi;

                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        $move_rekomendasi = move_uploaded_file($_FILES['f_rekomendasi']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/rekomendasi/' . $nama_rekomendasi);
                        $move_surat_kuasa = move_uploaded_file($_FILES['f_kuasa']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_kuasa/' . $nama_surat_kuasa);
                        $move_sertifikat = move_uploaded_file($_FILES['f_sertif']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/sertifikat/' . $nama_sertifikat);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
            }
           //cuma  surat kuasa 
            else if ($sertifikat_status == 4 &&  $rekomendasi_status == 4 && $surat_kuasa_status != 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi) && in_array($surat_kuasa1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188 &&  $surat_kuasa_size <= 2087188) {
                        //jika sizenya memenuhi syarat 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        $nama_surat_kuasa = $namafilebaru."_".$surat_kuasa;
                        
                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        $move_surat_kuasa = move_uploaded_file($_FILES['f_kuasa']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_kuasa/' . $nama_surat_kuasa);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
            }
            //cuma sertifikat
            else if ($sertifikat_status != 4 &&  $rekomendasi_status == 4 && $surat_kuasa_status == 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi) && in_array($sertifikat1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188 && $sertifikat_size <= 2087188) {
                        //pindah direktori
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        $nama_sertifikat = $namafilebaru."_".$sertifikat;
                        
                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        $move_sertifikat = move_uploaded_file($_FILES['f_sertif']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/sertifikat/' . $nama_sertifikat);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
            }
            // hanya mengupload rekomendasi saja 
            else if ($sertifikat_status == 4 &&  $rekomendasi_status != 4 && $surat_kuasa_status == 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi) && in_array($rekomendasi1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188 && $rekomendasi_size <= 2087188) {
                        //jika sizenya memenuhi syarat 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        $nama_rekomendasi = $namafilebaru."_".$rekomendasi;

                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        $move_rekomendasi = move_uploaded_file($_FILES['f_rekomendasi']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/rekomendasi/' . $nama_rekomendasi);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
                // hanya upload sertifikat dan rekomendasi  (sudah dicek)
            } else if ($sertifikat_status != 4 &&  $rekomendasi_status != 4 && $surat_kuasa_status == 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi) &&  in_array($sertifikat1, $ekstensi) && in_array($rekomendasi1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188 &&   $sertifikat_size <= 2087188 && $rekomendasi_size <= 2087188) {
                        //jika sizenya memenuhi syarat 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        $nama_sertifikat = $namafilebaru."_".$sertifikat;
                        $nama_rekomendasi = $namafilebaru."_".$rekomendasi;

                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        $move_rekomendasi = move_uploaded_file($_FILES['f_rekomendasi']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/rekomendasi/' . $nama_rekomendasi);
                        $move_sertifikat = move_uploaded_file($_FILES['f_sertif']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/sertifikat/' . $nama_sertifikat);

                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }

               } 
                //hanya upload sertifikat dan surat kuasa 
            else if ($sertifikat_status != 4 &&  $rekomendasi_status == 4 && $surat_kuasa_status != 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi) && in_array($surat_kuasa1, $ekstensi) && in_array($sertifikat1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188 &&  $surat_kuasa_size <= 2087188 && $sertifikat_size <= 2087188) {
                        //jika sizenya memenuhi syarat 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        $nama_surat_kuasa = $namafilebaru."_".$surat_kuasa;
                        $nama_sertifikat = $namafilebaru."_".$sertifikat;
                       
                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        $move_surat_kuasa = move_uploaded_file($_FILES['f_kuasa']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_kuasa/' . $nama_surat_kuasa);
                        $move_sertifikat = move_uploaded_file($_FILES['f_sertif']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/sertifikat/' . $nama_sertifikat);

                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
                // hanya upload rekomendasi dan surat kuasa 
            } else if ($sertifikat_status == 4 &&  $rekomendasi_status != 4 && $surat_kuasa_status != 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi) && in_array($surat_kuasa1, $ekstensi) & in_array($rekomendasi1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188 &&  $surat_kuasa_size <= 2087188 && $rekomendasi_size <= 2087188) {
                        //jika sizenya memenuhi syarat 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        $nama_surat_kuasa = $namafilebaru."_".$surat_kuasa;
                        $nama_rekomendasi = $namafilebaru."_".$rekomendasi;

                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        $move_rekomendasi = move_uploaded_file($_FILES['f_rekomendasi']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/rekomendasi/' . $nama_rekomendasi);
                        $move_sertifikat = move_uploaded_file($_FILES['f_sertif']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/sertifikat/' . $nama_sertifikat);

                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
                // jika tidak menginputkan file yang optional dan jika di kelola orang lain (sampai sini tes)
            } else if ($sertifikat_status == 4 &&  $rekomendasi_status == 4 && $surat_kuasa_status == 4) {
                //seleksi format file untuk wajib 
                if (in_array($ktp1, $ekstensi) && in_array($npwp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($surat_tpm1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $npwp_size <= 2087188 && $domisili_size <= 2087188 && $denah_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $surat_tpm_size  <= 2087188) {
                        //jika sizenya memenuhi syarat 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_npwp_baru = $namafilebaru."_".$npwp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_surat_tpm = $namafilebaru."_".$surat_tpm;
                        
                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/ktp/' . $nama_ktp_baru);
                        $move_npwp = move_uploaded_file($_FILES['f_npwp']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/npwp/' . $nama_npwp_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/denah/' . $nama_denah_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/domisili/' . $nama_domisili_baru);
                        $move_foto_terbaru = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/foto_terbaru/' . $nama_foto_baru);
                        $move_tpm = move_uploaded_file($_FILES['f_pernyataan_TPM']['tmp_name'], FCPATH . 'assets/file/permohonan/tpm/surat_tpm/' . $nama_surat_tpm);
                        
                       // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Tpm_model->create_certification($nama_ktp_baru,$nama_npwp_baru, $nama_domisili_baru,$nama_denah_baru,$nama_foto_baru,$nama_surat_tpm,$nama_surat_kuasa,$nama_sertifikat,$nama_rekomendasi);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('tpm/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_tpm',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('tpm/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_tpm',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
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

        //cek jenis format file 
        $ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];
        $uji_kelaikan = explode('.', $hasil_uji_keliakan);
        $uji_lab = explode('.', $hasil_uji_lab);

        //nyimpan ukuran file upload
        $ukuran_uji_kelaikan = $_FILES['h_uk']['size'];
        $ukuran_uji_lab = $_FILES['h_ul']['size'];

        $uji_kelaikan = strtolower(end($uji_kelaikan));
        $uji_lab = strtolower(end($uji_lab));

        // jika melakukan validasi
        //cek format ekstensi file 
        if (in_array($uji_kelaikan, $ekstensi) && in_array($uji_lab, $ekstensi)) {
            //cek size file 
            if ($ukuran_uji_kelaikan <= 2087188 && $ukuran_uji_lab <= 2087188) {
                $namafilebaru = uniqid();
                $nama_lab = $namafilebaru."_".$hasil_uji_lab;
                $nama_uji_kelaikan = $namafilebaru."_".$hasil_uji_keliakan;
                
                //ambil nip_admin
                $ambil_nip = $this->Admin_model->getnip($username);
                foreach ($ambil_nip as $np) {
                    $nip_admin = $np->nip;
                    //pindah file upload ke di rektori baru
                    $move_uji_kelaikan = move_uploaded_file(
                        $_FILES['h_uk']['tmp_name'],
                        FCPATH . 'assets/file/berkas_visitasi/tpm/uji_kelaikan/' . $nama_uji_kelaikan
                    );
                    $move_uji_lab = move_uploaded_file(
                        $_FILES['h_ul']['tmp_name'],
                        FCPATH . 'assets/file/berkas_visitasi/tpm/uji_lab/' . $nama_lab
                    );

                    //proses save data ke tabel rekap 
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
        $query = $this->Tpm_model->create_certificate($id_permohonan);

        // if ($query) {
        $this->session->set_flashdata('sertifikat_succes', 'Sertifikat Berhasil di terbitkan');
        redirect('sertifikat');
        // } else {
        //     $this->session->set_flashdata('failed_certificate', 'Mohon maaf, terjadi masalah saat menyimpan data sertifikat sanitasi.');
        //     redirect('csertifikat/' . $id_permohonan);
        // }
    }
}
