<?php
class Dam extends CI_Controller
{
    public function panduan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('public/panduan/dam');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        // check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // rules for form validation
        // data pemohon
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('noktp', 'Nomor KTP Pemohon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pemohon', 'required');

        // data DAM
        $this->form_validation->set_rules('namaDAM', 'Nama DAM', 'required');
        $this->form_validation->set_rules('alamatDAM', 'Alamat DAM', 'required');
        $this->form_validation->set_rules('notelpDAM', 'Nomor Telepon DAM', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['kecamatan'] = $this->Permohonan_model->ambilkecamatan();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/permohonan/create/c_dam',$data);
            $this->load->view('templates/footer');
        }elseif ($this->input->post('kecamatan')=="kosong"){
            if ($this->session->userdata('level') == 'pengguna') {
                $this->session->set_flashdata(
                    'req_failed_dam',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi dan valid.'
                );
                redirect('dam/create');
            } else if ($this->session->userdata('level') == 'kesmas') {
                $this->session->set_flashdata(
                    'req_failed_dam',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi dan valid.'
                );
                redirect('cpermohonan');
            }
                       
        } 
        else {
            $username = $this->session->userdata('username');
            // load model
            $this->load->model('Dam_model');

            //ambil nama gambar 
            $ktp = $_FILES['f_ktp']['name'];
            $foto_terbaru = $_FILES['f_foto']['name'];
            $domisili = $_FILES['f_domisili']['name'];
            $denah = $_FILES['f_denah']['name'];

            //ambil size gambar upload 
            $ktp_size = $_FILES['f_ktp']['size'];
            $foto_terbaru_size = $_FILES['f_foto']['size'];
            $domisili_size = $_FILES['f_domisili']['size'];
            $denah_size = $_FILES['f_denah']['size'];

            //variabel untuk menyimpan format ekstensi file 
            $ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];

            // mecah string 
            $ktp1 = explode('.', $ktp);
            $domisili1 = explode('.', $domisili);
            $foto_terbaru1 = explode('.', $foto_terbaru);
            $denah1 = explode('.', $denah);

            // pengambilan format file 
            $ktp1 = strtolower(end($ktp1));
            $domisili1 = strtolower(end($domisili1));
            $foto_terbaru1 = strtolower(end($foto_terbaru1));
            $denah1 = strtolower(end($denah1));

            //optional 
            $sertifikat_status = $_FILES['f_sertifikat']['error'];

