<?php
class Admin extends CI_Controller
{
    public function download_accessor()
    {
        $name = "BerkasPenilaian.zip";
        $data = file_get_contents('assets/file/BerkasPenilaian/BerkasPenilaian/BerkasPenilaian.zip');
        force_download($name, $data);
    }

    public function laporan()
    {
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/laporan/rekap_laporan');
        $this->load->view('templates/footer_admin');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header_admin');
            $this->load->view('admin/operator/login');
            $this->load->view('templates/footer_admin');
        } else {
            // get username and encrypted password
            $username = $this->input->post('username');
            $password = hash("sha256", $this->input->post('password'));

            // login admin
            $admin_id = $this->Admin_model->login($username, $password);
            if ($admin_id) {
                foreach ($admin_id as $row) {
                    if ($row->level != "super") {
                        $this->session->set_userdata('admin_id', $admin_id);
                        $this->session->set_userdata('username', $row->username);
                        $this->session->set_userdata('is_verified', $row->is_verified);
                        $this->session->set_userdata('level', $row->level);
                        $this->session->set_userdata('logged_in', true);

                        // check user level
                        if ($this->session->userdata('level') == "kesmas") {
                            $this->session->set_flashdata('login_success', 'Selamat datang, bagaimana kabarmu hari ini?');
                            redirect('dashboard');
                        } else if ($this->session->userdata('level') == "visitasi") {
                            $this->session->set_flashdata('login_success', 'Selamat datang, bagaimana kabarmu hari ini?');
                            redirect('dashboard');
                        }
                    } else {
                        $this->session->set_flashdata('login_failed', 'Pastikan <strong>Username</strong> dan <strong>Password</strong> anda sudah benar.');
                        redirect('admin');
                    }
                }
            } else {
                $this->session->set_flashdata('login_failed', 'Pastikan <strong>Username</strong> dan <strong>Password</strong> anda sudah benar.');
                redirect('admin');
            }
        }
    }

    public function logout()
    {
        // unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('username');

        // set failed login message
        $this->session->set_flashdata('user_loggedout', 'Anda telah berhasil keluar.');
        redirect('admin');
    }

    public function create_visitasi()
    {
        $this->form_validation->set_rules('nip', 'Nomor NIP', 'required');
        $this->form_validation->set_rules('nip', 'Nomor NIP', 'callback_check_nip_exist');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('email', 'Email', 'callback_check_email_admin_exist');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata(
                'nip_exist',
                'Proses Tambah Operator Gagal , silahkan cek kembali Nip Maupun Email.'
            );
            redirect('operator');
        } else {
            $slug = hash("sha256", $this->input->post('nama'));
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $username = $this->input->post('email');
            $password = random_string('alnum', 16);
            $ency_password = hash("sha256", $password);

            $data = array(
                'level'         => 'visitasi',
                'nip'           => $nip,
                'puskesmas'     => $this->input->post('selectpuskesmas'),
                'nama'          => $nama,
                'username'      => $username,
                'password'      => $ency_password,
                'slug'          => $slug
            );

            // $this->Admin_model->create($data);

            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol'] = "smtp";
            $config['mailtype'] = "html";
            $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
            $config['smtp_port'] = "465";
            $config['smtp_timeout'] = "400";
            $config['smtp_user'] = "TBHero.FILKOM.2019@gmail.com"; // isi dengan email kamu
            $config['smtp_pass'] = "1234567890tbhero"; // isi dengan password kamu
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;

            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);

            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($this->input->post('email'));
            $this->email->subject("Verifikasi Akun Website Sertifikasi Sanitasi");
            $this->email->message(
                "Hai $nama, <br>
            Anda telah memiliki akun di Website Sanitasi Laik Higiene Dinas Kesehatan Kota Malang. <br>
            Berikut adalah data akun anda : <br>
            Username : $username <br>
            Password : $password <br><br>" .
                    base_url() . 'admin/verifikasi/' . $slug .

                    "<br><br>Salam hangat,<br><br><br>
            Superadmin"
            );

            if ($this->email->send()) {
                $this->Admin_model->create($data);

                $this->session->set_flashdata(
                    'admin_success',
                    'Berhasil menambah operator baru.'
                );
                redirect('operator');
            } else {
                $this->session->set_flashdata(
                    'admin_failed',
                    'Gagal melakukan registrasi admin baru. Silahkan coba lagi'
                );
                redirect('operator');
            }
        }
    }

    public function create_kesmas()
    {
        $this->form_validation->set_rules('nip', 'Nomor NIP', 'required');
        $this->form_validation->set_rules('nip', 'Nomor NIP', 'callback_check_nip_exist');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('email', 'Email', 'callback_check_email_admin_exist');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata(
                'nip_exist',
                'Proses Tambah Operator Gagal , silahkan cek kembali Nip Maupun Email.'
            );
            redirect('operator');
        } else {
            $slug = hash("sha256", $this->input->post('nama'));
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $username = $this->input->post('email');
            $password = random_string('alnum', 16);
            $ency_password = hash("sha256", $password);

            $data = array(
                'level'         => 'kesmas',
                'nip'           => $nip,
                'nama'          => $nama,
                'username'      => $username,
                'password'      => $ency_password,
                'slug'          => $slug
            );

            // $this->Admin_model->create($data);

            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol'] = "smtp";
            $config['mailtype'] = "html";
            $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
            $config['smtp_port'] = "465";
            $config['smtp_timeout'] = "400";
            $config['smtp_user'] = "TBHero.FILKOM.2019@gmail.com"; // isi dengan email kamu
            $config['smtp_pass'] = "1234567890tbhero"; // isi dengan password kamu
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;

            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);

            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($this->input->post('email'));
            $this->email->subject("Verifikasi Akun Website Sertifikasi Sanitasi");
            $this->email->message(
                "Hai $nama, <br>
                Anda telah memiliki akun di Website Sanitasi Laik Higiene Dinas Kesehatan Kota Malang. <br>
                Berikut adalah data akun anda : <br>
                Username : $username <br>
                Password : $password <br><br>" .
                    base_url() . 'admin/verifikasi/' . $slug .

                    "<br><br>Salam hangat,<br><br><br>
                Superadmin"
            );

            if ($this->email->send()) {
                $this->Admin_model->create($data);

                $this->session->set_flashdata(
                    'admin_success',
                    'Berhasil menambah operator baru.'
                );
                redirect('operator');
            } else {
                $this->session->set_flashdata(
                    'admin_failed',
                    'Gagal melakukan registrasi admin baru. Silahkan coba lagi'
                );
                redirect('operator');
            }
        }
    }

    public function check_nip_exist($nip)
    {
        $this->form_validation->set_message('check_nip_exist', 'NIP telah terdaftar, silahkan cek kembali.');
        if ($this->User_model->check_nip_exist($nip)) {
            return true;
        } else {
            return false;
        }
    }
    public function check_email_admin_exist($email)
    {
        $this->form_validation->set_message('check_email_admin_exist', 'Email telah terdaftar, silahkan cek kembali.');
        if ($this->User_model->check_email_admin_exist($email)) {
            return true;
        } else {
            return false;
        }
    }
    public function verifikasi($slug)
    {
        $this->Admin_model->isVerified($slug);
        $admin = $this->Admin_model->directhome($slug);
        if ($admin) {
            foreach ($admin as $data) {
                $this->session->set_userdata('admin_id', $admin);
                $this->session->set_userdata('username', $data->username);
                $this->session->set_userdata('is_verified', $data->is_verified);
                $this->session->set_userdata('level', $data->level);
                $this->session->set_userdata('logged_in', true);

                // check user level
                if ($this->session->userdata('level') == "kesmas") {
                    $this->session->set_flashdata('login_success', 'Selamat datang, bagaimana kabarmu hari ini?');
                    redirect('dashboard');
                } else if ($this->session->userdata('level') == "visitasi") {
                    $this->session->set_flashdata('login_success', 'Selamat datang, bagaimana kabarmu hari ini?');
                    redirect('dashboard');
                }
            }
        } else {
            $this->session->set_flashdata('login_failed', 'Pastikan <strong>Username</strong> dan <strong>Password</strong> anda sudah benar.');
            redirect('admin');
        }
    }

    public function ubahpassword($nip)
    {
        $password = random_string('alnum', 16);
        $ency_password = hash("sha256", $password);

        $admin = $this->Admin_model->view($nip);
        if ($admin > 0) {
            foreach ($admin as $data) {
                $this->load->library('email');
                $config = array();
                $config['charset'] = 'utf-8';
                $config['useragent'] = 'Codeigniter';
                $config['protocol'] = "smtp";
                $config['mailtype'] = "html";
                $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
                $config['smtp_port'] = "465";
                $config['smtp_timeout'] = "400";
                $config['smtp_user'] = "TBHero.FILKOM.2019@gmail.com"; // isi dengan email kamu
                $config['smtp_pass'] = "1234567890tbhero"; // isi dengan password kamu
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;

                //memanggil library email dan set konfigurasi untuk pengiriman email
                $this->email->initialize($config);

                //konfigurasi pengiriman
                $this->email->from($config['smtp_user']);
                $this->email->to($data->username);
                $this->email->subject("Pengaturan Password Akun Website Sertifikasi Sanitasi");
                $this->email->message(
                    "Hai , <br>
                    Password anda telah dirubah, pastikan anda mengingat dan tidak memberitahukan kepada orang lain. <br>
                    Berikut adalah password anda yang baru : <br>
                    Password : $password <br><br>
                    Silahkan mengubah password anda pada menu akun ketika anda telah login pada Website Sertifikasi Sanitasi Laik Higiene Dinas Kesehatan Kota Malang.
                    <br><br>
                    <br><br>
                    Salam hangat,
                    
                    <br><br><br>

                    Superadmin"
                );

                if ($this->email->send()) {
                    $this->Admin_model->changepassword($data->username, $ency_password);
                    $this->session->set_flashdata(
                        'admin_pass_success',
                        'Berhasil merubah password operator.'
                    );
                    redirect('super/dashboard');
                } else {
                    $this->session->set_flashdata(
                        'admin_pass_failed',
                        'Terjadi kesalahan saat mengirim data ke email'
                    );
                    redirect('super/dashboard');
                }
            }
        } else if ($admin === FALSE) {
            $this->session->set_flashdata(
                'admin_not_found',
                'Data operator tidak ditemukan.'
            );
            redirect('super/dashboard');
        }
        // $this->Admin_model->create($data);
    }

    public function resetpassword($nip)
    {
        $password = random_string('alnum', 16);
        $ency_password = hash("sha256", $password);

        $admin = $this->Admin_model->view($nip);
        if ($admin > 0) {
            foreach ($admin as $data) {
                $this->load->library('email');
                $config = array();
                $config['charset'] = 'utf-8';
                $config['useragent'] = 'Codeigniter';
                $config['protocol'] = "smtp";
                $config['mailtype'] = "html";
                $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
                $config['smtp_port'] = "465";
                $config['smtp_timeout'] = "400";
                $config['smtp_user'] = "TBHero.FILKOM.2019@gmail.com"; // isi dengan alamat email
                $config['smtp_pass'] = "1234567890tbhero"; // isi dengan password email
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;

                //memanggil library email dan set konfigurasi untuk pengiriman email
                $this->email->initialize($config);

                //konfigurasi pengiriman
                $this->email->from($config['smtp_user']);
                $this->email->to($data->username);
                $this->email->subject("Pengaturan Password Akun Website Sertifikasi Sanitasi");
                $this->email->message(
                    "Hai , <br>
                    Password anda telah dirubah, pastikan anda mengingat dan tidak memberitahukan kepada orang lain. <br>
                    Berikut adalah password anda yang baru : <br>
                    Password : $password <br><br>
                    Silahkan mengubah password anda pada menu akun ketika anda telah login pada Website Sertifikasi Sanitasi Laik Higiene Dinas Kesehatan Kota Malang.
                    <br><br>
                    <br><br>
                    Salam hangat,
                    
                    <br><br><br>

                    Superadmin"
                );

                if ($this->email->send()) {
                    $this->Admin_model->changepassword($data->username, $ency_password);
                    $this->session->set_flashdata(
                        'admin_pass_success',
                        'Berhasil merubah password operator.'
                    );
                    redirect('operator');
                } else {
                    $this->session->set_flashdata(
                        'admin_pass_failed',
                        'Terjadi kesalahan saat mengirim data ke email'
                    );
                    redirect('operator');
                }
            }
        } else if ($admin === FALSE) {
            $this->session->set_flashdata(
                'admin_not_found',
                'Data operator tidak ditemukan.'
            );
            redirect('operator');
        }
        // $this->Admin_model->create($data);
    }

    public function forgotpass()
    {
        $nip    = $this->input->post('nip');
        $email  = $this->input->post('email');

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('email', 'Alamat', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header_admin');
            $this->load->view('admin/operator/forgotpass');
            $this->load->view('templates/footer_admin');
        } else {
            $password = random_string('alnum', 16);
            $ency_password = hash("sha256", $password);

            $admin = $this->Admin_model->admin_check($nip, $email);
            if ($admin > 0) {
                foreach ($admin as $data) {
                    $this->load->library('email');
                    $config = array();
                    $config['charset'] = 'utf-8';
                    $config['useragent'] = 'Codeigniter';
                    $config['protocol'] = "smtp";
                    $config['mailtype'] = "html";
                    $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
                    $config['smtp_port'] = "465";
                    $config['smtp_timeout'] = "400";
                    $config['smtp_user'] = "TBHero.FILKOM.2019@gmail.com"; // isi dengan alamat email
                    $config['smtp_pass'] = "1234567890tbhero"; // isi dengan password email
                    $config['crlf'] = "\r\n";
                    $config['newline'] = "\r\n";
                    $config['wordwrap'] = TRUE;

                    //memanggil library email dan set konfigurasi untuk pengiriman email
                    $this->email->initialize($config);

                    //konfigurasi pengiriman
                    $this->email->from($config['smtp_user']);
                    $this->email->to($data->username);
                    $this->email->subject("Pengaturan Password Akun Website Sertifikasi Sanitasi");
                    $this->email->message(
                        "Hai , <br>
                    Password anda telah dirubah, pastikan anda mengingat dan tidak memberitahukan kepada orang lain. <br>
                    Berikut adalah password anda yang baru : <br>
                    Username : $email <br>
                    Password : $password <br><br>
                    Silahkan mengubah password anda pada menu akun ketika anda telah login pada Website Sertifikasi Sanitasi Laik Higiene Dinas Kesehatan Kota Malang.
                    <br><br>
                    <br><br>
                    Salam hangat,
                    
                    <br><br><br>

                    Superadmin"
                    );

                    if ($this->email->send()) {
                        $this->Admin_model->changepassword($email, $ency_password);
                        $this->session->set_flashdata(
                            'changepass_success',
                            'Berhasil merubah password, silahkan cek email anda.'
                        );
                        redirect('lupapassword');
                    } else {
                        $this->session->set_flashdata(
                            'email_not_send',
                            'Mohon maaf, terjadi kesalahan saat mengirim data ke email. Coba lagi.'
                        );
                        redirect('lupapassword');
                    }
                }
            } else if ($admin === FALSE) {
                $this->session->set_flashdata(
                    'account_not_found',
                    'Pastikan anda nip dan alamat email anda telah terdaftar atau hubungi administrator.'
                );
                redirect('lupapassword');
            }
        }
    }

    public function index()
    {
        $level = $this->session->userdata('level');

        if ($level == 'kesmas') {
            $data['latestpermohonan'] = $this->Permohonan_model->latestpermohonan();
            $data['countpermohonan'] = $this->Permohonan_model->calculate();
            // $data['latestjadwal'] = $this->Jadwal_model->latest();
            $data['latestujilab'] = $this->Ujilab_model->latestujilab();
            $data['countjadwal'] = $this->Jadwal_model->calculate();
            $data['countpenilaian'] = $this->Ujilab_model->calculate();
            $data['countsertifikat'] = $this->Sertifikat_model->calculate();

            $this->load->view('templates/header_admin');
            $this->load->view('templates/topmenu_admin');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('admin/operator/kesmas/index', $data);
            $this->load->view('templates/footer_admin');
        } else if ($level == 'visitasi') {
            $username = $_SESSION['username'];
            $level = $_SESSION['level'];
            $puskesmas = $this->Admin_model->getcurrentpuskesmas($username, $level);
            foreach ($puskesmas as $row) {

                $puskesmas = $row['puskesmas'];

                $data['latestjadwal'] = $this->Jadwal_model->latestavisitjadwal($puskesmas);
                $data['latestujilab'] = $this->Ujilab_model->latestavisitujilab($puskesmas);

                $this->load->view('templates/header_admin');
                $this->load->view('templates/topmenu_admin');
                $this->load->view('templates/sidebar_admin');
                $this->load->view('admin/operator/visitasi/index', $data);
                $this->load->view('templates/footer_admin');
            }
        } else if ($level == "pengguna") {
            // unset user data
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('nik_pengguna');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            $this->session->set_flashdata('user_loggedout', 'Maaf Anda Belum Login.');
            // set failed login message
            redirect('admin/login');
        } else if ($level == "super") {
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('nik_pengguna');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            $this->session->set_flashdata('user_loggedout', 'Maaf Anda Belum Login.');
            // set failed login message
            redirect('admin/login');
        }
    }

    public function createpermohonan()
    {
        $data['kecamatan'] = $this->Permohonan_model->ambilkecamatan();
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('public/permohonan/create/a_create', $data);
        $this->load->view('templates/footer_admin');
    }

    public function search()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data admin
        $data = $this->Admin_model->fetchdata($query);

        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Terdaftar pada</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
            ';

        // table body
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->level . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->nama . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->username . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->created_at . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->is_verified . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <a href="' . base_url('admin/resetpassword/' . $row->nip) . '" class="btn btn-block btn-outline-primary">
                                            Ubah Password
                                        </a>
                                        <br>    
                                        <a href="' . base_url('operator/' . $row->nip) . '" class="btn btn-block btn-primary">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>';
            }
        } else {
            // 404 data not found
            $output .= '
            <tr>
                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                    <div ng-switch="" on="col.renderType">
                        <div ng-switch-when="primaryLink" class="ng-scope">
                            <br>
                            <p class="text-center text-danger">Data tidak ditemukan</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>';
        }

        echo $output;
    }

    public function view($nip)
    {
        $data['operator'] = $this->Admin_model->view($nip);

        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/operator/view', $data);
        $this->load->view('templates/footer_admin');
    }
}
