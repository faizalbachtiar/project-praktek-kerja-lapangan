<?php
class Superadmin extends CI_Controller
{
    public function index()
    {
        $level = $this->session->userdata('level');
        if ($level == "super") {
            $data['latestpermohonan'] = $this->Permohonan_model->latestpermohonan();
            $data['latestpengguna'] = $this->User_model->latestpengguna();
            $data['latestadmin'] = $this->Admin_model->latestadmin();
            $data['latestjadwal'] = $this->Jadwal_model->latestvisitjadwal();
            $data['latestujilab'] = $this->Ujilab_model->latestujilab();
            $data['countpermohonan'] = $this->Permohonan_model->calculate();
            $data['countadmin'] = $this->Admin_model->calculate();
            $data['countpengguna'] = $this->User_model->calculate();
            $data['countjadwal'] = $this->Jadwal_model->calculate();
            $data['countpenilaian'] = $this->Ujilab_model->calculate();
            $data['countsertifikat'] = $this->Sertifikat_model->calculate();

            $this->load->view('templates/header_admin');
            $this->load->view('templates/topmenu_admin');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('admin/superadmin/index', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('level');
            $this->session->unset_userdata('username');

            // set failed login message
            $this->session->set_flashdata('user_loggedout', 'Maaf Anda Belum Login Menjadi SuperAdmin.');
            redirect('super');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header_admin');
            $this->load->view('admin/superadmin/login');
            $this->load->view('templates/footer_admin');
        } else {
            // get username and encrypted password
            $username = $this->input->post('username');
            $password = hash("sha256", $this->input->post('password'));

            // login user
            $admin_id = $this->Admin_model->login($username, $password);
            if ($admin_id) {
                foreach ($admin_id as $row) {
                    if ($row->level == "super") {
                        $this->session->set_userdata('admin_id', $admin_id);
                        $this->session->set_userdata('username', $row->username);
                        $this->session->set_userdata('level', 'super');
                        $this->session->set_userdata('logged_in', true);
                        redirect('super/dashboard');
                    } else {
                        $this->session->set_flashdata('login_failed', 'Pastikan <strong>Username</strong> dan <strong>Password</strong> anda sudah benar.');
                        redirect('super');
                    }
                }
            } else {
                $this->session->set_flashdata('login_failed', 'Pastikan <strong>Username</strong> dan <strong>Password</strong> anda sudah benar.');
                redirect('super');
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
        redirect('super');
    }

    public function operator()
    {
        $data['puskesmas'] = $this->Permohonan_model->getpuskesmas();

        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        // $this->load->view('admin/operator/index');
        $this->load->view('admin/operator/index', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah_puskesmas()
    {
        $this->form_validation->set_rules('id_puskesmas', 'ID PUSKESMAS', 'callback_check_id_puskesmas_exist');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('add_failed', 'Proses Tambah Puskesmas Gagal');
            redirect('puskesmas');
        } else {
            $this->Admin_model->simpan_data_puskesmas();
            $this->session->set_flashdata('add_success', 'Proses Tambah Puskesmas Berhasil');
            redirect('puskesmas');
        }
    }

    public function tambah_kecamatan() {
        $this->form_validation->set_rules('id_kecamatan', 'ID Kecamatan', 'callback_check_id_kecamatan_exist');
        if($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('add_failed', 'Proses Tambah Kecamatan Gagal');
            redirect('kecamatan');
        } else {
            $this->Admin_model->simpan_data_kecamatan();
            $this->session->set_flashdata('add_success', 'Proses Tambah Kecamatan Berhasil');
            redirect('kecamatan');
        }
    }

    public function check_id_kecamatan_exist($id_kecamatan) {
        if($this->Admin_model->check_id_kecamatan_exist($id_kecamatan)) {
            return true;
        } else {
            return false;
        }
    }

    public function check_id_puskesmas_exist($id_puskesmas)
    {
        if ($this->Admin_model->check_id_puskesmas_exist($id_puskesmas)) {
            return true;
        } else {
            return false;
        }
    }
    public function pengguna()
    {
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/pengguna/index');
        $this->load->view('templates/footer_admin');
    }
    public function puskesmas()
    {
        $data['kecamatan'] = $this->Permohonan_model->ambil_id_kecamatan();
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/puskesmas/index', $data);
        $this->load->view('templates/footer_admin');
    }

    public function kecamatan()
    {
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/kecamatan/index');
        $this->load->view('templates/footer_admin');
    }
    public function getpuskesmas()
    {
        $puskesmas = $this->input->get('psksms');
        $query = $this->Permohonan_model->getpuskesmas($puskesmas);
        echo json_encode($query);
    }
}
