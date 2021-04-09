<?php
class Jasaboga extends CI_Controller
{
    public function create()
    {
        // check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // rules for form validation
        // data pemohon
        $this->form_validation->set_rules('nama', 'Nama Pendaftar', 'required');
        $this->form_validation->set_rules('noktp', 'Nomor KTP Pendaftar', 'required');
        $this->form_validation->set_rules('namaJasaboga', 'Nama Jasaboga', 'required');
        $this->form_validation->set_rules('alamatJasaboga', 'Alamat Jasaboga', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('notelpJasaboga', 'Nomor Telepon', 'required');

        // data Jasa Boga
        if ($this->form_validation->run() === FALSE) {
            $data['kecamatan'] = $this->Permohonan_model->ambilkecamatan();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/permohonan/create/c_jasaboga',$data);
            $this->load->view('templates/footer');
        }elseif ($this->input->post('kecamatan')=="kosong"){
            if ($this->session->userdata('level') == 'pengguna') {
                $this->session->set_flashdata(
                    'req_failed_jasaboga',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi dan valid.'
                );
                redirect('jasaboga/create');
            } else if ($this->session->userdata('level') == 'kesmas') {
                $this->session->set_flashdata(
                    'req_failed_jasaboga',
                    'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan semua inputan sudah di isi dan valid.'
                );
                redirect('cpermohonan');
            }
                       
        } 
        else {
            $username = $_SESSION['username'];
            // load model
            $this->load->model('Jasaboga_model');

            // ambil nama gambar 
            $form = $_FILES['f_form']['name'];

            // ambil size gambar upload 
            $form_size = $_FILES['f_form']['size'];

            // variabel untuk menyimpan format ekstensi file 
            $ekstensi = ['pdf'];

            // mecah string 
            $form1 = explode('.', $form);

            // pengambilan format file 
            $form1 = strtolower(end($form1));

            // seleksi format file 
            if (in_array($form1, $ekstensi)) {
                // seleksi size file 
                if ($form_size <= 2087188) {
                    $namafilebaru = uniqid();
                        //nama file baru 
                    $nama_form_baru = $namafilebaru."_".$form;
                        
                    $move_f_form = move_uploaded_file($_FILES['f_form']['tmp_name'], FCPATH . 'assets/file/permohonan/jasaboga/form/' .$nama_form_baru);
                    // set message
                    $this->session->set_flashdata('req_created', 'Permohonan anda telah diajukan. Silahkan menunggu pemberitahuan lebih lanjut.');
                    $this->Jasaboga_model->create_certification($nama_form_baru);
                    if ($this->session->userdata('level') == 'pengguna') {
                        redirect('home');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        redirect('permohonan');
                    }
                } else {
                    // jika tidak memenuhi size yang disarankan
                    if ($this->session->userdata('level') == 'pengguna') {
                        $this->session->set_flashdata(
                            'req_failed_jasaboga',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                        );
                        redirect('jasaboga/create');
                    } else if ($this->session->userdata('level') == 'kesmas') {
                        $this->session->set_flashdata(
                            'req_failed_jasaboga',
                            'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan size file .'
                        );
                        redirect('cpermohonan');
                    }
                }
            } else {
                // jika tidak memenuhi format file yang disarankan
                if ($this->session->userdata('level') == 'pengguna') {
                    $this->session->set_flashdata(
                        'req_failed_jasaboga',
                        'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
                    );
                    redirect('jasaboga/create');
                } else if ($this->session->userdata('level') == 'kesmas') {
                    $this->session->set_flashdata(
                        'req_failed_jasaboga',
                        'Mohon maaf, terjadi kesalahan saat upload.<br> Pastikan berkas yang diunggah telah memenuhi ketentuan format file .'
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

        $username = $this->session->userdata('username');

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
                        FCPATH . 'assets/file/berkas_visitasi/jasaboga/uji_kelaikan/' . $nama_uji_kelaikan
                    );
                    $move_uji_lab = move_uploaded_file(
                        $_FILES['h_ul']['tmp_name'],
                        FCPATH . 'assets/file/berkas_visitasi/jasaboga/uji_lab/' . $nama_lab
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
        } 
    
    else {
            $this->session->set_flashdata('Upload_berkas_failed', 'Pastikan <strong>Berkas Uji lab</strong> dan <strong> Berkas Uji Kelaikan</strong> anda sudah sesuai format yang ditentukan.');
            redirect('permohonan/view/' . $id_permohonan);
        }
    }
    public function create_certificate($id_permohonan)
    {
        $query = $this->Jasaboga_model->create_certificate($id_permohonan);

        // if ($query) {
    $this->session->set_flashdata('sertifikat_succes', 'Sertifikat Berhasil di terbitkan');
    redirect('sertifikat');
        // } else {
        //     $this->session->set_flashdata('failed_certificate', 'Mohon maaf, terjadi masalah saat menyimpan data sertifikat sanitasi.');
        //     redirect('csertifikat/' . $id_permohonan);
        // }
    }
    }