            //jika menginputkan semua 
            if ($sertifikat_status != 4) {
                $sertifikat = $_FILES['f_sertifikat']['name'];
                $sertifikat1 = explode('.', $sertifikat);
                $sertifikat1 = strtolower(end($sertifikat1));
                $sertifikat_size = $_FILES['f_sertifikat']['size'];

                //seleksi format file
                if (in_array($ktp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($denah1, $ekstensi) && in_array($sertifikat1, $ekstensi)) {

                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $domisili_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $denah_size  <= 2087188 && $sertifikat_size  <= 2087188) {
                        //ganti nama format file sebelum di masukkan ke database 
                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        $nama_sertifikat=$namafilebaru."_".$sertifikat;
                        
                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/fotokopi_ktp/' . $nama_ktp_baru);
                        $move_f_foto = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/foto_terbaru/' . $nama_foto_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/domisili/' .  $nama_domisili_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/denah/' . $nama_denah_baru);
                        $move_sertifikasi = move_uploaded_file($_FILES['f_sertifikat']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/sertifikat/' . $nama_sertifikat);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Dam_model->create_certification( $nama_ktp_baru, $nama_foto_baru, $nama_domisili_baru, $nama_denah_baru, $nama_sertifikat);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                    } else {
                        //jika tidak memenuhi size yang disarankan
                        if ($this->session->userdata('level') == 'pengguna') {
                            $this->session->set_flashdata(
                                'req_failed_dam',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('dam/create');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            $this->session->set_flashdata(
                                'req_failed_dam',
                                'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                            );
                            redirect('cpermohonan');
                        }
                    }
                } else {
                    //jika tidak memenuhi format file yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_dam',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('dam/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_dam',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                        );
                        redirect('cpermohonan');
                    }
                }
                //jika tidak menginputkan surat kuasa dan ktp penanggung jawab
            } else if ($sertifikat_status == 4) {
                //seleksi format file
                if (in_array($ktp1, $ekstensi) && in_array($domisili1, $ekstensi) && in_array($foto_terbaru1, $ekstensi) && in_array($denah1, $ekstensi)) {
                    //seleksi size file 
                    if ($ktp_size <= 2087188 && $domisili_size <= 2087188 && $foto_terbaru_size  <= 2087188 && $denah_size  <= 2087188) {

                        $namafilebaru = uniqid();
                        //nama file baru 
                        $nama_ktp_baru = $namafilebaru."_".$ktp;
                        $nama_domisili_baru = $namafilebaru."_".$domisili;
                        $nama_foto_baru= $namafilebaru."_".$foto_terbaru;
                        $nama_denah_baru=$namafilebaru."_".$denah;
                        
                        $move_foto_ktp = move_uploaded_file($_FILES['f_ktp']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/fotokopi_ktp/' . $nama_ktp_baru);
                        $move_f_foto = move_uploaded_file($_FILES['f_foto']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/foto_terbaru/' . $nama_foto_baru);
                        $move_domisili = move_uploaded_file($_FILES['f_domisili']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/domisili/' .  $nama_domisili_baru);
                        $move_denah = move_uploaded_file($_FILES['f_denah']['tmp_name'], FCPATH . 'assets/file/permohonan/dam/denah/' . $nama_denah_baru);
                        // set message
                        $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                        $this->Dam_model->create_certification( $nama_ktp_baru, $nama_foto_baru, $nama_domisili_baru, $nama_denah_baru, $nama_sertifikat);
                        if ($this->session->userdata('level') == 'pengguna') {
                            redirect('home');
                        } else if ($this->session->userdata('level') == 'kesmas') {
                            redirect('permohonan');
                        }
                        //jika tidak memenuhi size yang disarankan
                    } else {
                        //  set messages
                        $this->session->set_flashdata(
                            'req_failed',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan.'
                        );
                        redirect('dam/create');
                    }
                    //jika tidak memenuhi format file yang disarankan
                } else {
                    $this->session->set_flashdata(
                        'req_failed',
                        'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan.'
                    );
                    redirect('dam/create');
                }
            }
        }
    }

    public function validate($id_permohonan)
    {
        //ambil nik_pemohonan
        $data_nik = $this->Permohonan_model->ambilnik($id_permohonan);
        foreach($data_nik as $nik);
        $data_nik_pemohon = $nik['nik_pemohon'];
        $username = $this->session->userdata('username');
        // file name
        $hasil_uji_lab = $_FILES['h_ul']['name'];

        // file format
        $ext = ['jpg', 'jpeg', 'png', 'pdf'];
        $uji_lab = explode('.', $hasil_uji_lab);

        // file size
        $uji_lab_size = $_FILES['h_ul']['size'];
       
        $uji_lab = strtolower(end($uji_lab));

        // file format identifying
        if (in_array($uji_lab, $ext)) {
            // file size checking
            if ($uji_lab_size <= 2087188) {
                // get admin nip
                $ambil_nip = $this->Admin_model->getnip($username);
                foreach ($ambil_nip as $np) {
                    $namafilebaru = uniqid();
                    $nama_lab = $namafilebaru."_".$hasil_uji_lab;
                    $nip_admin = $np->nip;
                    // moving file into target directory
                    $move_uji_lab = move_uploaded_file(
                        $_FILES['h_ul']['tmp_name'],
                        FCPATH . 'assets/file/berkas_visitasi/dam/uji_lab/' . $nama_lab
                    );

                    // proses save data ke tabel rekap 
                    $keterangan = "Selesai";
                    $this->Permohonan_model->validate($id_permohonan, $nip_admin, $data_nik_pemohon, '-', $nama_lab, $keterangan);

                    // update status di tabel permohonan
                    $this->Permohonan_model->ubahstatus_visitasi($id_permohonan);
                    $this->session->set_flashdata(
                        'validasi_succes',
                        'validasi Permohonan Berhasil.'
                    );
                    redirect('ujilab');
                }
            } else {
                $this->session->set_flashdata(
                    'Upload_berkas_failed',
                    'Pastikan <strong>Berkas Uji lab</strong> dan <strong> Berkas Uji Kelaikan</strong> anda sudah sesuai format yang ditentukan.'
                );
                redirect('permohonan/view/' . $id_permohonan);
            }
        } else {
            $this->session->set_flashdata(
                'Upload_berkas_failed',
                'Pastikan <strong>Berkas Uji lab</strong> dan <strong> Berkas Uji Kelaikan</strong> anda sudah sesuai format yang ditentukan.'
            );
            redirect('permohonan/view/' . $id_permohonan);
        }
    }
// menyimpan data ke database
  public function create_certificate($id_permohonan)
  {
      $query = $this->Dam_model->create_certificate($id_permohonan);

      // if ($query) {
        $this->session->set_flashdata('sertifikat_succes', 'Sertifikat Berhasil di terbitkan');
        redirect('sertifikat');
      // } else {
      //     $this->session->set_flashdata('failed_certificate', 'Mohon maaf, terjadi masalah saat menyimpan data sertifikat sanitasi.');
      //     redirect('csertifikat/' . $id_permohonan);
      // }
  }
}