<?php
class Users extends CI_Controller
{
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH . 'views/public/pages/' . $page . '.php')) {
            show_404();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('public/pages/' . $page);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        if ($this->session->userdata('level') != 'kesmas' && $this->session->userdata('level') != 'visitasi' && $this->session->userdata('level') != 'super') {
            $this->form_validation->set_rules('noktp', 'Nomor KTP', 'required');
            $this->form_validation->set_rules('noktp', 'Nomor KTP', 'callback_check_nik_exist');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('username', 'Username', 'callback_check_username_exist');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('email', 'Email', 'callback_check_email_exist');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('re_password', 'Confirm Password', 'matches[password]');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('public/user/register');
                $this->load->view('templates/footer');
            } else {
                // password encryption
                $enc_password = hash("sha256", $this->input->post('password'));
                $this->User_model->register($enc_password);

                // get username and encrypted password
                $username = $this->input->post('username');
                $nik = $this->input->post('noktp');
                // login user
                $user_id = $this->User_model->login($username, $enc_password);
                if ($user_id) {
                    foreach ($user_id as $data) {
                        // create session
                        $user_data = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'nik_pengguna' => $nik,
                            'level' => 'pengguna',
                            'logged_in' => true
                        );
                    }

                    $this->session->set_userdata($user_data);

                    // set successful login message
                    $this->session->set_flashdata('user_loggedin', 'You are now logged in.');
                    redirect('home');
                } else {
                    // set failed login message
                    $this->session->set_flashdata('login_failed', 'Login is invalid.');
                    redirect('users/register');
                }
            }
        } else {
            if ($this->session->userdata('level') == 'kesmas' || $this->session->userdata('level') == 'visitasi') {
                redirect('dashboard');
            } else if ($this->session->userdata('level') == 'super') {
                redirect('super/dashboard');
            }
        }
    }

    public function resetpassword()
    {
        $email  = $this->input->post('email');
        $nik    = $this->input->post('noktp');
        $password = random_string('alnum', 16);
        $ency_password = hash("sha256", $password);

        $user = $this->User_model->fetchuseremail($nik, $email);
        if ($user > 0) {
            foreach ($user as $data) {
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
                $this->email->to($email);
                $this->email->subject("Pengaturan Password Akun Website Sertifikasi Sanitasi");
                $this->email->message(
                    "Hai , <br>
                    Password anda telah dirubah, pastikan anda mengingat dan tidak memberitahukan kepada orang lain. <br>
                    Berikut adalah password anda yang baru : <br>
                    Username    : $data->username <br>
                    Password    : $password <br><br>
                    Silahkan mengubah password anda pada menu akun ketika anda telah login pada Website Sertifikasi Sanitasi Laik Higiene Dinas Kesehatan Kota Malang.
                    <br><br>
                    <br><br>
                    Salam hangat,
                    
                    <br><br><br>

                    Dinas Kesehatan"
                );

                if ($this->email->send()) {
                    $this->User_model->changepassword($data->nik_pengguna, $ency_password);

                    $this->session->set_flashdata(
                        'pengguna_pass_success',
                        'Berhasil merubah password. Silahkan cek email anda.'
                    );
                    redirect('resetpassword');
                } else {
                    $this->session->set_flashdata(
                        'pengguna_pass_failed',
                        'Terjadi kesalahan saat mengirim data ke email'
                    );
                    redirect('resetpassword');
                }
            }
        } else if ($user === FALSE) {
            $this->session->set_flashdata(
                'admin_not_found',
                'Maaf, email atau nik belum terdaftar.'
            );
            redirect('resetpassword');
        }
    }

    public function login()
    {
        if ($this->session->userdata('level') != 'kesmas' && $this->session->userdata('level') != 'visitasi' && $this->session->userdata('level') != 'super') {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('public/user/login');
                $this->load->view('templates/footer');
            } else {

                // get username and encrypted password
                $username = $this->input->post('username');
                $password = hash("sha256", $this->input->post('password'));

                // login user
                $user_id = $this->User_model->login($username, $password);
                if ($user_id) {
                    foreach ($user_id as $data) {
                        // create session
                        $user_data = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'nik_pengguna' => $data->nik_pengguna,
                            'level' => 'pengguna',
                            'logged_in' => true
                        );
                    }

                    $this->session->set_userdata($user_data);

                    // set successful login message
                    $this->session->set_flashdata('user_loggedin', 'Selamat datang, bagaimana kabarmu hari ini?');
                    redirect('home');
                } else {
                    // set failed login message
                    $this->session->set_flashdata('login_failed', 'Pastikan <strong>Username</strong> dan <strong>Password</strong> anda sudah benar.');
                    redirect('users/login');
                }
            }
        } else {
            if ($this->session->userdata('level') == 'kesmas' || $this->session->userdata('level') == 'visitasi') {
                redirect('dashboard');
            } else if ($this->session->userdata('level') == 'super') {
                redirect('super/dashboard');
            }
        }
    }

    public function logout()
    {
        // unset user data
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('nik_pengguna');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        // set failed login message
        $this->session->set_flashdata('user_loggedout', 'Anda telah berhasil keluar dari akun anda.');
        redirect('users/login');
    }

    // check if username exist
    public function check_username_exist($username)
    {
        $this->form_validation->set_message('check_username_exist', 'That username is already taken. Please choose different one.');

        if ($this->User_model->check_username_exist($username)) {
            return true;
        } else {
            return false;
        }
    }
    // check if nik_pengguna exist
    public function check_nik_exist($nik_pengguna)
    {
        $this->form_validation->set_message('check_nik_exist', 'That No KTP is already taken. Please choose different one.');
        if ($this->User_model->check_nik_exist($nik_pengguna)) {
            return true;
        } else {
            return false;
        }
    }
    // check if email exist
    public function check_email_exist($email)
    {
        $this->form_validation->set_message('check_email_exist', 'That email is already taken. Please choose different one.');

        if ($this->User_model->check_email_exist($email)) {
            return true;
        } else {
            return false;
        }
    }

    public function profile()
    {
        $username = $_SESSION['username'];
        $data['pemohon'] = $this->User_model->currentPemohon($username);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('public/pemohon/profile', $data);
        $this->load->view('templates/footer');
    }

    public function updateProfile()
    {
        $data['title'] = 'profile';

        $noktp = $this->input->post('noktp');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi = $this->input->post('konfirmasi');
        $username = $this->input->post('username_pengguna');
        $password_enkripsi = hash("sha256", $this->input->post('password_baru'));
        $a = $this->input->post('username_pengguna');
        $email = $this->input->post('email');
        $nilai = 0;

        $cek = $this->User_model->cek_data($noktp);
        foreach ($cek as $bantu) {
            if ($a == $bantu->username) {
                $nilai++;
            }
            if ($email == $bantu->email) {
                $nilai++;
            }
        }
        if ($nilai == 0) {
            if ($password_baru == "" && $konfirmasi == "") {
                $this->User_model->simpan();
                $this->session->set_flashdata('update_berhasil', 'Anda telah berhasil update profile.');
                redirect('home');
            }
            if ($password_baru != "" || $konfirmasi != "") {
                if ($password_baru == $konfirmasi) {
                    $this->User_model->simpan1($password_enkripsi);
                    $this->session->set_flashdata('update_berhasil', 'Anda telah berhasil update profile.');
                    redirect('home');
                }
                if ($password_baru != $konfirmasi) {
                    $this->session->set_flashdata('update_failed', 'Proses Ubah Password Gagal Pastikan Password Baru dan Konfirmasi Password sama.');
                    $username = $_SESSION['username'];
                    $data['pemohon'] = $this->User_model->currentPemohon($username);

                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('public/pemohon/profile', $data);
                    $this->load->view('templates/footer');
                }
            }
        } else if ($nilai != 0) {
            $this->session->set_flashdata('update_failed', 'Email yang anda masukkan sudah ada.');
            $username = $_SESSION['username'];
            $data['pemohon'] = $this->User_model->currentPemohon($username);

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/pemohon/profile', $data);
            $this->load->view('templates/footer');
        }
    }

    public function forgotpass()
    {
        $this->form_validation->set_rules('noktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/user/forgotpass');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $noktp = $this->input->post('noktp');
            //
            $cek_password = $this->User_model->ambil_password($username, $email, $noktp);
            if ($cek_password) {
                foreach ($cek_password as $pass) {
                    $bantu = $pass->Password;
                    $data_pass = base64_decode($bantu);
                    echo "<script>
                                alert('$data_pass');
                        </script>";
                }
                redirect('lupapassword');
            } else {
                redirect('lupapassword');
            }
        }
    }

    public function fetchdata()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->User_model->fetchdata($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Terdaftar pada</th>
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
                                        <p>' . $row->nik_pengguna . '</p>
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
                                        <p>' . $row->email . '</p>
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
                                        <a href="' . base_url('pengguna/' . $row->nik_pengguna) . '" class="btn btn-primary">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    ';
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
            ';
        }

        echo $output;
    }

    public function view($nik_pengguna)
    {
        $data['pengguna'] = $this->User_model->view($nik_pengguna);
        $data['permohonan'] = $this->Permohonan_model->p_cs_pengguna($nik_pengguna);
        $data['jadwal'] = $this->Jadwal_model->getjadwalpengguna($nik_pengguna);
        $data['sertifikat'] = $this->Sertifikat_model->getsertifikatpengguna($nik_pengguna);

        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/pengguna/view', $data);
        // $this->load->view('admin/pengguna/view');
        $this->load->view('templates/footer_admin');
    }
}
